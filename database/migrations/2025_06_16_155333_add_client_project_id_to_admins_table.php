<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientProjectIdToAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->unsignedBigInteger('client_project_id')->nullable()->after('type');

            $table->foreign('client_project_id')->references('id')->on('client_projects')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['client_project_id']);
            $table->dropColumn('client_project_id');
        });
    }
}
