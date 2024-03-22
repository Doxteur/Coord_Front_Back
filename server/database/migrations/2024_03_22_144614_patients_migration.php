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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('age');
            $table->string('adresse');
            $table->string('tel');
            $table->string('diagnostic');
            $table->string('uuid');
            $table->timestamps();
            $table->foreignId('maladie_id')->constrained('maladies')->default(2);
            $table->foreignId('chambre_id')->nullable()->constrained('chambres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('patients');
    }
};
