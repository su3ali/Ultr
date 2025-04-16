<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_project_service_prices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_project_id');
            $table->unsignedBigInteger('service_id');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('client_project_id')->references('id')->on('client_projects')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            // name for unique index
            $table->unique(['client_project_id', 'service_id'], 'project_service_unique');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('client_project_service_prices');
    }
};
