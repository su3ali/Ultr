<?php
namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Shift;
use App\Models\User;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test successful checkout.
     *
     * @return void
     */
    public function test_checkout_success()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create(); // Create a user

        $shift = Shift::factory()->create(); // Create a shift
        $cart = Cart::factory()->create([
            'user_id' => $user->id,
            'shift_id' => 5,
            'quantity' => 1,
        ]); // Create a cart for the user

        $response = $this->actingAs($user)->postJson('/api/v2/checkout', [
            'user_address_id' => 1,
            'car_user_id' => 1,
            'payment_method' => 'wallet',
            'shift_id' => 5,
            'amount' => 100,
            'image' => null,
            'coupon' => 10,
            'notes' => 'Test order',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'Checkout successful',
            ]);
    }

    /**
     * Test empty cart scenario.
     *
     * @return void
     */
    public function test_checkout_cart_empty()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create(); // Create a user

        $response = $this->actingAs($user)->postJson('/api/v2/checkout', [
            'user_address_id' => 1,
            'car_user_id' => 12895,
            'payment_method' => 'cache',
            'shift_id' => 1,
            'amount' => 100,
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'status' => false,
                'message' => 'Cart is empty',
            ]);
    }

    /**
     * Test insufficient wallet balance for checkout.
     *
     * @return void
     */
    public function test_checkout_wallet_insufficient_balance()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create([
            'point' => 50, // Set a wallet balance of 50

        ]); // Create a user

        $shift = Shift::factory()->create();
        $cart = Cart::factory()->create([
            'user_id' => $user->id,
            'shift_id' => $shift->id,
            'quantity' => 1,
            'price' => 1,
        ]);

        $response = $this->actingAs($user)->postJson('/api/v2/checkout', [
            'user_address_id' => 1,
            'car_user_id' => 1,
            'payment_method' => 'cache',
            'shift_id' => 5,
            'amount' => 200, // Exceeds wallet balance
            'coupon' => 0,
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'status' => false,
                'message' => 'Your wallet balance is not enough to complete this process',
            ]);
    }

    /**
     * Test checkout with unavailable shift time.
     *
     * @return void
     */
    public function test_checkout_unavailable_shift_time()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create(); // Create a user

        $shift = Shift::factory()->create(['start_time' => '09:00:00', 'end_time' => '17:00:00']);
        $cart = Cart::factory()->create([
            'user_id' => $user->id,
            'shift_id' => 5,
            'quantity' => 1,
        ]);

        $response = $this->actingAs($user)->postJson('/api/v2/checkout', [
            'user_address_id' => 1,
            'car_user_id' => 1,
            'payment_method' => 'cache',
            'shift_id' => 5,
            'amount' => 1,
            'coupon' => 0,
            'notes' => 'Test order',
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'status' => false,
                'message' => 'This Time is not available',
            ]);
    }
}
