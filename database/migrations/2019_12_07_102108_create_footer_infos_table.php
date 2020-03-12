<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('shipping_text');
            $table->longText('payments_text');
            $table->longText('returns_text');
            $table->longText('contacts_text');
            $table->longText('resi_text');
            $table->longText('company_text');
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
        Schema::dropIfExists('footer_infos');
    }
}
