<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offre_sauvegardes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidat_id');
            $table->unsignedBigInteger('offre_emploi_id');
            $table->timestamps();

            $table->unique(['candidat_id', 'offre_emploi_id']);

            $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
            $table->foreign('offre_emploi_id')->references('id')->on('offre_emplois')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offre_sauvegardes');
    }
};