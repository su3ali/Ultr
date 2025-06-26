<?php
namespace App\Services\Wallet;

use App\Models\Order;
use App\Models\RefundLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class WalletRefundService
{
    /**
     * Handle refunding an order to the user's balance.
     *
     * @param  Order        $order
     * @param  string|null  $reason
     * @param  string       $method  ['points', 'cash', 'card']
     * @param  int|null     $adminId
     * @return void
     *
     * @throws ValidationException|\Exception
     */
    public function handle(Order $order, ?string $reason = null, string $method = 'points', ?int $adminId = null): void
    {
        if (! in_array($method, ['points', 'cash', 'card'])) {
            throw new \InvalidArgumentException__('dash.invalid_refund_method');
        }

        if ($order->bookings->first()->visit->visits_status_id !== 6) {
            throw ValidationException::withMessages([
                'order' => __('dash.cant_refund_order'),
            ]);
        }

        if ($order->is_refunded) {
            throw ValidationException::withMessages([
                'order' => __('dash.order_already_refunded'),
            ]);
        }

        DB::transaction(function () use ($order, $method, $reason, $adminId) {
            match ($method) {
                'points' => $order->user->increment('point', $order->total),
            // 'cash' => ... future handling,
            // 'card' => ... future handling,
                default  => throw new \RuntimeException__('dash.invalid_refund_method'),
            };

            $order->update([
                'is_refunded' => true,

            ]);

            $user = auth()->user();

            RefundLog::create([
                'user_id'   => $order->user_id,
                'order_id'  => $order->id,
                'by_admin'  => $adminId ?? $user->id,
                'amount'    => $order->total,
                'method'    => $method,
                'reason'    => $reason ?? 'استرداد  من لوحة التحكم',
                'reference' => 'ORD-' . $order->id . '-REF',
            ]);
        });
    }
}
