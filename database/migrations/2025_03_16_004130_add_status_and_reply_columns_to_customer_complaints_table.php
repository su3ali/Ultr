<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('customer_complaints', function (Blueprint $table) {
            if (! Schema::hasColumn('customer_complaints', 'customer_complaints_status_id')) {
                $table->foreignId('customer_complaints_status_id')
                    ->nullable()
                    ->constrained('customer_complaints_statuses')
                    ->onDelete('cascade')->default(1)
                    ->after('video');
            }

            if (! Schema::hasColumn('customer_complaints', 'last_reply')) {
                $table->text('last_reply')->nullable()->after('customer_complaints_status_id');
            }

            if (! Schema::hasColumn('customer_complaints', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('last_reply');
            }

            if (! Schema::hasColumn('customer_complaints', 'is_replied')) {
                $table->boolean('is_replied')->default(false)->after('is_read');
            }

            if (! Schema::hasColumn('customer_complaints', 'reply_time')) {
                $table->timestamp('reply_time')->nullable()->after('is_replied');
            }
        });
    }

    public function down()
    {
        Schema::table('customer_complaints', function (Blueprint $table) {
            if (Schema::hasColumn('customer_complaints', 'customer_complaints_status_id')) {
                $table->dropForeign(['customer_complaints_status_id']);
                $table->dropColumn('customer_complaints_status_id');
            }

            if (Schema::hasColumn('customer_complaints', 'last_reply')) {
                $table->dropColumn('last_reply');
            }

            if (Schema::hasColumn('customer_complaints', 'is_read')) {
                $table->dropColumn('is_read');
            }

            if (Schema::hasColumn('customer_complaints', 'is_replied')) {
                $table->dropColumn('is_replied');
            }

            if (Schema::hasColumn('customer_complaints', 'reply_time')) {
                $table->dropColumn('reply_time');
            }
        });
    }
};
