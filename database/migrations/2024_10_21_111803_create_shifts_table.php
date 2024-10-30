<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('shift_no')->unique(); // Shift number with unique constraint
            $table->json('service_id'); // JSON for multiple service IDs
            $table->json('group_id'); // JSON for multiple group IDs
            $table->json('day_id'); // JSON for multiple day IDs
            $table->time('start_time'); // Shift start time
            $table->time('end_time'); // Shift end time
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}
