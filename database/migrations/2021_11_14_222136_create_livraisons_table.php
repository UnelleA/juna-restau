<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ville_id');
            $table->unsignedDecimal('cout');
            $table->string('distance');
            $table->unsignedBigInteger('restaurant_id');
            $table->timestamps();
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->foreign('restaurant_id')->references('id')->on('comptes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livraisons');
    }
}
