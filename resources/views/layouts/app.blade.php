<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>@yield('title', 'KJA Hendra Setiyawan | Next-Gen Finance & Tax Partner Batam & Indonesia')</title>
    <meta name="description" content="@yield('meta_description', 'Kantor Jasa Akuntansi (KJA) & Konsultan Pajak Resmi Batam. Berizin Kemenkeu RI & Kuasa Hukum Pengadilan Pajak. Jasa pembukuan, laporan keuangan SAK, lapor SPT, tax planning, dan pendampingan sengketa pajak.')">
    <meta name="keywords" content="kantor jasa akuntan batam, kja hendra setiyawan, konsultan pajak batam, kuasa hukum pengadilan pajak, jasa pembukuan umkm, lapor spt tahunan, tax planning, coretax djp, akuntan bisnis indonesia">
    <meta name="author" content="KJA Hendra Setiyawan">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="KJA Hendra Setiyawan">
    <meta property="og:title" content="@yield('og_title', 'KJA Hendra Setiyawan — Next-Gen Finance & Tax Partner')">
    <meta property="og:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia. Didukung Akuntan Beregister Negara & Kuasa Hukum Pengadilan Pajak.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/owner-hendra-setiyawan.png') }}">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="650">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'KJA Hendra Setiyawan — Next-Gen Finance & Tax Partner')">
    <meta name="twitter:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia.')">
    <meta name="twitter:image" content="{{ asset('images/owner-hendra-setiyawan.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">

    <!-- Schema.org JSON-LD Structured Data for Elite SEO -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'AccountingService',
                '@id' => url('/') . '#organization',
                'name' => 'KJA Hendra Setiyawan - Akuntan Bisnis Indonesia',
                'alternateName' => 'Akuntan Indonesia',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
                'image' => asset('images/owner-hendra-setiyawan.png'),
                'telephone' => $profile['contact']['phone'] ?? '+6281945077770',
                'email' => $profile['contact']['email'] ?? 'halo@akuntanindonesia.id',
                'priceRange' => '$$',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Batam Center Commercial Area',
                    'addressLocality' => 'Batam',
                    'addressRegion' => 'Kepulauan Riau',
                    'postalCode' => '29461',
                    'addressCountry' => 'ID'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => 1.1278,
                    'longitude' => 104.0531
                ],
                'openingHoursSpecification' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '08:30',
                    'closes' => '17:30'
                ],
                'areaServed' => [
                    ['@type' => 'AdministrativeArea', 'name' => 'Batam'],
                    ['@type' => 'Country', 'name' => 'Indonesia']
                ],
                'founder' => [
                    '@type' => 'Person',
                    'name' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
                    'jobTitle' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
                    'image' => asset('images/owner-hendra-setiyawan.png')
                ]
            ],
            [
                '@type' => 'WebSite',
                '@id' => url('/') . '#website',
                'url' => url('/'),
                'name' => 'KJA Hendra Setiyawan',
                'publisher' => [
                    '@id' => url('/') . '#organization'
                ]
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @yield('head_extra')
</head>
<body>

    <!-- Header & Navigation Bar -->
    <header>
        <nav id="navbar" class="navbar">
            <div class="nav-container">
                <a href="{{ route('home') }}" class="nav-brand" aria-label="Akuntan Indonesia .ID">
                    <div class="brand-logo-wrap">
                        <img src="{{ asset('images/logo.png') }}" alt="Akuntan Indonesia .ID" class="brand-logo">
                    </div>
                    <div class="brand-text">
                        <span class="brand-title">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                        <span class="brand-subtitle">KJA Hendra Setiyawan</span>
                    </div>
                </a>

                <ul class="nav-links" id="navLinks">
                    <li><a href="#layanan" class="nav-link">Layanan</a></li>
                    <li><a href="#misi-nilai" class="nav-link">Nilai Utama</a></li>
                    <li><a href="#paket" class="nav-link">Paket Harga</a></li>
                    <li><a href="#kalkulator" class="nav-link">Kalkulator Pajak</a></li>
                    <li><a href="#perbandingan" class="nav-link">Perbandingan</a></li>
                    <li><a href="#berita" class="nav-link">Wawasan</a></li>
                    <li><a href="#testimoni" class="nav-link">Ulasan</a></li>
                    <li><a href="#faq" class="nav-link">FAQ</a></li>
                    <li><a href="#lokasi" class="nav-link">Lokasi</a></li>
                </ul>

                <div class="nav-actions">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode(env('WA_DEFAULT_TEXT', 'Halo KJA Hendra Setiyawan, saya ingin konsultasi gratis')) }}" target="_blank" rel="noopener noreferrer" class="btn-cta-gold">
                        <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                        <span>Konsultasi Gratis</span>
                    </a>

                    <button class="nav-toggle" id="navToggle" aria-label="Toggle Navigation Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Mobile Drawer -->
        <div class="mobile-drawer" id="mobileDrawer">
            <div class="mobile-drawer-content">
                <a href="#layanan" class="mobile-nav-link" onclick="toggleNav()">Layanan</a>
                <a href="#paket" class="mobile-nav-link" onclick="toggleNav()">Paket Harga</a>
                <a href="#kalkulator" class="mobile-nav-link" onclick="toggleNav()">Kalkulator Pajak</a>
                <a href="#kenapa-kami" class="mobile-nav-link" onclick="toggleNav()">Kenapa Kami</a>
                <a href="#perbandingan" class="mobile-nav-link" onclick="toggleNav()">Perbandingan</a>
                <a href="#berita" class="mobile-nav-link" onclick="toggleNav()">Wawasan Pajak</a>
                <a href="#testimoni" class="mobile-nav-link" onclick="toggleNav()">Ulasan Klien</a>
                <a href="#faq" class="mobile-nav-link" onclick="toggleNav()">FAQ</a>
                <a href="#lokasi" class="mobile-nav-link" onclick="toggleNav()">Lokasi Kantor</a>
                <div class="mobile-drawer-footer">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode(env('WA_DEFAULT_TEXT', 'Halo KJA Hendra Setiyawan, saya ingin konsultasi gratis')) }}" target="_blank" class="btn-cta-gold full-width">
                        Konsultasi WhatsApp Sekarang
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-col brand-col">
                <div class="footer-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="Akuntan Indonesia .ID" class="footer-logo">
                    <div>
                        <b class="footer-title">Akuntan Indonesia<span class="brand-tld">.ID</span></b>
                        <p class="footer-sub">KJA Hendra Setiyawan</p>
                    </div>
                </div>
                <p class="footer-desc">
                    Kantor Jasa Akuntansi (KJA) berizin resmi Kementerian Keuangan Republik Indonesia dan Kuasa Hukum Pengadilan Pajak. Membantu UMKM, pelaku digital, dan korporasi mengelola pembukuan, kepatuhan pajak, dan perlindungan hukum finansial.
                </p>
                <div class="accreditation-badges">
                    <span class="badge-accred">IAI Registered</span>
                    <span class="badge-accred">Chartered Accountant</span>
                    <span class="badge-accred">Kuasa Hukum Pengadilan Pajak</span>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Layanan Utama</h4>
                <ul class="footer-links">
                    <li><a href="#layanan">Pembukuan (Bookkeeping) Rutin</a></li>
                    <li><a href="#layanan">Kompilasi Laporan Keuangan SAK</a></li>
                    <li><a href="#layanan">Manajemen &amp; Perencanaan Pajak</a></li>
                    <li><a href="#layanan">Kuasa Hukum Pengadilan Pajak</a></li>
                    <li><a href="#layanan">Akuntansi Manajemen &amp; Budgeting</a></li>
                    <li><a href="#layanan">Setup Sistem Informasi Akuntansi</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Navigasi Cepat</h4>
                <ul class="footer-links">
                    <li><a href="#paket">Paket Layanan &amp; Tarif</a></li>
                    <li><a href="#kalkulator">Simulasi Pajak UMKM 0.5%</a></li>
                    <li><a href="#kenapa-kami">Keunggulan KJA Hendra</a></li>
                    <li><a href="#perbandingan">Tabel Komparasi Solusi</a></li>
                    <li><a href="#berita">Artikel &amp; Regulasi Coretax</a></li>
                    <li><a href="#faq">Pertanyaan Umum (FAQ)</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Kontak &amp; Kantor</h4>
                <p class="footer-contact-item">
                    <strong>Alamat:</strong><br>
                    {{ $profile['contact']['address'] ?? 'Batam Center Commercial Area, Kota Batam, Kepulauan Riau' }}
                </p>
                <p class="footer-contact-item">
                    <strong>WhatsApp:</strong><br>
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}" target="_blank">{{ $profile['contact']['phone'] ?? '+62 819-4507-7770' }}</a>
                </p>
                <p class="footer-contact-item">
                    <strong>Email:</strong><br>
                    <a href="mailto:{{ $profile['contact']['email'] ?? 'halo@akuntanindonesia.id' }}">{{ $profile['contact']['email'] ?? 'halo@akuntanindonesia.id' }}</a>
                </p>
                <p class="footer-contact-item">
                    <strong>Jam Operasional:</strong><br>
                    {{ $profile['contact']['hours'] ?? 'Senin – Jumat: 08.30 – 17.30 WIB' }}
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-inner">
                <p>&copy; {{ date('Y') }} KJA Hendra Setiyawan (Akuntan Bisnis Indonesia). Seluruh Hak Cipta Dilindungi Undang-Undang.</p>
                <p class="legal-note">Berizin Resmi Kementerian Keuangan Republik Indonesia &amp; Anggota Utama Ikatan Akuntan Indonesia (IAI).</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Mascot & Chat Simulation Widget (Inspired by hstax.id) -->
    <div class="wa-widget" id="waWidget">
        <div class="wa-chat-box" id="waChatBox">
            <div class="wa-chat-header">
                <div class="wa-chat-avatar">
                    <img src="{{ asset('images/owner-hendra-setiyawan.png') }}" alt="Hendra Setiyawan">
                    <span class="online-indicator"></span>
                </div>
                <div class="wa-chat-title">
                    <b>Hendra Setiyawan, Ak., CA</b>
                    <small>Online • Kuasa Hukum Pajak &amp; Akuntan</small>
                </div>
                <button type="button" class="wa-chat-close" onclick="toggleWaChat()" aria-label="Tutup Chat">✕</button>
            </div>
            <div class="wa-chat-body">
                <div class="wa-message in">
                    <span class="sender-name">Hendra Setiyawan</span>
                    <p>Halo! Selamat datang di KJA Hendra Setiyawan. Ada yang bisa kami bantu terkait pembukuan, laporan keuangan, atau urusan pajak bisnis Anda?</p>
                    <span class="wa-time">Baru saja</span>
                </div>
                <div class="wa-quick-options">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Pak Hendra, saya mau tanya paket pembukuan bulanan untuk usaha saya.') }}" target="_blank" class="wa-quick-chip">
                        <span>📊 Tanya Paket Pembukuan UMKM</span>
                    </a>
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Pak Hendra, saya ingin konsultasi terkait SP2DK / pemeriksaan pajak.') }}" target="_blank" class="wa-quick-chip">
                        <span>⚖️ Konsultasi Sengketa Pajak / SP2DK</span>
                    </a>
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Pak Hendra, saya ingin tanya lapor SPT Tahunan dan Coretax DJP.') }}" target="_blank" class="wa-quick-chip">
                        <span>📑 Konsultasi SPT &amp; Coretax DJP</span>
                    </a>
                </div>
            </div>
            <div class="wa-chat-footer">
                <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode(env('WA_DEFAULT_TEXT', 'Halo KJA Hendra Setiyawan, saya ingin konsultasi langsung')) }}" target="_blank" class="wa-direct-btn">
                    <span>Lanjut Chat ke WhatsApp Resmi</span>
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                </a>
            </div>
        </div>

        <!-- Floating Button Trigger -->
        <div class="wa-trigger-wrapper">
            <div class="wa-tooltip" id="waTooltip">
                <span>💬 Butuh Bantuan Pajak &amp; Pembukuan? <b>Chat Langsung</b></span>
            </div>
            <button type="button" class="wa-trigger-btn" onclick="toggleWaChat()" aria-label="Buka Chat WhatsApp">
                <span class="ping-ring"></span>
                <div class="btn-avatar">
                    <img src="{{ asset('images/owner-hendra-setiyawan.png') }}" alt="Hendra Setiyawan">
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Fixed Bottom CTA Bar -->
    <div class="mobile-cta-bar">
        <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode(env('WA_DEFAULT_TEXT', 'Halo KJA Hendra Setiyawan, saya ingin konsultasi cepat')) }}" target="_blank" class="mobile-btn-wa">
            <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
            <span>Konsultasi WhatsApp Sekarang</span>
        </a>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?v={{ time() }}"></script>
    @yield('scripts')
</body>
</html>
