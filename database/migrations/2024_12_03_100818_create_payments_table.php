<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to users table
            $table->unsignedBigInteger('transaction_id')->nullable(); // References the transactions table
            $table->decimal('amount', 10, 2)->nullable(); // Payment amount
            $table->enum('status', ['pending', 'success', 'failed', 'cancelled'])->default('pending'); // Payment status
            $table->string('payment_method')->nullable(); // Payment method
            $table->string('phone')->nullable(); // Mobile number used for payment
            $table->json('gateway_response')->nullable(); // JSON data for gateway response
            $table->timestamp('payment_date')->nullable(); // Date and time of payment
            $table->text('description')->nullable(); // Description or notes
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign keys and indexes
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->index(['status', 'payment_date']); // Optional index for better performance
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
