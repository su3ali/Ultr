<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if the column does not exist before adding
        if (! Schema::hasColumn('customer_complaints', 'complaint_type_id')) {
            Schema::table('customer_complaints', function (Blueprint $table) {
                $table->foreignId('complaint_type_id')
                    ->after('order_id')
                    ->default(1)
                    ->constrained('complaint_types')
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
            });
        }
    }

    public function down()
    {
        // Always good to check if it exists before dropping
        if (Schema::hasColumn('customer_complaints', 'complaint_type_id')) {
            Schema::table('customer_complaints', function (Blueprint $table) {
                $table->dropForeign(['complaint_type_id']);
                $table->dropColumn('complaint_type_id');
            });
        }
    }
};
