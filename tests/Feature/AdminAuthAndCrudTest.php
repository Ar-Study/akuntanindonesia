<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthAndCrudTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');

        $this->admin = User::firstOrCreate(
            ['email' => 'admin@akuntanindonesia.id'],
            [
                'name' => 'Administrator Akuntan.ID',
                'password' => Hash::make('AdminAkuntan2026!'),
            ]
        );
    }

    public function test_guest_is_redirected_to_secret_login_when_accessing_admin_portal(): void
    {
        $response = $this->get('/portal-admin');

        $response->assertRedirect(route('admin.login'));
    }

    public function test_secret_admin_login_page_loads_successfully(): void
    {
        $response = $this->get('/portal-admin/login');

        $response->assertStatus(200);
        $response->assertSee('Portal Administrator');
        $response->assertSee('Email Administrator');
    }

    public function test_admin_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post('/portal-admin/login', [
            'email' => 'admin@akuntanindonesia.id',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_admin_can_login_with_valid_credentials_and_access_dashboard(): void
    {
        $response = $this->post('/portal-admin/login', [
            'email' => 'admin@akuntanindonesia.id',
            'password' => 'AdminAkuntan2026!',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->admin);

        $dashboardResponse = $this->actingAs($this->admin)->get('/portal-admin');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Dashboard');
        $dashboardResponse->assertSee('Selamat Datang di Pusat Kendali Akuntan.ID');
    }

    public function test_admin_can_create_update_and_delete_category(): void
    {
        $this->actingAs($this->admin);

        Category::where('slug', 'perpajakan-internasional')->delete();

        // 1. Create Category
        $response = $this->post('/portal-admin/categories', [
            'name' => 'Perpajakan Internasional',
            'slug' => 'perpajakan-internasional',
            'description' => 'Materi seputar transfer pricing dan treaty tax.',
        ]);

        $response->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', ['slug' => 'perpajakan-internasional']);

        $category = Category::where('slug', 'perpajakan-internasional')->firstOrFail();

        // 2. Update Category
        $updateResponse = $this->put('/portal-admin/categories/'.$category->id, [
            'name' => 'Perpajakan Internasional & FTZ',
            'slug' => 'perpajakan-internasional',
            'description' => 'Materi seputar transfer pricing dan kawasan bebas Batam.',
        ]);

        $updateResponse->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', ['name' => 'Perpajakan Internasional & FTZ']);

        // 3. Delete Category
        $deleteResponse = $this->delete('/portal-admin/categories/'.$category->id);
        $deleteResponse->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_admin_can_create_update_and_delete_author(): void
    {
        $this->actingAs($this->admin);

        Author::where('name', 'Ahmad Dani, S.E., BKP')->delete();

        // 1. Create Author
        $response = $this->post('/portal-admin/authors', [
            'name' => 'Ahmad Dani, S.E., BKP',
            'role' => 'Senior Tax Consultant Batam',
            'bio' => 'Konsultan pajak berlisensi dengan spesialisasi kepatuhan PPN dan PPh Badan.',
            'email' => 'ahmad@akuntanindonesia.id',
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.authors.index'));
        $this->assertDatabaseHas('authors', ['name' => 'Ahmad Dani, S.E., BKP']);

        $author = Author::where('name', 'Ahmad Dani, S.E., BKP')->firstOrFail();

        // 2. Update Author
        $updateResponse = $this->put('/portal-admin/authors/'.$author->id, [
            'name' => 'Ahmad Dani, S.E., BKP, CA',
            'role' => 'Partner Tax & Advisory Batam',
            'bio' => 'Konsultan pajak berlisensi dan Chartered Accountant.',
            'email' => 'ahmad@akuntanindonesia.id',
            'is_active' => '1',
        ]);

        $updateResponse->assertRedirect(route('admin.authors.index'));
        $this->assertDatabaseHas('authors', ['name' => 'Ahmad Dani, S.E., BKP, CA']);

        // 3. Delete Author
        $deleteResponse = $this->delete('/portal-admin/authors/'.$author->id);
        $deleteResponse->assertRedirect(route('admin.authors.index'));
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    public function test_admin_can_create_update_and_delete_article(): void
    {
        $this->actingAs($this->admin);

        $cat = Category::firstOrCreate(['name' => 'Regulasi Pajak'], ['slug' => 'regulasi-pajak']);
        $auth = Author::firstOrCreate(['name' => 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA']);

        // 1. Create Article
        $storeResponse = $this->post('/portal-admin/articles', [
            'title' => 'Uji Coba Artikel Regulasi Baru',
            'slug' => 'uji-coba-artikel-regulasi-baru',
            'category_id' => $cat->id,
            'category' => 'Regulasi Pajak',
            'date_formatted' => '07 September 2026',
            'read_time' => '4 menit baca',
            'author_id' => $auth->id,
            'author' => 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA',
            'author_role' => 'Managing Partner',
            'excerpt' => 'Ringkasan singkat uji coba regulasi perpajakan nasional terkini.',
            'highlights_text' => "Poin kunci 1\nPoin kunci 2",
            'content' => '<p>Ini adalah paragraf konten lengkap uji coba artikel regulasi.</p>',
            'tags_text' => 'Pajak, Regulasi, Coretax',
            'is_published' => '1',
        ]);

        $storeResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', [
            'slug' => 'uji-coba-artikel-regulasi-baru',
            'title' => 'Uji Coba Artikel Regulasi Baru',
        ]);

        $article = Article::where('slug', 'uji-coba-artikel-regulasi-baru')->firstOrFail();

        // 2. Update Article
        $updateResponse = $this->put('/portal-admin/articles/'.$article->id, [
            'title' => 'Uji Coba Artikel Regulasi Baru (Telah Diperbarui)',
            'slug' => 'uji-coba-artikel-regulasi-baru',
            'category_id' => $cat->id,
            'category' => 'Regulasi Pajak',
            'read_time' => '5 menit baca',
            'author_id' => $auth->id,
            'author' => 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA',
            'excerpt' => 'Ringkasan yang telah diperbarui.',
            'content' => '<p>Konten yang telah diperbarui.</p>',
            'is_published' => '1',
        ]);

        $updateResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Uji Coba Artikel Regulasi Baru (Telah Diperbarui)',
        ]);

        // 3. Delete Article
        $deleteResponse = $this->delete('/portal-admin/articles/'.$article->id);
        $deleteResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseMissing('articles', [
            'id' => $article->id,
        ]);
    }

    public function test_consultation_form_submission_persists_to_database(): void
    {
        $response = $this->post('/api/konsultasi', [
            'nama' => 'Budi Pengusaha',
            'telepon' => '081234567890',
            'bisnis' => 'Retail Fashion Batam',
            'kebutuhan' => 'Kompilasi Laporan Keuangan SAK EMKM',
            'pesan' => 'Mohon info biaya pembukuan bulanan.',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('consultations', [
            'nama' => 'Budi Pengusaha',
            'telepon' => '081234567890',
            'bisnis' => 'Retail Fashion Batam',
        ]);
    }

    public function test_admin_can_update_consultation_status_and_notes(): void
    {
        $consultation = Consultation::create([
            'nama' => 'Ibu Siti',
            'telepon' => '081987654321',
            'bisnis' => 'Kuliner Nusantara',
            'kebutuhan' => 'Konsultasi SP2DK',
            'pesan' => 'Dapat surat dari kantor pajak.',
            'status' => 'baru',
        ]);

        $this->actingAs($this->admin);

        $response = $this->patch('/portal-admin/consultations/'.$consultation->id.'/status', [
            'status' => 'dihubungi',
            'admin_notes' => 'Sudah ditelepon, dijadwalkan Zoom besok pagi.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('consultations', [
            'id' => $consultation->id,
            'status' => 'dihubungi',
            'admin_notes' => 'Sudah ditelepon, dijadwalkan Zoom besok pagi.',
        ]);
    }

    public function test_admin_can_manage_services_and_faqs(): void
    {
        $this->actingAs($this->admin);

        Service::where('slug', 'paket-audit-khusus')->delete();
        Faq::where('question', 'Berapa biaya konsultasi pertama?')->delete();

        // Service Creation
        $serviceResponse = $this->post('/portal-admin/services', [
            'title' => 'Paket Audit Khusus',
            'slug' => 'paket-audit-khusus',
            'badge' => 'Executive',
            'subtitle' => 'Audit internal kepatuhan',
            'price_note' => 'Negosiasi',
            'features_text' => "Audit stok\nReview buku besar",
            'is_featured' => '1',
            'sort_order' => 10,
        ]);
        $serviceResponse->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', ['slug' => 'paket-audit-khusus']);

        // FAQ Creation
        $faqResponse = $this->post('/portal-admin/faqs', [
            'question' => 'Berapa biaya konsultasi pertama?',
            'answer' => 'Sesi konsultasi eksplorasi awal adalah gratis.',
            'category' => 'Tarif',
            'sort_order' => 1,
        ]);
        $faqResponse->assertRedirect(route('admin.faqs.index'));
        $this->assertDatabaseHas('faqs', ['question' => 'Berapa biaya konsultasi pertama?']);
    }

    public function test_landing_page_renders_mascot_hero_founder_section_and_affiliation_logos(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Verify 3 official affiliation logos
        $response->assertSee('logo-ca-iai.png');
        $response->assertSee('logo-caw.png');
        $response->assertSee('logo-akp2i.png');
        // Verify Mascot
        $response->assertSee('mascot-standing.png');
        // Verify Dedicated Founder Section
        $response->assertSee('FOUNDER &amp; MANAGING PARTNER', false);
        $response->assertSee('Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA');
        // Verify 'Artikel' is used
        $response->assertSee('Artikel');
    }

    public function test_article_public_detail_page_syncs_with_db_and_author_mascot_fallback(): void
    {
        Article::where('slug', 'uji-coba-fallback-maskot-penulis')->delete();
        Author::where('name', 'Kontributor Riset Baru')->delete();

        $authorWithoutAvatar = Author::create([
            'name' => 'Kontributor Riset Baru',
            'role' => 'Financial Analyst',
            'bio' => 'Penulis riset keuangan.',
            'avatar' => null,
            'is_active' => true,
        ]);

        $article = Article::create([
            'title' => 'Uji Coba Fallback Maskot Penulis',
            'slug' => 'uji-coba-fallback-maskot-penulis',
            'category' => 'Tips Akuntansi',
            'author_id' => $authorWithoutAvatar->id,
            'author' => $authorWithoutAvatar->name,
            'read_time' => '3 menit baca',
            'excerpt' => 'Menguji avatar maskot saat foto kosong.',
            'content' => '<p>Konten artikel pengujian avatar.</p>',
            'is_published' => true,
        ]);

        $response = $this->get('/berita/'.$article->slug);

        $response->assertStatus(200);
        $response->assertSee('Uji Coba Fallback Maskot Penulis');
        $response->assertSee('Kontributor Riset Baru');
        // Verify fallback to mascot image
        $response->assertSee('mascot-standing.png');
    }

    public function test_landing_page_does_not_contain_packages_section(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSee('id="paket"', false);
        $response->assertDontSee('#paket', false);
    }

    public function test_seo_sitemap_and_robots_txt_endpoints(): void
    {
        $sitemapResponse = $this->get('/sitemap.xml');
        $sitemapResponse->assertStatus(200);
        $sitemapResponse->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
        $sitemapResponse->assertDontSee('#paket');

        $robotsResponse = $this->get('/robots.txt');
        $robotsResponse->assertStatus(200);
        $robotsResponse->assertSee('Allow: /css/');
        $robotsResponse->assertSee('Allow: /images/');
        $robotsResponse->assertSee('Disallow: /portal-admin/');
        $robotsResponse->assertSee('sitemap.xml');
    }

    public function test_admin_can_access_settings_and_update_contact_and_hero(): void
    {
        $this->actingAs($this->admin);

        // 1. Check settings index page
        $indexResponse = $this->get(route('admin.settings.index'));
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('Pengaturan Website &amp; Halaman Depan', false);
        $indexResponse->assertSee('Profil &amp; Kontak', false);

        // 2. Update contact settings
        $updateContact = $this->post(route('admin.settings.update'), [
            'tab' => 'contact',
            'firm_name' => 'Akuntan Indonesia Teruji',
            'brand_name' => 'Akuntan.ID',
            'wa_number' => '6281999888777',
            'phone' => '0811-999-888',
            'email' => 'kontak@akuntanindonesia.id',
            'address' => 'Ruko Batam Center No. 12B',
        ]);

        $updateContact->assertRedirect(route('admin.settings.index', ['tab' => 'contact']));
        $this->assertEquals('Akuntan Indonesia Teruji', Setting::get('firm_name'));
        $this->assertEquals('6281999888777', Setting::get('wa_number'));

        // 3. Update hero settings
        $updateHero = $this->post(route('admin.settings.update'), [
            'tab' => 'hero',
            'hero_tag_pill' => 'Solusi Pajak & Pembukuan Modern Batam',
            'hero_headline' => 'Solusi Keuangan Tepat, Pajak Terkendali Penuh',
            'hero_subline' => 'Kami mengawal pelaporan SPT dan pembukuan bisnis Anda dengan sistem Coretax modern.',
            'hero_chips_text' => "Sat-Set & Cepat\n100% Berizin Kemenkeu",
        ]);

        $updateHero->assertRedirect(route('admin.settings.index', ['tab' => 'hero']));
        $this->assertEquals('Solusi Keuangan Tepat, Pajak Terkendali Penuh', Setting::get('hero_headline'));

        // 4. Verify landing page renders updated content
        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Solusi Keuangan Tepat, Pajak Terkendali Penuh');
        $homeResponse->assertSee('6281999888777');
    }

    public function test_admin_can_create_update_and_delete_bento_service(): void
    {
        $this->actingAs($this->admin);

        Service::where('slug', 'layanan-uji-coba-admin')->delete();

        // 1. Create service
        $createResponse = $this->post(route('admin.services.store'), [
            'title' => 'Layanan Uji Coba Admin',
            'slug' => 'layanan-uji-coba-admin',
            'category' => 'pembukuan',
            'badge' => 'Uji Coba Spesial',
            'color' => 'indigo',
            'icon' => '🚀',
            'desc' => 'Deskripsi layanan baru untuk verifikasi pengujian dinamis halaman depan.',
            'points_text' => "Poin fitur satu\nPoin fitur dua",
            'mascot_tip' => 'Tips maskot khusus uji coba',
            'is_active' => '1',
            'sort_order' => 11,
        ]);

        $createResponse->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', ['slug' => 'layanan-uji-coba-admin']);

        // 2. Verify on landing page
        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Layanan Uji Coba Admin');
        $homeResponse->assertSee('Uji Coba Spesial');

        // 3. Update service
        $service = Service::where('slug', 'layanan-uji-coba-admin')->firstOrFail();
        $updateResponse = $this->put(route('admin.services.update', $service), [
            'title' => 'Layanan Uji Coba Diperbarui',
            'slug' => 'layanan-uji-coba-admin',
            'category' => 'pajak',
            'badge' => 'Terverifikasi Berhasil',
            'color' => 'ruby',
            'icon' => '⚖️',
            'desc' => 'Deskripsi layanan setelah diperbarui.',
            'points_text' => 'Fitur baru revisi',
            'mascot_tip' => 'Tips maskot update',
            'is_active' => '1',
            'sort_order' => 11,
        ]);

        $updateResponse->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseHas('services', ['title' => 'Layanan Uji Coba Diperbarui']);

        // 4. Delete service
        $deleteResponse = $this->delete(route('admin.services.destroy', $service));
        $deleteResponse->assertRedirect(route('admin.services.index'));
        $this->assertDatabaseMissing('services', ['slug' => 'layanan-uji-coba-admin']);
    }
}
