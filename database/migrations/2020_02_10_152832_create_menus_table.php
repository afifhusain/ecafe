<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCafe')->unsigned();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('categori');
            $table->integer('price');
            $table->tinyInteger('is_available')->default(1);
            $table->string('picture')->nullable();
            $table->timestamps();

            $table->foreign('idCafe')->references('id')->on('cafes');
            $table->foreign('categori')->references('categori')->on('menu_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
