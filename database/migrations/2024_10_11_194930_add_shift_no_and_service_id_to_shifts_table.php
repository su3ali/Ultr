<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShiftNoAndServiceIdToShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shifts', function (Blueprint $table) {
            if (! Schema::hasColumn('shifts', 'shift_no')) {
                $table->integer('shift_no')->after('id');
            }

            if (! Schema::hasColumn('shifts', 'service_id')) {
                $table->unsignedBigInteger('service_id')->after('shift_no');
                $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shifts', function (Blueprint $table) {
            $table->dropColumn('shift_no');
            $table->dropForeign(['service_id']);

        });
    }
}
