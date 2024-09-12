<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableOrdersChangeCarUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['car_user_id']);
            $table->foreign('car_user_id')->references('id')->on('car_clients')->nullOnDelete()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['car_user_id']);
            $table->foreign('car_user_id')->references('id')->on('car_clients')->onDelete('cascade');
        });
    }
}
