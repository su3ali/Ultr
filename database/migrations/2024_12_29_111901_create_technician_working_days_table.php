<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicianWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technician_working_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technician_id');
            $table->unsignedBigInteger('day_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');

            // Prevent duplicate entries
            $table->unique(['technician_id', 'day_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technician_working_days');
    }
}
