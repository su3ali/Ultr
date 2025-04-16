<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('business_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('car_id')->nullable()->constrained('car_clients')->nullOnDelete(); // ⬅️ تمت إضافتها هنا

            $table->unsignedBigInteger('category_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('service_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('status_id')->constrained()->cascadeOnDelete();

            $table->unsignedBigInteger('assign_to_id')->nullable()->constrained('groups')->nullOnDelete();
            $table->unsignedBigInteger('reason_cancel_id')->nullable()->constrained('reason_cancels')->nullOnDelete();
            $table->unsignedBigInteger('payment_method_id')->nullable()->constrained('payment_methods')->nullOnDelete();

            $table->string('coupon_code')->nullable();
            $table->double('discount')->default(0);
            $table->double('sub_total')->nullable();
            $table->double('total')->nullable();
            $table->double('partial_amount')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_orders');
    }
}
