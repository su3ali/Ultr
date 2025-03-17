<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customer_complaints_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_complaint_id')
                ->constrained('customer_complaints')
                ->onDelete('cascade');

            $table->foreignId('admin_id')
                ->constrained('admins')
                ->onDelete('cascade');

            $table->text('text')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();

            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('customer_complaints_replies');
    }
};
