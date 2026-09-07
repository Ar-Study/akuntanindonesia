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
            $table->string('slug')->unique();
            $table->string('category')->default('Wawasan & Regulasi');
            $table->string('date_formatted')->nullable();
            $table->string('read_time')->default('5 menit baca');
            $table->string('author')->default('Hendra Setiyawan, S.E., M.Ak., Ak., CA');
            $table->string('author_role')->default('Managing Partner & Kuasa Hukum Pengadilan Pajak');
            $table->text('excerpt')->nullable();
            $table->json('highlights')->nullable();
            $table->longText('content');
            $table->json('tags')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('views')->default(0);
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
