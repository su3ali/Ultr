<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessOrderTechnicianHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('business_order_technician_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained('business_orders')->cascadeOnDelete();

            $table->unsignedBigInteger('technician_id')->constrained('technicians')->cascadeOnDelete();
            $table->unsignedBigInteger('group_id')->nullable()->constrained('groups')->nullOnDelete();

            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_order_technician_histories');
    }
}
