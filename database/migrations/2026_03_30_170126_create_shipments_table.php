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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            // osnovni naziv pošiljke
            $table->string('title');

            // odakle ide pošiljka
            $table->string('from_city');
            $table->string('from_country');

            // kamo ide pošiljka
            $table->string('to_city');
            $table->string('to_country');

            // cijena pošiljke
            $table->integer('price');

            // status (pending, shipped, delivered...)
            $table->string('status')->default('pending');

            // povezivanje s korisnikom
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // dodatni opis
            $table->text('details')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
