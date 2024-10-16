<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('shift_no')->after('id');// Add shift_no column
            $table->unsignedBigInteger('service_id')->after('shift_no');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('group_id'); // Foreign key for the group
            $table->unsignedBigInteger('day_id'); // Foreign key for the day
            $table->time('start_time'); // Shift start time
            $table->time('end_time'); // Shift end time
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps(); // Created at and Updated at timestamps

            // Foreign key constraints
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}
