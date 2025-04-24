<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectBranchFloorToBusinessOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('client_project_id')->nullable()->after('car_id');
            $table->unsignedBigInteger('branch_id')->nullable()->after('client_project_id');
            $table->unsignedBigInteger('floor_id')->nullable()->after('branch_id');

            // optional: add foreign keys
            $table->foreign('client_project_id')->references('id')->on('client_projects')->nullOnDelete();
            $table->foreign('branch_id')->references('id')->on('client_project_branches')->nullOnDelete();
            $table->foreign('floor_id')->references('id')->on('client_project_branch_floors')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('business_orders', function (Blueprint $table) {
            $table->dropForeign(['client_project_id']);
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['floor_id']);
            $table->dropColumn(['client_project_id', 'branch_id', 'floor_id']);
        });
    }

}
