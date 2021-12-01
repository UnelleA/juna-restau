<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LivraisonPayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('compte_id')->constrained();
            $table->string('lieu_livraison');
            $table->string('ville_livraison');
            $table->integer('prix_livraison');
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
        Schema::dropIfExists('livraison_payements');
    }
}

    /**
     * Reverse the migrations.
     *
//      * @return void
//      */
//     public function down()
//     {
//         //
//     }
// }
