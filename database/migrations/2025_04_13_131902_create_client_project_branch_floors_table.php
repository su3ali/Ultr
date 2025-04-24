<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProjectBranchFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_project_branch_floors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('client_project_branches')->cascadeOnDelete();

            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('floor_number')->nullable();

            $table->text('notes')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_project_branch_floors');
    }
}
