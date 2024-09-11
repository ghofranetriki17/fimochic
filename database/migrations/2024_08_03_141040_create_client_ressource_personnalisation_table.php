<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRessourcePersonnalisationTable extends Migration
{
    public function up()
    {
        Schema::create('client_ressource_personnalisation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('ressource_personnalisation_id');
            $table->integer('quantite'); // Nombre de chaque ressource choisie
            $table->integer('prix_total');

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('ressource_personnalisation_id')->references('id')->on('ressources_personnalisation')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_ressource_personnalisation');
    }
}
