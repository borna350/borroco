<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->String('first_name')->nullable();
            $table->String('last_name')->nullable();
            $table->String('company_name')->nullable();
            $table->integer('country_id')->nullable();
            $table->String('street_address')->nullable();
            $table->String('apartment_name')->nullable();
            $table->String('town')->nullable();
            $table->String('district')->nullable();
            $table->String('post_code')->nullable();
            $table->String('phone')->nullable();
            $table->String('email')->nullable();
            
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
        Schema::dropIfExists('billing_addresses');
    }
}
