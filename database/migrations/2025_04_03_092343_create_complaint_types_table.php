<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaint_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->unique();        // English name
            $table->string('name_ar')->unique();        // Arabic name
            $table->text('description_en')->nullable(); // English description
            $table->text('description_ar')->nullable(); // Arabic description
            $table->softDeletes();                      // Soft delete column
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaint_types');
    }
};
