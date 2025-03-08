<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRateTraineesTable extends Migration
{
    public function up()
    {
        Schema::table('rate_trainees', function (Blueprint $table) {
            $table->unsignedBigInteger('rate_id')->nullable()->after('trainee_id');
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');

            $table->dropColumn('rate');
        });
    }

    public function down()
    {
        Schema::table('rate_trainees', function (Blueprint $table) {
            $table->enum('rate', ['ممتاز جدا', 'ممتاز', 'جيد جدا', 'جيد', 'سيئ'])->nullable(); 
            $table->dropForeign(['rate_id']);
            $table->dropColumn('rate_id');
        });
    }
}
