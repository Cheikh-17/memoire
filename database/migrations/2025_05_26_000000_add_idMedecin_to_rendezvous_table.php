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
        if (!Schema::hasColumn('rendezvous', 'idMedecin')) {
            Schema::table('rendezvous', function (Blueprint $table) {
                $table->unsignedBigInteger('idMedecin')->nullable()->after('idUser');
                $table->foreign('idMedecin')->references('id')->on('medecins')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rendezvous', function (Blueprint $table) {
            $table->dropForeign(['idMedecin']);
            $table->dropColumn('idMedecin');
        });
    }
};
