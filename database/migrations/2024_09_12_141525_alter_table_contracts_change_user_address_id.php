<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableContractsChangeUserAddressId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropForeign(['user_address_id']);
            $table->foreign('user_address_id')->references('id')->on('user_addresses')->nullOnDelete()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropForeign(['user_address_id']);
            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('cascade');
        });
    }
}
