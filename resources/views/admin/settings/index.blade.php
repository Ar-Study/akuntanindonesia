@extends('admin.layouts.app')

@section('title', 'Pengaturan Halaman Depan & Profil')
@section('page_title', 'Pengaturan Website & Halaman Depan')

@section('styles')
<style>
    .settings-nav-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
        border-bottom: 2px solid var(--admin-border);
        padding-bottom: 0;
        overflow-x: auto;
    }

    .settings-tab-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        font-size: 0.86rem;
        font-weight: 700;
        color: var(--admin-navy-600);
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        cursor: pointer;
        text-decoration: none;
        transition: var(--transition);
        white-space: nowrap;
        margin-bottom: -2px;
    }

    .settings-tab-btn:hover {
        color: var(--admin-blue);
        background: var(--admin-blue-light);
        border-radius: var(--radius-sm) var(--radius-sm) 0 0;
    }

    .settings-tab-btn.active {
        color: var(--admin-blue);
        border-bottom-color: var(--admin-blue);
        background: #FFFFFF;
        border-radius: var(--radius-sm) var(--radius-sm) 0 0;
    }

    .settings-tab-badge {
        font-size: 0.7rem;
        padding: 2px 6px;
        border-radius: var(--radius-full);
        background: var(--admin-navy-100);
        color: var(--admin-navy-700);
    }

    .settings-tab-btn.active .settings-tab-badge {
        background: var(--admin-blue-light);
        color: var(--admin-blue);
    }

    .setting-section-intro {
        margin-bottom: 20px;
        padding: 14px 16px;
        background: var(--admin-navy-50);
        border-radius: var(--radius-md);
        border-left: 4px solid var(--admin-blue);
        font-size: 0.82rem;
        color: var(--admin-navy-700);
    }

    .setting-section-intro h4 {
        font-size: 0.92rem;
        color: var(--admin-navy-950);
        margin-bottom: 4px;
        font-weight: 800;
    }

    .repeater-card {
        background: var(--admin-navy-50);
        border: 1px solid var(--admin-border);
        border-radius: var(--radius-md);
        padding: 14px;
        margin-bottom: 12px;
    }

    .repeater-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--admin-navy-800);
    }

    .preview-avatar-box {
        width: 80px;
        height: 80px;
        border-radius: var(--radius-md);
        overflow: hidden;
        border: 1px solid var(--admin-border);
        background: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .preview-avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection

@section('content')

    <!-- Navigation Tabs -->
    <div class="settings-nav-tabs">
        <a href="{{ route('admin.settings.index', ['tab' => 'contact']) }}" class="settings-tab-btn {{ $activeTab === 'contact' ? 'active' : '' }}">
            <span>🏢</span>
            <span>Profil &amp; Kontak</span>
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'hero']) }}" class="settings-tab-btn {{ $activeTab === 'hero' ? 'active' : '' }}">
            <span>✨</span>
            <span>Hero &amp; Statistik</span>
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'founder']) }}" class="settings-tab-btn {{ $activeTab === 'founder' ? 'active' : '' }}">
            <span>👤</span>
            <span>Profil Founder</span>
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'vision']) }}" class="settings-tab-btn {{ $activeTab === 'vision' ? 'active' : '' }}">
            <span>🎯</span>
            <span>Visi &amp; Misi</span>
        </a>
    </div>

    <!-- TAB 1: PROFIL & KONTAK -->
    @if($activeTab === 'contact')
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            <input type="hidden" name="tab" value="contact">

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2 class="admin-card-title">Identitas Bisnis &amp; Kontak Resmi</h2>
                        <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                            Informasi ini tampil di Navbar, Footer, Section Lokasi, dan Form Konsultasi WhatsApp.
                        </p>
                    </div>
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>

                <div class="admin-card-body">
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="firm_name">Nama Kantor / Firma <span style="color: var(--admin-ruby)">*</span></label>
                            <input type="text" id="firm_name" name="firm_name" class="form-control" value="{{ old('firm_name', $settings['firm_name']) }}" required>
                            <div class="form-hint">Nama resmi, contoh: Akuntan Indonesia .ID</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="brand_name">Brand Singkat</label>
                            <input type="text" id="brand_name" name="brand_name" class="form-control" value="{{ old('brand_name', $settings['brand_name']) }}">
                            <div class="form-hint">Contoh: Akuntan.ID</div>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="sub_firm">Sub Judul Kantor</label>
                            <input type="text" id="sub_firm" name="sub_firm" class="form-control" value="{{ old('sub_firm', $settings['sub_firm']) }}">
                            <div class="form-hint">Contoh: Kantor Jasa Akuntansi &amp; Konsultan Pajak Batam</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="tagline">Tagline Utama</label>
                            <input type="text" id="tagline" name="tagline" class="form-control" value="{{ old('tagline', $settings['tagline']) }}">
                            <div class="form-hint">Contoh: Your Next-Gen Finance &amp; Tax Partner</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="subtitle">Deskripsi Singkat / Ringkasan</label>
                        <textarea id="subtitle" name="subtitle" rows="3" class="form-textarea">{{ old('subtitle', $settings['subtitle']) }}</textarea>
                        <div class="form-hint">Tampil di bagian About dan deskripsi umum website.</div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="about_p1">Tentang Kami (Paragraf 1)</label>
                            <textarea id="about_p1" name="about_p1" rows="4" class="form-textarea">{{ old('about_p1', $settings['about_p1']) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="about_p2">Tentang Kami (Paragraf 2)</label>
                            <textarea id="about_p2" name="about_p2" rows="4" class="form-textarea">{{ old('about_p2', $settings['about_p2']) }}</textarea>
                        </div>
                    </div>

                    <hr style="border: 0; border-top: 1px solid var(--admin-border); margin: 20px 0;">

                    <h3 style="font-size: 0.95rem; font-weight: 800; color: var(--admin-navy-950); margin-bottom: 14px;">Kontak &amp; Alamat Operasional</h3>

                    <div class="form-grid-3">
                        <div class="form-group">
                            <label class="form-label" for="wa_number">No. WhatsApp Resmi (DJP &amp; Klien) <span style="color: var(--admin-ruby)">*</span></label>
                            <input type="text" id="wa_number" name="wa_number" class="form-control" value="{{ old('wa_number', $settings['wa_number']) }}" required>
                            <div class="form-hint">Format internasional tanpa tanda +, contoh: 6281945077770</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone">Nomor Telepon Kantor</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $settings['phone']) }}">
                            <div class="form-hint">Contoh: 0811-7777-109</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email Resmi</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $settings['email']) }}">
                            <div class="form-hint">Contoh: halo@akuntanindonesia.id</div>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="company_legal">Nama Badan Hukum / Entitas</label>
                            <input type="text" id="company_legal" name="company_legal" class="form-control" value="{{ old('company_legal', $settings['company_legal']) }}">
                            <div class="form-hint">Contoh: PT. AKUNTAN BISNIS INDONESIA</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="coverage">Jangkauan Layanan</label>
                            <input type="text" id="coverage" name="coverage" class="form-control" value="{{ old('coverage', $settings['coverage']) }}">
                            <div class="form-hint">Contoh: Kota Batam &amp; Layanan Digital Remote Seluruh Indonesia</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">Alamat Lengkap Kantor</label>
                        <textarea id="address" name="address" rows="2" class="form-textarea">{{ old('address', $settings['address']) }}</textarea>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="maps_url">Link Arah Google Maps</label>
                            <input type="url" id="maps_url" name="maps_url" class="form-control" value="{{ old('maps_url', $settings['maps_url']) }}">
                            <div class="form-hint">URL Google Maps saat pengunjung mengklik tombol petunjuk arah.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="hours">Jam Operasional Kantor</label>
                            <input type="text" id="hours" name="hours" class="form-control" value="{{ old('hours', $settings['hours']) }}">
                            <div class="form-hint">Contoh: Senin – Jumat: 08.30 – 17.00 WIB</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="maps_embed">URL Embed Iframe Google Maps</label>
                        <textarea id="maps_embed" name="maps_embed" rows="2" class="form-textarea" placeholder="https://www.google.com/maps/embed?pb=...">{{ old('maps_embed', $settings['maps_embed']) }}</textarea>
                        <div class="form-hint">Masukkan URL pada atribut <code>src</code> dari embed Google Maps untuk peta interaktif di halaman depan.</div>
                    </div>

                    <div style="margin-top: 14px; text-align: right;">
                        <button type="submit" class="btn-primary">
                            <span>💾</span>
                            <span>Simpan Pengaturan Profil &amp; Kontak</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <!-- TAB 2: HERO & STATISTIK -->
    @if($activeTab === 'hero')
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            <input type="hidden" name="tab" value="hero">

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2 class="admin-card-title">Hero Section &amp; Pita Statistik</h2>
                        <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                            Ubah judul pembuka, kalimat penawaran nilai, poin keunggulan cepat, dan angka pencapaian di bagian paling atas website.
                        </p>
                    </div>
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>

                <div class="admin-card-body">
                    <div class="setting-section-intro">
                        <h4>Hero Headline &amp; Tagline Pembuka</h4>
                        Bagian ini adalah hal pertama yang dilihat calon klien saat membuka website. Buat kalimat yang memikat dan terarah.
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="hero_tag_pill">Teks Pill Badge Hero</label>
                        <input type="text" id="hero_tag_pill" name="hero_tag_pill" class="form-control" value="{{ old('hero_tag_pill', $settings['hero_tag_pill']) }}">
                        <div class="form-hint">Badge kecil di atas judul utama, contoh: Kantor Jasa Akuntan &amp; Pajak Batam</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="hero_headline">Headline Utama Hero <span style="color: var(--admin-ruby)">*</span></label>
                        <textarea id="hero_headline" name="hero_headline" rows="2" class="form-textarea" required>{{ old('hero_headline', $settings['hero_headline']) }}</textarea>
                        <div class="form-hint">Contoh: Financial Solved, No Stress. Fokus Scale-Up Bisnis Anda.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="hero_subline">Sub-Headline Penjelas</label>
                        <textarea id="hero_subline" name="hero_subline" rows="3" class="form-textarea">{{ old('hero_subline', $settings['hero_subline']) }}</textarea>
                        <div class="form-hint">Paragraf pengantar solusi akuntansi &amp; perpajakan di bawah headline.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="hero_chips_text">3 Value Prop Chips (Keunggulan Cepat)</label>
                        @php
                            $chipsText = is_array($settings['hero_chips']) ? implode("\n", $settings['hero_chips']) : $settings['hero_chips'];
                        @endphp
                        <textarea id="hero_chips_text" name="hero_chips_text" rows="3" class="form-textarea">{{ old('hero_chips_text', $chipsText) }}</textarea>
                        <div class="form-hint">Tulis satu poin per baris (akan ditampilkan dengan ikon centang di bawah tombol CTA Hero).</div>
                    </div>

                    <hr style="border: 0; border-top: 1px solid var(--admin-border); margin: 24px 0;">

                    <h3 style="font-size: 0.95rem; font-weight: 800; color: var(--admin-navy-950); margin-bottom: 14px;">4 Kartu Counter Statistik (Ribbon Bar)</h3>

                    <div class="form-grid-2">
                        @foreach($settings['stats'] as $idx => $st)
                            <div class="repeater-card">
                                <div class="repeater-header">
                                    <span>Statistik #{{ $idx + 1 }}</span>
                                    <span>{{ $st['icon'] ?? '📊' }}</span>
                                </div>
                                <div class="form-grid-3">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Icon Emoji</label>
                                        <input type="text" name="stats_icon[]" class="form-control" value="{{ $st['icon'] ?? '🚀' }}" style="text-align: center;">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Angka / Nilai</label>
                                        <input type="text" name="stats_num[]" class="form-control" value="{{ $st['num'] ?? '' }}" placeholder="misal: 150+">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Label Keterangan</label>
                                        <input type="text" name="stats_label[]" class="form-control" value="{{ $st['label'] ?? '' }}" placeholder="misal: Klien Terbantu">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div style="margin-top: 14px; text-align: right;">
                        <button type="submit" class="btn-primary">
                            <span>💾</span>
                            <span>Simpan Pengaturan Hero &amp; Statistik</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <!-- TAB 3: PROFIL FOUNDER -->
    @if($activeTab === 'founder')
        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tab" value="founder">

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2 class="admin-card-title">Profil Founder &amp; Managing Partner</h2>
                        <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                            Kelola data kredensial, biografi, kutipan, dan foto resmi Founder (Section 3 Halaman Depan).
                        </p>
                    </div>
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>

                <div class="admin-card-body">
                    <div style="display: flex; gap: 20px; align-items: flex-start; margin-bottom: 20px;">
                        <div class="preview-avatar-box" style="width: 100px; height: 100px; flex-shrink: 0;">
                            @php
                                $photoUrl = $settings['founder_photo'];
                                if ($photoUrl && !str_starts_with($photoUrl, 'http')) {
                                    $photoUrl = asset($photoUrl);
                                }
                            @endphp
                            <img src="{{ $photoUrl }}" alt="Foto Founder" class="preview-avatar-img">
                        </div>

                        <div style="flex: 1;">
                            <label class="form-label" for="founder_photo_file">Unggah Foto Resmi Baru</label>
                            <input type="file" id="founder_photo_file" name="founder_photo_file" class="form-control" accept="image/png,image/jpeg,image/webp">
                            <div class="form-hint">Format PNG/JPG/WebP transparan atau portrait. Maksimal 3MB. Kosongkan jika tidak ingin mengubah foto.</div>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="founder_name">Nama Lengkap &amp; Gelar Resmi <span style="color: var(--admin-ruby)">*</span></label>
                            <input type="text" id="founder_name" name="founder_name" class="form-control" value="{{ old('founder_name', $settings['founder_name']) }}" required>
                            <div class="form-hint">Contoh: Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="founder_title">Jabatan &amp; Lisensi Kemenkeu</label>
                            <input type="text" id="founder_title" name="founder_title" class="form-control" value="{{ old('founder_title', $settings['founder_title']) }}">
                            <div class="form-hint">Contoh: Akuntan Berpraktek &amp; Konsultan Pajak Berizin di Kementerian Keuangan</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="founder_bio">Biografi Profesional Founder</label>
                        <textarea id="founder_bio" name="founder_bio" rows="4" class="form-textarea">{{ old('founder_bio', $settings['founder_bio']) }}</textarea>
                        <div class="form-hint">Ceritakan pengalaman di bidang restrukturisasi keuangan, pendampingan SP2DK, dan Pengadilan Pajak.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="founder_credentials_text">Daftar Lisensi &amp; Kredensial Resmi</label>
                        @php
                            $credsText = is_array($settings['founder_credentials']) ? implode("\n", $settings['founder_credentials']) : $settings['founder_credentials'];
                        @endphp
                        <textarea id="founder_credentials_text" name="founder_credentials_text" rows="4" class="form-textarea">{{ old('founder_credentials_text', $credsText) }}</textarea>
                        <div class="form-hint">Tulis satu kredensial per baris (akan tampil sebagai checklist lisensi di samping foto founder).</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="founder_quote">Kutipan / Quote Founder</label>
                        <textarea id="founder_quote" name="founder_quote" rows="3" class="form-textarea">{{ old('founder_quote', $settings['founder_quote']) }}</textarea>
                        <div class="form-hint">Quote inspiratif yang tampil dalam kotak kutipan di halaman depan.</div>
                    </div>

                    <div style="margin-top: 14px; text-align: right;">
                        <button type="submit" class="btn-primary">
                            <span>💾</span>
                            <span>Simpan Pengaturan Founder</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <!-- TAB 4: VISI & MISI -->
    @if($activeTab === 'vision')
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            <input type="hidden" name="tab" value="vision">

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2 class="admin-card-title">Visi Resmi, 4 Pilar Misi &amp; 4 Nilai Utama</h2>
                        <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                            Kelola komitmen dan arah strategis perusahaan yang tampil pada Section 5 Halaman Depan.
                        </p>
                    </div>
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>

                <div class="admin-card-body">
                    <div class="form-group">
                        <label class="form-label" for="vision">Pernyataan Visi Resmi <span style="color: var(--admin-ruby)">*</span></label>
                        <textarea id="vision" name="vision" rows="3" class="form-textarea" required>{{ old('vision', $settings['vision']) }}</textarea>
                        <div class="form-hint">Pernyataan visi yang tampil di banner emas pada section Visi &amp; Nilai.</div>
                    </div>

                    <hr style="border: 0; border-top: 1px solid var(--admin-border); margin: 24px 0;">

                    <h3 style="font-size: 0.95rem; font-weight: 800; color: var(--admin-navy-950); margin-bottom: 14px;">4 Pilar Misi (Dengan Karakter Maskot)</h3>

                    @php
                        $pillars = $settings['mission_pillars'];
                        if (empty($pillars)) {
                            $pillars = [
                                ['id' => 'm1', 'title' => 'Financial Solved, No Stress', 'badge' => 'Pilar 01', 'desc' => 'Memberikan layanan akuntansi dan perpajakan end-to-end yang sat-set, patuh aturan, dan bikin bisnis klien jalan tanpa pusing.', 'color' => 'ruby', 'icon' => '🛡️'],
                                ['id' => 'm2', 'title' => 'Work Smarter & Efficient', 'badge' => 'Pilar 02', 'desc' => 'Memangkas proses rumit lewat solusi digital yang efektif dan efisien biar klien bisa fokus scaling up bisnis mereka.', 'color' => 'indigo', 'icon' => '⚡'],
                                ['id' => 'm3', 'title' => 'Level Up Akuntan Muda', 'badge' => 'Pilar 03', 'desc' => 'Buka ruang mentorship yang seru dan inklusif buat mencetak akuntan muda Indonesia yang makin kompeten, cerdas, dan siap bersaing.', 'color' => 'emerald', 'icon' => '🌱'],
                                ['id' => 'm4', 'title' => 'Impact Buat Negara', 'badge' => 'Pilar 04', 'desc' => 'Mendorong keterbukaan laporan keuangan dan kepatuhan pajak sebagai wujud kontribusi nyata membangun ekonomi Indonesia yang lebih sehat.', 'color' => 'gold', 'icon' => '🇮🇩'],
                            ];
                        }
                    @endphp

                    <div class="form-grid-2">
                        @foreach($pillars as $idx => $mp)
                            <div class="repeater-card">
                                <div class="repeater-header">
                                    <span>Pilar #{{ $idx + 1 }}</span>
                                    <span>{{ $mp['icon'] ?? '🛡️' }}</span>
                                </div>
                                <div class="form-grid-3" style="margin-bottom: 8px;">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Label Badge</label>
                                        <input type="text" name="pillar_badge[]" class="form-control" value="{{ $mp['badge'] ?? ('Pilar 0' . ($idx + 1)) }}">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Icon Emoji</label>
                                        <input type="text" name="pillar_icon[]" class="form-control" value="{{ $mp['icon'] ?? '⚡' }}">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Warna</label>
                                        <select name="pillar_color[]" class="form-select">
                                            <option value="ruby" {{ ($mp['color'] ?? '') === 'ruby' ? 'selected' : '' }}>Ruby (Merah)</option>
                                            <option value="indigo" {{ ($mp['color'] ?? '') === 'indigo' ? 'selected' : '' }}>Indigo (Biru Gelap)</option>
                                            <option value="emerald" {{ ($mp['color'] ?? '') === 'emerald' ? 'selected' : '' }}>Emerald (Hijau)</option>
                                            <option value="gold" {{ ($mp['color'] ?? '') === 'gold' ? 'selected' : '' }}>Gold (Emas)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 8px;">
                                    <label class="form-label" style="font-size: 0.72rem;">Judul Pilar</label>
                                    <input type="text" name="pillar_title[]" class="form-control" value="{{ $mp['title'] ?? '' }}" required>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-size: 0.72rem;">Deskripsi Pilar</label>
                                    <textarea name="pillar_desc[]" rows="2" class="form-textarea">{{ $mp['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr style="border: 0; border-top: 1px solid var(--admin-border); margin: 24px 0;">

                    <h3 style="font-size: 0.95rem; font-weight: 800; color: var(--admin-navy-950); margin-bottom: 14px;">4 Nilai Utama Perusahaan (Core Values)</h3>

                    @php
                        $values = $settings['core_values'];
                        if (empty($values)) {
                            $values = [
                                ['title' => 'High Standard & Agile', 'tag' => 'Presisi & Cepat', 'desc' => 'Kerja serba cepat, presisi tinggi, dan selalu up-to-date dengan regulasi perpajakan nasional terkini (termasuk Coretax DJP).', 'icon' => '⚡'],
                                ['title' => 'Radical Transparency', 'tag' => 'Kejujuran & Etika', 'desc' => 'Jujur, memegang teguh etika profesi akuntan IAI, dan menjaga kerahasiaan data serta kepercayaan penuh klien & negara.', 'icon' => '🔍'],
                                ['title' => 'Efficiency First (Anti-Ribet)', 'tag' => 'Hemat Waktu', 'desc' => 'Anti-ribet. Semua masalah keuangan diselesaikan lewat cara cerdas, alur digital terstruktur, dan hemat waktu.', 'icon' => '⏱️'],
                                ['title' => 'Growth Mindset', 'tag' => 'Tumbuh Bersama', 'desc' => 'Terus belajar, saling membimbing, dan memfasilitasi talenta serta bisnis klien untuk berkembang maksimal.', 'icon' => '📈'],
                            ];
                        }
                    @endphp

                    <div class="form-grid-2">
                        @foreach($values as $idx => $val)
                            <div class="repeater-card">
                                <div class="repeater-header">
                                    <span>Nilai #{{ $idx + 1 }}</span>
                                    <span>{{ $val['icon'] ?? '⚡' }}</span>
                                </div>
                                <div class="form-grid-3" style="margin-bottom: 8px;">
                                    <div class="form-group" style="margin-bottom: 0; grid-column: span 2;">
                                        <label class="form-label" style="font-size: 0.72rem;">Judul Nilai</label>
                                        <input type="text" name="value_title[]" class="form-control" value="{{ $val['title'] ?? '' }}" required>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="form-label" style="font-size: 0.72rem;">Icon Emoji</label>
                                        <input type="text" name="value_icon[]" class="form-control" value="{{ $val['icon'] ?? '⚡' }}">
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 8px;">
                                    <label class="form-label" style="font-size: 0.72rem;">Tag Singkat</label>
                                    <input type="text" name="value_tag[]" class="form-control" value="{{ $val['tag'] ?? '' }}" placeholder="misal: Presisi & Cepat">
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-size: 0.72rem;">Deskripsi Nilai</label>
                                    <textarea name="value_desc[]" rows="2" class="form-textarea">{{ $val['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div style="margin-top: 14px; text-align: right;">
                        <button type="submit" class="btn-primary">
                            <span>💾</span>
                            <span>Simpan Pengaturan Visi &amp; Nilai</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif

@endsection
