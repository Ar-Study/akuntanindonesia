<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Consultation;
use App\Models\Faq;
use App\Models\Service;
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

    public function test_admin_can_create_update_and_delete_article(): void
    {
        $this->actingAs($this->admin);

        // 1. Create Article
        $storeResponse = $this->post('/portal-admin/articles', [
            'title' => 'Uji Coba Artikel Regulasi Baru',
            'slug' => 'uji-coba-artikel-regulasi-baru',
            'category' => 'Regulasi Pajak',
            'date_formatted' => '07 September 2026',
            'read_time' => '4 menit baca',
            'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
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
            'category' => 'Regulasi Pajak',
            'read_time' => '5 menit baca',
            'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
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

    public function test_landing_page_does_not_display_payment_methods_and_owner_tag_is_visible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Verify payment methods section is removed
        $response->assertDontSee('Metode Pembayaran Resmi');
        $response->assertDontSee('Mandiri Virtual Account');
        // Verify Owner name is present
        $response->assertSee('Hendra Setiyawan, S.E., M.Ak., Ak., CA');
        $response->assertSee('Founder Akuntan Indonesia .ID');
    }
}
