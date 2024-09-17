<?php

namespace App\Traits;

use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\ApnsConfig;
use Kreait\Firebase\Messaging\CloudMessage;
use Illuminate\Support\Facades\Log;


trait NotificationTrait
{

    public function pushNotification($notification)
    {
        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase-auth.json'));
        $messaging = $factory->createMessaging();

        $device_token = $notification['device_token'];

        $data = [
            'id' => random_int(1, 9999),
            'title' => $notification['title'],
            'body' => $notification['message'],
            'type' => $notification['type'],
            'code' => $notification['code'],
        ];

        if (count($device_token) > 1) {
            $message = CloudMessage::new()
                ->withNotification([
                    'title' => $notification['title'],
                    'body' => $notification['message'],
                ])
                ->withAndroidConfig(AndroidConfig::new()->withHighPriority())
                ->withApnsConfig(ApnsConfig::new()->withImmediatePriority())
                ->withData($data);

            try {
                $messaging->sendMulticast($message, $device_token);
            } catch (MessagingException $e) {
                Log::info($e);
            }
        } else {
            $message = CloudMessage::withTarget('token', $device_token[0])
                ->withNotification([
                    'title' => $notification['title'],
                    'body' => $notification['message'],
                ])
                ->withAndroidConfig(AndroidConfig::new()->withHighPriority())
                ->withApnsConfig(ApnsConfig::new()->withImmediatePriority())
                ->withData($data);

            try {
                $messaging->send($message);
            } catch (MessagingException $e) {
                Log::info($e);
            }
        }

    }

    public function sendAllNotification($notification)
    {

        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase-auth.json'));
        $messaging = $factory->createMessaging();

        $data = [
            'id' => random_int(1, 9999),
            'title' => $notification['title'],
            'body' => $notification['message'],
            'type' => $notification['type'],
            'code' => $notification['code'],

        ];

        $message = CloudMessage::fromArray([
            'topic' => 'ultra_customers',
            'notification' => [
                'title' => $notification['title'],
                'body' => $notification['message'],
            ],
            'data' => $data,
        ])->withAndroidConfig(AndroidConfig::new()->withHighPriority())
            ->withApnsConfig(ApnsConfig::new()->withImmediatePriority());

        try {
            $messaging->send($message);
        } catch (MessagingException $e) {
            Log::info($e);
        }
    }

    public function pushNotificationBackground($notification)
    {
        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase-auth.json'));
        $messaging = $factory->createMessaging();

        $device_token = $notification['device_token'];

        $data = [
            'data' => json_encode($notification['data']),
        ];

        if ($notification['fromFunc'] == 'latlong') {

            $message = CloudMessage::withTarget('token', $device_token[0])
                ->withData($data);

            try {
                $messaging->send($message);
            } catch (MessagingException $e) {
                Log::info($e);
            }
        } else {
            $statusList = [
                'طلبك باقي نرسلك افضل الأخصائيين عندنا',
                ' فريقنا جايين لعندك ياريت تجهز مكان العمل',
                ' فريق الترا بدأ بالخدمة هالحين',
                'ارسلنا لك طلب تسليم اذا شغلنا زين وافق عليها',
                'حبينا نشكرك على انتظارك طلبك مكتمل الحين',
                'تم إلغاء الطلب للأسباب التالية: ',
                ' للزيارة رقم ',
            ];
            $title = $notification['data']['order_details']['group']['name'] . $statusList[6] . $notification['data']['order_details']['id'];
            $body = '';
            $notification = json_decode(json_encode($notification));

            $booking_details = $notification->data->order_details->booking_details;
            if (!(is_null($booking_details->status))) {

                if ($booking_details->status->id == 6) {
                    $body = $statusList[$booking_details->status->id - 1] . $notification->data->order_details->cancel_reason->reason;
                } else {
                    $body = $statusList[$booking_details->status->id - 1];
                }
            } else {

                $body = $statusList[0];
            }

            foreach ($device_token as $token) {
                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification([
                        'title' => $title,
                        'body' => $body,
                    ])
                    ->withAndroidConfig(AndroidConfig::new()->withHighPriority())
                    ->withApnsConfig(ApnsConfig::new()->withImmediatePriority());
                try {
                    $messaging->send($message);
                } catch (MessagingException $e) {
                    Log::info($e);
                }
            }
        }

    }
}
