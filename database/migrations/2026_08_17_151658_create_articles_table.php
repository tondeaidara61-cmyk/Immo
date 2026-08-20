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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->decimal('surface', 5, 2);
            $table->decimal('prix', 10, 2);
            $table->string('description')->nullable();
            $table->integer('piece');
            $table->integer('chambre');
            $table->integer('etage');
            $table->string('ville');

            $table->string('commune');
            $table->string('quatier');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
