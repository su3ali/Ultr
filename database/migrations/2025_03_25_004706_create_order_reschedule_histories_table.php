<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRescheduleHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_reschedule_histories', function (Blueprint $table) {
            $table->id();

            // Order and Booking Relationships
            $table->foreignId('order_id')->nullable()->constrained('orders')->cascadeOnDelete();
            $table->foreignId('order_status_id')->nullable()->constrained('order_statuses')->cascadeOnDelete();
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('booking_status_id')->nullable()->constrained('booking_statuses')->cascadeOnDelete();

            // Booking Date and Time
            $table->date('booking_date');
            $table->time('booking_time');

            // User Address (Optional)
            $table->foreignId('user_address_id')->nullable()->constrained('user_addresses')->cascadeOnDelete();

            // Visit Relationships
            $table->foreignId('visit_id')->nullable()->constrained('visits')->cascadeOnDelete();
            $table->foreignId('visit_status_id')->nullable()->constrained('visits_statuses')->cascadeOnDelete();

            // Assigned Group (Technician/Team)
            $table->foreignId('assign_to_id')->nullable()->constrained('groups')->cascadeOnDelete();

            // Visit Start and End Times
            $table->time('visit_start_time')->nullable();
            $table->time('visit_end_time')->nullable();

            // Admin Actions
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete();

            // Cancellation Reason (If applicable)
            $table->foreignId('reason_cancel_id')->nullable()->constrained('reason_cancels')->cascadeOnDelete();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_reschedule_histories');
    }
}
