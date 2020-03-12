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
            $table->bigIncrements('id');
            $table->bigInteger('admin_id');
            $table->bigInteger('craftsman_id');
            $table->text('slug');
            $table->bigInteger('material_id')->nullable();
            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->double('price', 10, 2)->nullable();
            $table->double('tax', 10, 2)->nullable();
            $table->string('discount_price', 30)->nullable();
            $table->tinyInteger('discount_prescriptions')->default(0);
            $table->longText('description')->nullable();
            $table->longText('customer_production')->nullable();
            $table->string('thum_image_1')->nullable();
            $table->string('thum_image_2')->nullable();
            $table->integer('in_stock')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('product_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('size', 30)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('product_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('colors', 30)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('product_shipping_returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('shipping_ue')->nullable();
            $table->string('shipping_extra_ue')->nullable();
            $table->string('delivery_time')->nullable();
            $table->text('return_policy')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('product_shipping_returns');
        Schema::dropIfExists('product_colors');
        Schema::dropIfExists('product_sizes');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('products');
    }
}
