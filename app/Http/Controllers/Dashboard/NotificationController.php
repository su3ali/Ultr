<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Technician;
use App\Models\User;
use App\Notifications\SendPushNotification;
use App\Traits\NotificationTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    use NotificationTrait;
    public function showNotification()
    {
        $type = request()->input('type');

        $subjects = User::whereNotNull('fcm_token');

        if (request()->ajax()) {
            if ($type == 'technician') {
                $subjects = Technician::whereNotNull('fcm_token');
            } elseif ($type == 'customersWithNoOrders') {
                $subjects = User::whereNotNull('fcm_token')->doesntHave('orders');
            }

            $subjects = $subjects->get();

            return response()->json(['subjects' => $subjects]);
        }

        $subjects = $subjects->get();
        return view('dashboard.notification.notification', compact('subjects'));
    }

    public function sendNotification(Request $request)
    {

        $request->validate([
            'subject_id'    => 'nullable',
            'technician_id' => 'nullable',
            'title'         => 'required',
            'message'       => 'required',
            'type'          => 'required',
        ]);

        // $message = preg_replace('/&nbsp;|&#160;/', ' ', $request->message);
        // Decode HTML entities (e.g., &hellip;, &nbsp;)
        $message = html_entity_decode($request->message, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Replace non-breaking spaces and similar
        $message = preg_replace('/(&nbsp;|&#160;)/i', ' ', $message);

        // Convert <p> and <br> to new lines
        $message = preg_replace('/<\/?p>/i', "\n", $message);
        $message = preg_replace('/<br\s*\/?>/i', "\n", $message);

        // Remove all other HTML tags
        $message = strip_tags($message, "\n");

        // Collapse multiple newlines into a single one
        $message = preg_replace('/\n+/', "\n", $message);

        // Final trim
        $message = trim($message);

        // Convert <p> and </p> to new lines
        $message = preg_replace('/<\/?p>/i', "\n", $message);

        // Convert <br> and <br /> to new lines
        $message = preg_replace('/<br\s*\/?>/i', "\n", $message);

        // Remove all other HTML tags
        $message = strip_tags($message, "\n");

        // Collapse multiple newlines into a single one
        $message = preg_replace('/\n+/', "\n", $message);

        // Trim any leading or trailing newlines
        $message = trim($message);
        if ($request->type == 'customer') {
            if ($request->subject_id == 'all') {
                $FcmTokenArray = User::whereNotNull('fcm_token')->get()->pluck('fcm_token')->toArray();
            } else {
                $FcmTokenArray = User::where('id', $request->subject_id)->pluck('fcm_token')->toArray();
            }

            $type = 'customer';
        } else if ($request->type == 'customersWithNoOrders') {
            if ($request->subject_id == 'all') {
                $FcmTokenArray = User::whereNotNull('fcm_token')->doesntHave('orders')->get()->pluck('fcm_token')->toArray();
            } else {
                $FcmTokenArray = User::where('id', $request->subject_id)->pluck('fcm_token')->toArray();
            }
            $type = 'customer';
        } else {
            if ($request->subject_id == 'all') {
                $allTechn = Technician::whereNotNull('fcm_token')->get();

                $techFcmArray  = $allTechn->pluck('fcm_token');
                $adminFcmArray = Admin::whereNotNull('fcm_token')->pluck('fcm_token');
                $FcmTokenArray = $techFcmArray->merge($adminFcmArray)->toArray();

                foreach ($allTechn as $tech) {
                    Notification::send(
                        $tech,
                        new SendPushNotification($request->title, $message)
                    );
                }
            } else {
                $technician    = Technician::where('id', $request->subject_id)->first();
                $FcmTokenArray = Technician::where('id', $request->subject_id)->pluck('fcm_token')->toArray();

                Notification::send(
                    $technician,
                    new SendPushNotification($request->title, $message)
                );
            }

            $type = 'technician';
        }

        if (isset($FcmTokenArray) && count($FcmTokenArray) == 0) {
            return redirect()->back()->withErrors(['fcm_token' => 'لا يمكن ارسال الاشعارت لعدم توفر رمز الجهاز']);
        }

        // $message = str_replace('&nbsp;', ' ', strip_tags($request->message));

        $count = count($FcmTokenArray);
        if ($count > 500) {
            $sub_num        = round($count / 300);
            $FcmTokenArrays = array_chunk($FcmTokenArray, ceil(count($FcmTokenArray) / $sub_num));
        } else {
            $FcmTokenArrays = [$FcmTokenArray];
        }

        foreach ($FcmTokenArrays as $FcmTokenArray) {
            $notification = [
                'device_token' => $FcmTokenArray,
                'title'        => $request->title,
                'message'      => $message,
                'type'         => $type ?? '',
                'code'         => 2,
            ];

            try {
                $this->pushNotification($notification);
            } catch (Exception $e) {
            }
        }

        session()->flash('success', __('api.send_notifications'));
        return redirect()->back();
    }
}
