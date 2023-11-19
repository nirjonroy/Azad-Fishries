<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('charge_amount',20,2)->nullable()->default(0);
            $table->decimal('quantity',20,2)->nullable()->default(0);
            $table->string('tag')->nullable();
            $table->string('vedio_url')->nullable();
            $table->string('payment_method',30)->nullable();
            $table->string('transaction_id',100)->nullable();
            $table->tinyInteger('delivery_charge_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('charge_amount');
            $table->dropColumn('quantity');
            $table->dropColumn('tag');
            $table->dropColumn('vedio_url');
            $table->dropColumn('payment_method');
            $table->dropColumn('transaction_id');
            $table->tinyInteger('delivery_charge_id');
        });
    }
}
