<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Exception\Messaging as MessagingErrors;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\ApnsConfig;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

trait NotificationTrait
{

    public function pushNotification($notification)
    {
        $factory   = (new Factory)->withServiceAccount(storage_path('app/firebase-auth.json'));
        $messaging = $factory->createMessaging();

        $device_token = $notification['device_token'];

        $data = [
            'id'    => random_int(1, 9999),
            'title' => $notification['title'],
            'body'  => $notification['message'],
            'type'  => $notification['type'],
            'code'  => $notification['code'],
        ];

        $message = CloudMessage::new ()
            ->withNotification(Notification::fromArray([
                'title' => $notification['title'],
                'body'  => $notification['message'],
            ]))
            ->withAndroidConfig(AndroidConfig::new ()->withHighMessagePriority())
            ->withApnsConfig(ApnsConfig::new ()->withImmediatePriority())
            ->withData($data);

        try {
            $report = $messaging->sendMulticast($message, $device_token);
            Log::info('Successful sends: ' . $report->successes()->count() . ' Failed sends: ' . $report->failures()->count());

        } catch (MessagingException $e) {
            Log::info($e);
        } catch (MessagingErrors\NotFound $e) {
            Log::info('The target device could not be found.');
        } catch (MessagingErrors\InvalidMessage $e) {
            Log::info('The given message is malformatted.');
        } catch (MessagingErrors\ServerUnavailable $e) {
            $retryAfter = $e->retryAfter();
            Log::info('The FCM servers are currently unavailable. Retrying at ' . $retryAfter->format(\DATE_ATOM));
            $messaging->sendMulticast($message, $device_token);
        } catch (MessagingErrors\ServerError $e) {
            Log::info('The FCM servers are down.');
        } catch (MessagingException $e) {
            Log::info('Unable to send message: ' . $e->getMessage());
        }

    }

    public function pushNotificationBackground($notification)
    {
        $factory   = (new Factory)->withServiceAccount(storage_path('app/firebase-auth.json'));
        $messaging = $factory->createMessaging();

        $device_token = $notification['device_token']->filter()->toArray();

        $data = [
            'data' => json_encode($notification['data']),
        ];

        if ($notification['fromFunc'] == 'latlong') {
            if ($device_token[0]) {
                $message = CloudMessage::withTarget('token', $device_token[0])
                    ->withData($data);
                try {
                    $messaging->send($message);
                } catch (MessagingException $e) {
                    Log::info($e);
                } catch (MessagingErrors\NotFound $e) {
                    Log::info('message: ' . $e->getMessage() . ' errors: ' . $e->errors() . ' token: ' . $e->token());
                }
            } else {
                Log::info('error: not fcm token');
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
            $title        = $notification['data']['order_details']['group']['name'] . $statusList[6] . $notification['data']['order_details']['id'];
            $body         = '';
            $notification = json_decode(json_encode($notification));

            $booking_details = $notification->data->order_details->booking_details;
            if (! (is_null($booking_details->status))) {

                if ($booking_details->status->id == 6) {
                    $body = $statusList[$booking_details->status->id - 1] . $notification->data->order_details->cancel_reason->reason;
                } else {
                    $body = $statusList[$booking_details->status->id - 1];
                }
            } else {

                $body = $statusList[0];
            }

            $message = CloudMessage::new ()
                ->withNotification(Notification::fromArray([
                    'title' => $title,
                    'body'  => $body,
                ]))
                ->withAndroidConfig(AndroidConfig::new ()->withHighMessagePriority())
                ->withApnsConfig(ApnsConfig::new ()->withImmediatePriority());
            try {
                $report = $messaging->sendMulticast($message, $device_token);
                Log::info('Successful sends: ' . $report->successes()->count() . ' Failed sends: ' . $report->failures()->count());
                if ($report->hasFailures()) {
                    foreach ($report->failures()->getItems() as $failure) {
                        Log::info($failure->error()->getMessage());
                    }
                }
            } catch (MessagingException $e) {
                Log::info($e);
            } catch (MessagingErrors\NotFound $e) {
                Log::info('The target device could not be found.');
            } catch (MessagingErrors\InvalidMessage $e) {
                Log::info('The given message is malformatted.');
            } catch (MessagingErrors\ServerUnavailable $e) {
                $retryAfter = $e->retryAfter();
                Log::info('The FCM servers are currently unavailable. Retrying at ' . $retryAfter->format(\DATE_ATOM));
                $messaging->sendMulticast($message, $device_token);
            } catch (MessagingErrors\ServerError $e) {
                Log::info('The FCM servers are down.');
            } catch (MessagingException $e) {
                Log::info('Unable to send message: ' . $e->getMessage());
            }
        }

    }
}
