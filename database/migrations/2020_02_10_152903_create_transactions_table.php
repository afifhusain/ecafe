<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCafe')->unsigned();
            $table->integer('idEmp')->unsigned();
            $table->integer('idCus')->unsigned()->nullable();
            $table->integer('idTbl')->unsigned()->nullable();
            $table->tinyInteger('peoples')->nullable();
            $table->timestamp('booking_at')->nullable();
            $table->timestamp('transaction_at')->nullable();
            $table->enum('status', ['booking','success','cancelled']);
            $table->integer('total');
            $table->string('comment')->default('no comment');
            
            $table->foreign('idCafe')->references('id')->on('cafes');
            $table->foreign('idEmp')->references('id')->on('admins');
            $table->foreign('idCus')->references('id')->on('customers');
            $table->foreign('idTbl')->references('id')->on('tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
