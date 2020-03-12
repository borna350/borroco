<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('slug')->nullable();
            $table->enum('role', ['super_admin', 'admin', 'craftsman'])->default('craftsman');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('product_type')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->enum('status', ['active', 'deactivated'])->default('deactivated');
            $table->enum('craft_request', ['accept', 'reject', 'pending'])->default('pending');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
