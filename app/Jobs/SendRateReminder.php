<?php

namespace App\Jobs;

use App\Models\Visit;
use App\Traits\NotificationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRateReminder implements ShouldQueue
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
        $visits = Visit::with(('booking.customer'))->where('visits_status_id', '!=', 6)->whereBetween('end_date', [now()->subMinutes(25)->format('Y-m-d H:i:s'), now()->subMinutes(20)->format('Y-m-d H:i:s')])->get();
        $usersFcmTokens = $visits->pluck('booking.customer.fcm_token')->toArray();

        if (count($usersFcmTokens) > 0) {

            $notification = [
                'device_token' => $usersFcmTokens,
                'title' => 'الترا',
                'message' => 'لا تنسى تقيم التطبيق وتجربتك مع الترا',
                'type' => '',
                'code' => 2
            ];

            $this->pushNotification($notification);
        }
    }
}
