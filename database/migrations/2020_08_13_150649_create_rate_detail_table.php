<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rate_id');
            $table->unsignedBigInteger('to_currency_id');
            $table->float('exchange_rate', 11, 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_detail');
    }
}
