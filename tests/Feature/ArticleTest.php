<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->seed(DatabaseSeeder::class);
    }

    public function test_homepage_displays_three_articles_and_view_all_button(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('ARTIKEL &amp; WAWASAN', false);
        $response->assertSee('Lihat Semua Artikel &amp; Wawasan', false);
        $response->assertSee(route('article.index'));
    }

    public function test_articles_index_page_loads_successfully(): void
    {
        $response = $this->get('/berita');

        $response->assertStatus(200);
        $response->assertSee('Wawasan Finansial, Coretax &amp;', false);
        $response->assertSee('Panduan Coretax DJP Terbaru');
        $response->assertSee('5 Kesalahan Fatal Pembukuan Bisnis UMKM');
    }

    public function test_article_detail_page_loads_successfully(): void
    {
        $slug = 'panduan-coretax-djp-bagi-umkm-dan-perusahaan';
        $response = $this->get('/berita/'.$slug);

        $response->assertStatus(200);
        $response->assertSee('Panduan Coretax DJP Terbaru');
        $response->assertSee('Ringkasan Poin Kunci Wawasan:');
        $response->assertSee('Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA');
        $response->assertSee('Artikel Finansial &amp; Pajak Lainnya', false);
    }

    public function test_article_detail_returns_404_for_invalid_slug(): void
    {
        $response = $this->get('/berita/artikel-tidak-ditemukan');

        $response->assertStatus(404);
    }
}
