<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Traits\NotificationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVisitReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, NotificationTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bookings = Booking::with('customer')->whereHas('visit', function ($qu) {
            $qu->whereNotIn('visits_status_id', [5, 6]);
        })->whereDate('date', '=', date('Y-m-d'))
            ->whereBetween('time', [now()->addMinutes(55)->format('H:i:s'), now()->addMinutes(60)->format('H:i:s')])
            ->get();
        $usersFcmTokens = $bookings->pluck('customer.fcm_token')->toArray();
        if (count($usersFcmTokens) > 0) {

            $notification = [
                'device_token' => $usersFcmTokens,
                'title' => 'الترا',
                'message' => 'اقترب موعد زيارتك',
                'type' => '',
                'code' => 2
            ];

            $this->pushNotification($notification);
        }
    }
}
