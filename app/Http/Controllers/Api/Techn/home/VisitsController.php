<?php
namespace App\Http\Controllers\Api\Techn\home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Technician\home\VisitsResource;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\CustomerWallet;
use App\Models\Group;
use App\Models\Order;
use App\Models\Technician;
use App\Models\TechnicianWallet;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Visit;
use App\Support\Api\ApiResponse;
use App\Traits\NotificationTrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class VisitsController extends Controller
{
    use ApiResponse;
    use NotificationTrait;

    public function __construct()
    {
        $this->middleware('localization');
    }

    // protected function myCurrentOrders()
    // {

    //     $groupIds = Group::where('technician_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
    //     $groups   = Group::where('technician_id', auth('sanctum')->user()->id)->first();

    //     if (! $groups) {
    //         $this->body['visits'] = [];
    //         return self::apiResponse(200, null, $this->body);
    //     }

    //     // Add 2 Hours for Day

    //     $now         = Carbon::now('Asia/Riyadh');
    //     $startOfDay  = $now->copy()->startOfDay();                        // today 00:00
    //     $endOfWindow = $now->copy()->addDay()->startOfDay()->addHours(2); // tomorrow 02:00

    //     $orders = Visit::whereHas('booking', function ($q) use ($startOfDay, $endOfWindow) {
    //         $q->whereBetween('date', [$startOfDay->toDateTimeString(), $endOfWindow->toDateTimeString()])
    //             ->whereHas('customer')
    //             ->whereHas('address');
    //     })->with('booking', function ($q) {
    //         $q->with([
    //             'service' => function ($q) {
    //                 $q->with('category');
    //             },
    //             'customer',
    //             'address',
    //         ]);
    //     })->with('status')
    //         ->whereIn('visits_status_id', [1, 2, 3, 4])
    //         ->whereIn('assign_to_id', $groupIds)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     $this->body['visits'] = VisitsResource::collection($orders);
    //     return self::apiResponse(200, null, $this->body);
    // }

    protected function myCurrentOrders()
    {
        $groupIds = Group::where('technician_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
        $groups   = Group::where('technician_id', auth('sanctum')->user()->id)->first();

        if (! $groups) {
            $this->body['visits'] = [];
            return self::apiResponse(200, null, $this->body);
        }

        $now         = Carbon::now('Asia/Riyadh');
        $startOfDay  = $now->copy()->startOfDay();
        $endOfWindow = $now->copy()->addDay()->startOfDay()->addHours(2);

        $orders = Visit::whereHas('booking', function ($q) use ($startOfDay, $endOfWindow) {
            $q->whereBetween('date', [$startOfDay->toDateTimeString(), $endOfWindow->toDateTimeString()])
                ->whereHas('customer')
                ->whereHas('address');
        })->with(['booking' => function ($q) {
            $q->with([
                'service' => function ($q) {
                    $q->with('category');
                },
                'customer',
                'address',
            ]);
        }, 'status'])
            ->whereIn('visits_status_id', [1, 2, 3, 4])
            ->whereIn('assign_to_id', $groupIds)
            ->get();

        //  Sort by visit->start_time
        $sorted = $orders->sortBy(fn($visit) => Carbon::parse($visit->start_time))->values();

        $this->body['visits'] = VisitsResource::collection($sorted);
        return self::apiResponse(200, null, $this->body);
    }

    protected function myPreviousOrders()
    {

        try {
            $groupIds = Group::where('technician_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
            $groups   = Group::where('technician_id', auth('sanctum')->user()->id)->first();
            if (! $groups) {
                $this->body['visits'] = [];
                return self::apiResponse(200, null, $this->body);
            }

            $cacheKey = 'myPreviousOrders_' . auth('sanctum')->user()->id;
            $orders   = cache()->remember($cacheKey, 300, function () use ($groupIds) {
                return Visit::whereHas('booking', function ($q) {
                    $q->whereHas('customer')->whereHas('address');
                })->with('booking', function ($q) {
                    $q->with(['service' => function ($q) {
                        $q->with('category');
                    }, 'customer', 'address']);
                })->with('status')->whereIn('visits_status_id', [5, 6])
                    ->whereIn('assign_to_id', $groupIds)->orderBy('created_at', 'desc')->take(24)->get();
            });

            $this->body['visits'] = VisitsResource::collection($orders);
            return self::apiResponse(200, null, $this->body);
        } catch (\Exception $e) {
            return self::apiResponse(500, __('api.Something went wrong, please try again later'), $this->body);

        }
    }

    // protected function myPreviousOrders()
    // {
    //     try {
    //         $groupIds = Group::where('technician_id', auth('sanctum')->user()->id)->pluck('id')->toArray();
    //         $groups   = Group::where('technician_id', auth('sanctum')->user()->id)->first();

    //         if (! $groups) {
    //             $this->body['visits'] = [];
    //             return self::apiResponse(200, null, $this->body);
    //         }

    //         $cacheKey = 'myPreviousOrders_' . auth('sanctum')->user()->id;

    //         $orders = cache()->remember($cacheKey, 300, function () use ($groupIds) {
    //             return Visit::whereHas('booking', function ($q) {
    //                 $q->whereHas('customer')->whereHas('address');
    //             })->with(['booking' => function ($q) {
    //                 $q->with([
    //                     'service' => function ($q) {
    //                         $q->with('category');
    //                     },
    //                     'customer',
    //                     'address',
    //                 ]);
    //             }, 'status'])
    //                 ->whereIn('visits_status_id', [5, 6])
    //                 ->whereIn('assign_to_id', $groupIds)
    //                 ->take(24) // Limit to 24 records
    //                 ->get();
    //         });

    //         //  Sort by date desc, then time asc
    //         $sorted = $orders->sort(function ($a, $b) {
    //             $dateA = optional($a->booking)->date;
    //             $dateB = optional($b->booking)->date;

    //             $timeA = $a->start_time;
    //             $timeB = $b->start_time;

    //             // Compare dates descending (latest first)
    //             if ($dateA !== $dateB) {
    //                 return strcmp($dateB, $dateA); // reverse
    //             }

    //             // If dates are equal, compare times ascending (earliest first)
    //             return strcmp($timeA, $timeB);
    //         })->values();

    //         $this->body['visits'] = VisitsResource::collection($sorted);
    //         return self::apiResponse(200, null, $this->body);

    //     } catch (\Exception $e) {
    //         return self::apiResponse(500, __('api.Something went wrong, please try again later'), $this->body);
    //     }
    // }

    // protected function myOrdersByDateNow()
    // {
    //     $technician = auth('sanctum')->user();

    //     $groupIds = Group::where('technician_id', $technician->id)->pluck('id')->toArray();

    //     if (empty($groupIds)) {
    //         $this->body['visits'] = [];
    //         return self::apiResponse(200, null, $this->body);
    //     }

    //     $now = Carbon::now('Asia/Riyadh');

    //     // Determine the target "visible" order date:
    //     // If it's after midnight but before 2:00 AM, we still want to show *yesterday's* orders
    //     $targetDate = $now->lt($now->copy()->startOfDay()->addHours(2))
    //     ? $now->copy()->subDay()->toDateString()
    //     : $now->toDateString();

    //     $orders = Visit::whereHas('booking', function ($q) use ($targetDate) {
    //         $q->whereDate('date', $targetDate)
    //             ->whereHas('customer')
    //             ->whereHas('address');
    //     })
    //         ->with('booking', function ($q) {
    //             $q->with([
    //                 'service' => function ($q) {
    //                     $q->with('category');
    //                 },
    //                 'customer',
    //                 'address',
    //             ]);
    //         })
    //         ->with('status')
    //         ->whereIn('visits_status_id', [1, 2, 3, 4])
    //         ->whereIn('assign_to_id', $groupIds)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     $this->body['visits'] = VisitsResource::collection($orders);
    //     return self::apiResponse(200, null, $this->body);
    // }

    protected function myOrdersByDateNow()
    {
        $technician = auth('sanctum')->user();

        $groupIds = Group::where('technician_id', $technician->id)->pluck('id')->toArray();

        if (empty($groupIds)) {
            $this->body['visits'] = [];
            return self::apiResponse(200, null, $this->body);
        }

        $now = Carbon::now('Asia/Riyadh');

        // If current time is before 2 AM, show yesterday's orders
        $targetDate = $now->lt($now->copy()->startOfDay()->addHours(2))
        ? $now->copy()->subDay()->toDateString()
        : $now->toDateString();

        $orders = Visit::whereHas('booking', function ($q) use ($targetDate) {
            $q->whereDate('date', $targetDate)
                ->whereHas('customer')
                ->whereHas('address');
        })
            ->with(['booking' => function ($q) {
                $q->with([
                    'service' => function ($q) {
                        $q->with('category');
                    },
                    'customer',
                    'address',
                ]);
            }, 'status'])
            ->whereIn('visits_status_id', [1, 2, 3, 4])
            ->whereIn('assign_to_id', $groupIds)
            ->get();

        //  Sort by start_time (earliest first)
        $sorted = $orders->sortBy(fn($visit) => Carbon::parse($visit->start_time))->values();

        $this->body['visits'] = VisitsResource::collection($sorted);
        return self::apiResponse(200, null, $this->body);
    }

    protected function orderDetails($id)
    {

        $order = Visit::whereHas('booking', function ($q) {
            $q->whereHas('customer')->whereHas('address');
        })->with('booking', function ($q) {
            $q->with(['service' => function ($q) {
                $q->with('category');
            }, 'customer', 'address']);
        })->with('status')->where('id', $id)->first();
        $this->body['visits'] = VisitsResource::make($order);
        return self::apiResponse(200, null, $this->body);
    }

    protected function changeStatus(Request $request)
    {

        try {

            $rules = [
                'type'             => 'required|in:visit,order,booking',
                'cancel_reason_id' => 'nullable|exists:reason_cancels,id',
                'id'               => 'nullable|exists:visits,id',
                'image'            => 'nullable|mimes:jpeg,png,jpg,gif',
                'note'             => 'nullable|string|min:3|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);
            // Check if validation fails
            if ($validator->fails()) {
                return self::apiResponse(400, __('api.validation_failed'), $validator->errors());
            }
            if ($request->type == 'visit') {
                $rules['id']        = 'required|exists:visits,id';
                $rules['status_id'] = 'required|exists:visits_statuses,id';

                $request->validate($rules, $request->all());

                $model = Visit::with('booking.order')->where('id', $request->id)->first();
                if (! $model) {
                    return self::apiResponse(400, __('api.visit not found'), $this->body);
                }
                if ($model->visits_status_id == 6 && $request->status_id == 6) {
                    return self::apiResponse(400, __('api.this_visit_is_already_canceled'));
                }

                $data = [
                    'visits_status_id' => $request->status_id,
                    'reason_cancel_id' => $request->cancel_reason_id,
                    'note'             => $request->note,
                ];
                $image = null;

                if ($request->hasFile('image')) {
                    $image            = $request->file('image');
                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (! in_array($image->getMimeType(), $allowedMimeTypes)) {
                        return response()->json([
                            'message' => 'Invalid image type. Allowed types are: JPEG, PNG, JPG, GIF.',
                        ], 422);
                    }
                    // Check if the old image exists and delete it if it does
                    if (File::exists(public_path($model->image))) {
                        File::delete(public_path($model->image));
                    }
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    // Define the directory where the image will be stored
                    $directory = storage_path('app/public/images/visits/');
                    // Check if the directory exists, if not, create it
                    if (! File::exists($directory)) {
                        File::makeDirectory($directory, 0755, true);
                    }
                    $image->move($directory, $filename);
                    $imagePath     = 'storage/images/visits/' . $filename;
                    $data['image'] = $imagePath;
                }

                if ($request->status_id == 3) {
                    $data['start_date'] = Carbon::now('Asia/Riyadh');
                    $order              = $model->booking->order;
                    $visits_ids         = [];
                    foreach ($order->bookings as $booking) {
                        $visits_ids[] = $booking->visit->id;
                    }
                    if (! in_array(3, $visits_ids)) {
                        $order->status_id = 3;
                        $order->save();
                    }
                }

                if ($request->status_id == 5) {
                    $data['end_date'] = Carbon::now('Asia/Riyadh');
                    $techWallet       = TechnicianWallet::query()->first();
                    $serviceCost      = $model->booking->order->services->where('category_id', $model->booking->category_id)->sum('price');
                    if ($techWallet->point_type == 'rate') {
                        $money = $serviceCost * ($techWallet->price / 100);
                    } else {
                        $money = $techWallet->price;
                    }

                    if ($model->group && $model->group->technicians) {
                        $techIds = $model->group->technicians->pluck('id')->toArray();
                        $techs   = Technician::whereIn('id', $techIds)->get();

                        foreach ($techs as $tech) {
                            $tech->point += $money;
                            $tech->save();
                        }
                    }

                }

                $model->update($data);

                if ($request->status_id == 2 && $model->booking->order->userAddress) {
                    $userAddress = $model->booking->order->userAddress;

                    // Check if latitude and longitude are zero before updating
                    if ($model->lat == 0 && $model->long == 0) {
                        $dataToUpdate = [
                            'lat'  => $userAddress->lat ?? 0,
                            'long' => $userAddress->long ?? 0,
                        ];

                        // Combine the data updates into one call
                        $model->update(array_merge($data, $dataToUpdate));
                    }
                }

                if (in_array($request->status_id, [5, 6])) {
                    $order      = $model->booking->order;
                    $visits_ids = [];
                    foreach ($order->bookings as $booking) {
                        $visits_ids[] = $booking->visit->id;
                    }
                    $difference = array_diff($visits_ids, [1, 2, 3, 4]);
                    if (count($difference) == count($visits_ids)) {
                        $order->status_id = 4;
                        $order->save();
                    }
                }
                if ($request->status_id == 6) {
                    $bookingId = Visit::where('id', $request->id)->first()->booking_id;
                    $order     = Order::whereHas('bookings', function ($q) use ($bookingId) {
                        $q->where('id', $bookingId);
                    })->first();
                    $total = $order->sub_total;
                    $order->update([
                        'status_id' => 5,
                    ]);
                    $booking = Booking::where('id', $bookingId)->first();
                    $booking->update([
                        'booking_status_id' => 2,
                    ]);

                    //refund

                    // $user = Auth::user();

                    // dd($user->point);

                    $yourDate       = Carbon::parse($booking->Date)->timezone('Asia/Riyadh');
                    $currentDate    = Carbon::now('Asia/Riyadh');
                    $daysDifference = $yourDate->diffInDays($currentDate);
                    if ($daysDifference >= 2) {
                        $user = User::where('id', $model->booking->user_id)->first();
                        $user->update([
                            'point' => $user->point + $order->total ?? 0,
                        ]);
                    }
                }

                $user = User::where('id', $model->booking->user_id)->first('fcm_token');

                $order = Visit::whereHas('booking', function ($q) {
                    $q->whereHas('customer')->whereHas('address');
                })->with('booking', function ($q) {
                    $q->with(['service' => function ($q) {
                        $q->with('category');
                    }, 'customer', 'address']);
                })->with('status')->where('id', $model->id)->first();

                $adminFcmArray = Admin::whereNotNull('fcm_token')->pluck('fcm_token');

                $FcmTokenArray = $adminFcmArray->merge([$user->fcm_token]);

                $visit  = VisitsResource::make($order);
                $notify = [
                    'fromFunc'     => 'changeStatus',
                    'device_token' => $FcmTokenArray,
                    'data'         => [
                        'order_details' => $visit,
                        'type'          => 'change status',
                    ],
                ];

                if ($request->status_id == 6) {
                    $user    = User::where('id', $model->booking->user_id)->first();
                    $order   = $model->booking->order;
                    $total   = $order->sub_total;
                    $booking = $model->booking;

                    // Reset booking + order status
                    $booking->update(['booking_status_id' => 2]);
                    $order->update(['status_id' => 5]);

                    // Revert reward points (added from wallet())
                    $walletSetting = CustomerWallet::first();
                    $reward        = ($total * $walletSetting->order_percentage) / 100;
                    $rewardPoints  = min($reward, $walletSetting->refund_amount);

                    // $user->point        = max(0, $user->point - round($rewardPoints));
                    $user->point = max(0, $user->point - $rewardPoints);

                    $user->order_cancel = 1;
                    $user->save();
                }

                $this->pushNotificationBackground($notify);
                //$this->pushNotification($notify);
                $this->body['visits'] = $visit;
                return self::apiResponse(200, null, $this->body);
            }
        } catch (\Exception $e) {
            return self::apiResponse(500, __('api.Something went wrong, please try again later'), $this->body);
        }
    }

    protected function sendLatLong(Request $request)
    {
        $rules = [
            'lat'  => 'required',
            'long' => 'required',
        ];

        $request->validate($rules, $request->all());

        //  $techn = Technician::where('id',auth('sanctum')->user()->id)->first();
        $groups = Group::where('technician_id', auth('sanctum')->user()->id)->first();
        $model  = Visit::query()->where('assign_to_id', $groups->id)->where('visits_status_id', 2)->first();

        if (! $model) {
            return self::apiResponse(400, __('api.visit not found'), $this->body);
        }

        $model->update([
            'lat'  => $request->lat,
            'long' => $request->long,
        ]);

        $user = User::where('id', $model->booking->user_id)->first('fcm_token');

        $notify = [
            'fromFunc'     => 'latlong',
            'device_token' => collect([$user->fcm_token]),
            'data'         => [
                'visit_id'   => $model->id,
                'booking_id' => $model->booking_id,
                'order_id'   => $model->booking?->order_id,
                'lat'        => $request->lat,
                'long'       => $request->long,
                'type'       => 'live location',
            ],
        ];

        $this->pushNotificationBackground($notify);

        return self::apiResponse(200, __('api.Update Location successfully'), $this->body);
    }

    protected function paid(Request $request)
    {
        $rules = [
            'order_id' => 'required',
        ];

        $request->validate($rules, $request->all());

        $order = Order::query()->where('id', $request->order_id)->first();

        $order->update([
            'partial_amount' => 0,
        ]);

        return self::apiResponse(200, __('api.successfully'), $this->body);
    }

    protected function change_order_cancel(Request $request)
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
        ];

        $request->validate($rules, $request->all());

        $user = User::where('id', $request->user_id)->first();
        $user->update([
            'order_cancel' => 1,
        ]);

        return self::apiResponse(200, __('api.successfully'), $this->body);
    }

    // when Tech Change payment To Mada (Shabka)
    protected function paidfromTech(Request $request)
    {

        // Define validation rules
        $rules = [
            'order_id'       => 'required|exists:orders,id',          // Ensure the order exists
            'payment_method' => 'required|in:cache,visa,wallet,mada', // Validate payment method
        ];

        // Validate the incoming request
        $validated = $request->validate($rules);

        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Check if a transaction already exists for the given order ID
            $transaction = Transaction::where('order_id', $validated['order_id'])->first();

            if (! $transaction) {
                // Create a new transaction if none exists
                Transaction::create([
                    'order_id'       => $validated['order_id'],
                    'payment_result' => 'success',
                    'payment_method' => $validated['payment_method'],
                ]);
            } else {
                // Update the existing transaction
                $transaction->update([
                    'payment_result' => 'success',
                    'payment_method' => $validated['payment_method'],
                ]);
            }

            // Retrieve the order and ensure it exists (additional safeguard)
            $order = Order::findOrFail($validated['order_id']);

            // Update the order details
            $order->update([
                'partial_amount' => 0,
            ]);

            // Commit the transaction to save changes
            DB::commit();

            // Return a successful API response
            return self::apiResponse(200, __('api.successfully'), $this->body);
        } catch (\Exception $e) {
            // Rollback any changes in case of an error
            DB::rollBack();
            $message = $e->getMessage();

            // Return an error response
            return self::apiResponse(500, $message, []);
        }
    }

}
