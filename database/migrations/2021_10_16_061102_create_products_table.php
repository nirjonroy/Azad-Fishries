<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->decimal('purchase_price',20,2)->nullable()->default(0);
            $table->decimal('old_price',20,2)->nullable()->default(0);
            $table->decimal('sell_price',20,2)->nullable()->default(0);
            $table->text('description');
            $table->tinyInteger('category_id');
            $table->tinyInteger('sub_category_id')->nullable();
            $table->tinyInteger('brand_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
