<?php
namespace App\Http\Controllers\Api\Checkout\v2;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Store the payment callback response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Step 1: Validate the incoming callback data
        $validator = $this->validatePaymentCallback($request);

        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors());
        }

        // Step 2: Try to store the payment details in the payments table
        try {
            $payment = $this->storePaymentData($request);

            $this->logPaymentActivity($payment);

            return $this->sendSuccessResponse($payment);

        } catch (Exception $e) {
            $this->logErrorActivity($e);

            return response()->json(['error' => 'Failed to process payment.'], 500);
        }
    }

    /**
     * Validate the payment callback data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Facades\Validator
     */
    private function validatePaymentCallback(Request $request)
    {
        return Validator::make($request->all(), [
            'transaction_id' => 'nullable|string|unique:payments',
            'amount' => 'nullable|numeric',
            'gateway_response' => 'required',
            'payment_date' => 'nullable|date',
            'description' => 'nullable|string',
            'type' => 'nullable|string',
            'status' => 'nullable|string|in:pending,success,failed,cancelled',
        ]);
    }

    /**
     * Store the payment data in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Payment
     */
    private function storePaymentData(Request $request)
    {
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->transaction_id = $request->input('transaction_id');
        $payment->amount = $request->input('amount');
        $payment->status = $request->input('status', 'pending');
        $payment->payment_method = $request->input('type', null);
        $payment->phone = $request->input('phone', null);
        $payment->gateway_response = json_encode($request->input('gateway_response'));
        $payment->payment_date = $request->input('payment_date', now());
        $payment->description = $request->input('description', null);
        $payment->save();

        return $payment;
    }

    /**
     * Log the payment activity.
     *
     * @param \App\Models\Payment $payment
     * @return void
     */
    private function logPaymentActivity(Payment $payment)
    {
        activity()
            ->causedBy(auth()->user())
            ->withProperties([
                'gateway_response' => $payment->gateway_response ?? '',
                'current_url' => url()->current(),
            ])
            ->log('A payment gateway response stored successfully');
    }

    /**
     * Log the error activity.
     *
     * @param \Exception $exception
     * @return void
     */
    private function logErrorActivity(Exception $exception)
    {
        activity()
            ->causedBy(auth()->user())
            ->withProperties([
                'exception_message' => $exception->getMessage(),
                'exception_file' => $exception->getFile(),
                'exception_line' => $exception->getLine(),
                'url' => url()->current(),
                'user_id' => auth()->user()->id,
                'user_name' => auth()->user()->first_name,
            ])
            ->log('Exception while processing the payment endpoint');
    }

    /**
     * Send a successful response.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    private function sendSuccessResponse(Payment $payment)
    {
        return response()->json([
            'status' => true,
            'message' => __('api.payment created successfully'),
            'payment_id' => $payment->id,
        ], 200);
    }

    /**
     * Send an error response.
     *
     * @param \Illuminate\Support\MessageBag $errors
     * @return \Illuminate\Http\Response
     */
    private function sendErrorResponse($errors)
    {

        return self::apiResponse(400, __('api.Invalid data provided'), $errors);

    }
}
