<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicianBranchFloorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technician_branch_floor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technician_id')->constrained('technicians')->cascadeOnDelete();
            $table->foreignId('floor_id')->constrained('client_project_branch_floors')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['technician_id', 'floor_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('technician_branch_floor');
    }

}
