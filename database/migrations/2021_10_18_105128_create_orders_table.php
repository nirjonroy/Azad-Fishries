<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('district')->nullable();
            $table->decimal('before_discount',20,2)->nullable()->default(0);
            $table->decimal('total',20,2)->nullable()->default(0);
            $table->decimal('discount',20,2)->nullable()->default(0);
            $table->decimal('shipping_charge',20,2)->nullable()->default(0);
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
        Schema::dropIfExists('orders');
    }
}
