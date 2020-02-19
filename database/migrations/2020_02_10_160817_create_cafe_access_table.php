<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafeAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafe_access', function (Blueprint $table) {
            $table->integer('idAdm')->unsigned();
            $table->integer('idCafe')->unsigned();
            $table->tinyInteger('is_confirm')->default('0');
            $table->timestamps();

            $table->primary(['idAdm', 'idCafe']);
            $table->foreign('idAdm')->references('id')->on('admins');
            $table->foreign('idCafe')->references('id')->on('cafes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafe_access');
    }
}
