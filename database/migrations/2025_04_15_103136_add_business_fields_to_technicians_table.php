<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessFieldsToTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->boolean('is_business')->default(false)->after('active');
            $table->foreignId('client_project_id')->nullable()->after('is_business')->constrained('client_projects')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->after('client_project_id')->constrained('client_project_branches')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->dropForeign(['client_project_id']);
            $table->dropForeign(['branch_id']);
            $table->dropColumn(['is_business', 'client_project_id', 'branch_id']);
        });
    }

}
