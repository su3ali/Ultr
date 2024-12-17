<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
=======
            $table->string('name_ar')->unique();
>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
            $table->string('name')->unique(); // e.g., 'Monday'
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
<<<<<<< HEAD

=======
>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
