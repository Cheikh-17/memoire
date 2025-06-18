<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idMedecin')->nullable();
            $table->date('date_rendez_vous');
            $table->time('heure_rendez_vous');
            $table->string('type_de_soins');
            $table->enum('status', ['confirmer', 'en attente', 'annuler'])->default('en attente');
            $table->boolean('is_hidden')->default(false);
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idMedecin')->references('id')->on('medecins')->onDelete('cascade');
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};
