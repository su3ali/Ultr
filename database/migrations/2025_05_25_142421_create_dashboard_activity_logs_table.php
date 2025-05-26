<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dashboard_activity_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('action_type', 100);

            $table->string('model_type')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();

            $table->text('description')->nullable();

            $table->json('changes')->nullable();

            $table->json('meta')->nullable();

            $table->ipAddress('ip_address')->nullable();

            $table->softDeletes();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('admins')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dashboard_activity_logs');
    }
};
