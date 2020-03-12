<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('slug')->nullable();
            $table->integer('craftsman_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->text('link')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
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
        Schema::dropIfExists('home_videos');
    }
}
