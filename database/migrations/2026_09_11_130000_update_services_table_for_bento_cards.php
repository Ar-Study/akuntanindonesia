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
        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->default('pembukuan')->after('slug');
            $table->string('category_label')->nullable()->after('category');
            $table->string('color')->default('ruby')->after('badge');
            $table->string('icon')->default('📊')->after('color');
            $table->text('subtitle')->nullable()->change();
            $table->text('desc')->nullable()->after('subtitle');
            $table->json('points')->nullable()->after('desc');
            $table->string('mascot_tip')->nullable()->after('points');
            $table->boolean('is_active')->default(true)->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'category_label',
                'color',
                'icon',
                'desc',
                'points',
                'mascot_tip',
                'is_active',
            ]);
        });
    }
};
