<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->integer('idTrans')->unsigned();
            $table->integer('idMenu')->unsigned();
            $table->integer('price');
            $table->tinyInteger('lots');
            $table->integer('subTotal');

            $table->primary(['idTrans','idMenu']);
            $table->foreign('idTrans')->references('id')->on('transactions');
            $table->foreign('idMenu')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
