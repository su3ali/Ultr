<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_trainees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key for users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('trainee_id')->nullable(); // Foreign key for technicians
            $table->foreign('trainee_id')->references('id')->on('technicians')->onDelete('cascade');

            $table->enum('rate', ['ممتاز جدا', 'ممتاز', 'جيد جدا', 'جيد', 'سيئ']); // Enum column for rating
            $table->text('note')->nullable(); // Optional note field

            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_trainees');
    }
}
