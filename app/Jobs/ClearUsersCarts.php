<?php

namespace App\Jobs;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClearUsersCarts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Cart::where('created_at', '<', now()->subMinutes(10))
            ->chunk(100, function ($carts) {
                foreach ($carts as $cart) {
                    $cart->update([
                        'time' => null,
                        'date' => null,
                        'region_id' => null,
                    ]);
                }
            });

    }
}
