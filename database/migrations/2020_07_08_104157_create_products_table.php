<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('prod_id');
            $table->string('product_name');
            $table->float('product_price',6,3);
            $table->float('offer_price',6,3);
            $table->string('total_quantity');
            $table->string('product_pic1');
            $table->string('product_pic2');
            $table->string('product_pic3');
            $table->string('description');
            $table->string('type');
            $table->string('category');
            $table->integer('views');
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
