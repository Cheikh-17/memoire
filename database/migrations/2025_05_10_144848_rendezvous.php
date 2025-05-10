<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            
            $table->date('date-rendez-vous');
            $table->time('heure-rendez-vous');
            $table->string('type-de-soins');
            $table->enum('status',['confirmer', 'en attente', 'annuler'])->default('en attente');
            $table->string('is-hidden')->default(false);
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idMedecin')->references('id')->on('medecins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};