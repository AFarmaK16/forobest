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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photo_id'); // Clé étrangère vers la table photos
            $table->unsignedBigInteger('parent_id')->nullable(); // Réponses à un commentaire
            $table->string('name'); // Nom du visiteur
            $table->string('email'); // Email du visiteur
            $table->text('message'); // Contenu du commentaire
            $table->timestamps();
    
            // Contraintes
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
