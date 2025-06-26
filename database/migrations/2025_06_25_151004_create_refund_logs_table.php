<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('by_admin')->nullable()->constrained('admins')->onDelete('set null');
            $table->decimal('amount', 10, 2);
            $table->enum('method', ['points', 'cash', 'card'])->default('points');
            $table->string('reason')->nullable();
            $table->string('reference')->nullable();
            $table->json('meta')->nullable();
            $table->index(['user_id', 'order_id']);
            $table->index('by_admin');
            $table->index('method');

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
        Schema::dropIfExists('refund_logs');

    }

}
