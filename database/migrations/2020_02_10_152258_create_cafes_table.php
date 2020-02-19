<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc')->nullable();
            $table->integer('idOwner')->unsigned();
            $table->string('noHp');
            $table->string('noWA')->nullable();
            $table->string('street')->nullable();
            $table->string('subDistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->integer('postalCode')->nullable();
            $table->string('timeOpen')->nullable();
            $table->string('timeClose')->nullable();
            $table->string('picture')->nullable();
            $table->tinyInteger('is_open')->default(0);
            $table->tinyInteger('is_active')->default(0);
            $table->string('lang')->nullable();
            $table->string('long')->nullable();
            $table->timestamps();

            $table->foreign('idowner')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafes');
    }
}
