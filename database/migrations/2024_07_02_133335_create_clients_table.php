<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('preNom')->nullable();
            $table->string('nom')->nullable();
            $table->string('mail')->nullable();

            $table->string('age')->nullable();
            $table->double('numeroTel')->nullable();
            $table->string('sexe')->nullable();
            $table->string('adresse')->nullable();

            // Ajoutez d'autres colonnes au besoin

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
        Schema::dropIfExists('clients');
    }
};
