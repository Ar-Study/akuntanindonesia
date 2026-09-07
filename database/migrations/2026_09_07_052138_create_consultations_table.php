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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('telepon', 30);
            $table->string('bisnis', 100)->nullable();
            $table->string('kebutuhan', 200);
            $table->text('pesan')->nullable();
            $table->string('status', 30)->default('baru'); // baru, dihubungi, selesai, dibatalkan
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
