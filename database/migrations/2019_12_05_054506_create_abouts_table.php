<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_logo')->nullable();
            $table->longText('about_description')->nullable();
            $table->string('based_in')->nullable();
            $table->string('founded')->nullable();
            $table->string('about_banner_image')->nullable();
            $table->string('banner_title')->nullable();
            $table->longText('banner_description')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('type')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
