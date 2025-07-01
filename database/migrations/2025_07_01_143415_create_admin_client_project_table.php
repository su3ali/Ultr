<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminClientProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_client_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_project_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_client_project');
    }
}
