<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>@yield('title', 'Kantor Jasa Akuntan Batam & Konsultan Pajak | Akuntan Indonesia .ID')</title>
    <meta name="description" content="@yield('meta_description', 'Kantor Jasa Akuntansi & Konsultan Pajak Resmi di Batam. Pembukuan sat-set, laporan keuangan SAK EMKM, lapor SPT, tax planning, Coretax DJP, dan Kuasa Hukum Pengadilan Pajak.')">
    <meta name="keywords" content="kantor jasa akuntan batam, konsultan pajak batam, jasa pembukuan batam, akuntan batam, kuasa hukum pengadilan pajak batam, jasa laporan keuangan batam, coretax djp batam, akuntan indonesia, akuntan bisnis indonesia, pajak umkm batam, audit laporan keuangan batam">
    <meta name="author" content="Akuntan Indonesia .ID">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Local SEO Geo Meta Tags for Batam & Kepulauan Riau -->
    <meta name="geo.region" content="ID-KR">
    <meta name="geo.placename" content="Batam, Kepulauan Riau">
    <meta name="geo.position" content="1.1278;104.0487">
    <meta name="ICBM" content="1.1278, 104.0487">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Akuntan Indonesia .ID">
    <meta property="og:title" content="@yield('og_title', 'Kantor Jasa Akuntan Batam & Konsultan Pajak — Akuntan Indonesia .ID')">
    <meta property="og:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia. Didukung Akuntan Beregister Negara & Kuasa Hukum Pengadilan Pajak.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/owner-hendra-setiyawan.png') }}">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Kantor Jasa Akuntan Batam & Konsultan Pajak — Akuntan Indonesia .ID')">
    <meta name="twitter:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia.')">
    <meta name="twitter:image" content="{{ asset('images/owner-hendra-setiyawan.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">

    <!-- Schema.org JSON-LD Structured Data for Local Batam SEO -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'AccountingService',
                '@id' => url('/') . '#organization',
                'name' => 'Akuntan Indonesia .ID',
                'alternateName' => ['Akuntan.ID', 'Kantor Jasa Akuntan Batam', 'Konsultan Pajak Batam'],
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
                    'latitude' => 1.127815,
                    'longitude' => 104.048700
                ],
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                        'opens' => '08:30',
                        'closes' => '17:30'
                    ]
                ],
                'areaServed' => [
                    ['@type' => 'AdministrativeArea', 'name' => 'Kota Batam'],
                    ['@type' => 'AdministrativeArea', 'name' => 'Kepulauan Riau'],
                    ['@type' => 'Country', 'name' => 'Indonesia']
                ],
                'memberOf' => [
                    ['@type' => 'Organization', 'name' => 'Ikatan Akuntan Indonesia (IAI)'],
                    ['@type' => 'Organization', 'name' => 'Chartered Accountants Worldwide (CAW)'],
                    ['@type' => 'Organization', 'name' => 'Asosiasi Konsultan Pajak Publik Indonesia (AKP2I)']
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
                'name' => 'Akuntan Indonesia .ID',
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
            <div class="container nav-container">
                <a href="{{ route('home') }}" class="nav-brand" aria-label="Akuntan Indonesia .ID">
                    <div class="brand-logo-wrap">
                        <img src="{{ asset('images/logo.png') }}" alt="Akuntan Indonesia .ID Logo" class="brand-logo">
                    </div>
                    <div class="brand-text">
                        <span class="brand-title">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                        <span class="brand-subtitle">Finance &amp; Tax Partner</span>
                    </div>
                </a>

                <ul class="nav-links" id="navLinks">
                    <li><a href="{{ request()->routeIs('home') ? '#layanan' : route('home') . '#layanan' }}" class="nav-link">Layanan</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#founder' : route('home') . '#founder' }}" class="nav-link">Founder</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#misi-nilai' : route('home') . '#misi-nilai' }}" class="nav-link">Tentang Kami</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#paket' : route('home') . '#paket' }}" class="nav-link">Paket</a></li>
                    <li><a href="{{ route('article.index') }}" class="nav-link {{ request()->routeIs('article.*') ? 'active' : '' }}">Artikel</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#faq' : route('home') . '#faq' }}" class="nav-link">FAQ</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}" class="nav-link">Kontak</a></li>
                </ul>

                <div class="nav-actions">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin konsultasi sat-set urusan keuangan & pajak bisnis saya di Batam.') }}" target="_blank" rel="noopener noreferrer" class="btn-cta-gold">
                        <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                        <span>Konsultasi WA</span>
                    </a>

                    <button class="nav-toggle" id="navToggle" aria-label="Buka Menu Navigasi" onclick="toggleNav()">
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
                <div class="mobile-drawer-header">
                    <img src="{{ asset('images/mascot-sambut.jpg') }}" alt="Mascot Akuntan.ID" class="mobile-drawer-avatar">
                    <div class="mobile-drawer-titles">
                        <span class="mobile-drawer-brand">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                        <span class="mobile-drawer-sub">Finance &amp; Tax Partner</span>
                    </div>
                </div>
                <a href="#layanan" class="mobile-nav-link" onclick="toggleNav()">
                    <span>📊 Layanan Keuangan &amp; Pajak</span>
                </a>
                <a href="#founder" class="mobile-nav-link" onclick="toggleNav()">
                    <span>👤 Profil Founder &amp; Partner</span>
                </a>
                <a href="#misi-nilai" class="mobile-nav-link" onclick="toggleNav()">
                    <span>🏛️ Visi &amp; 4 Pilar Misi</span>
                </a>
                <a href="#paket" class="mobile-nav-link" onclick="toggleNav()">
                    <span>💼 Paket Harga Transparan</span>
                </a>
                <a href="{{ route('article.index') }}" class="mobile-nav-link {{ request()->routeIs('article.*') ? 'active' : '' }}">
                    <span>📚 Artikel &amp; Coretax DJP</span>
                </a>
                <a href="#faq" class="mobile-nav-link" onclick="toggleNav()">
                    <span>❓ Tanya Jawab (FAQ)</span>
                </a>
                <a href="#kontak" class="mobile-nav-link" onclick="toggleNav()">
                    <span>📍 Kontak &amp; Lokasi Batam</span>
                </a>
                <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin konsultasi sat-set via WhatsApp Batam') }}" target="_blank" class="btn-primary-vibrant text-center" style="margin-top: 10px;">
                    <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                    <span>Konsultasi Sat-Set via WA</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content -->
    <main>
        @yield('content')
    </main>

    <!-- ========================================================================= -->
    <!-- INTERACTIVE 3D MASCOT CONCIERGE WIDGET ("Ada yang bisa dibantu?") -->
    <!-- ========================================================================= -->
    <div class="mascot-concierge-widget" id="mascotConcierge">
        <!-- Interactive Speech Bubble Card -->
        <div class="concierge-bubble-card" id="conciergeBubble">
            <div class="concierge-header">
                <div class="concierge-agent-info">
                    <img src="{{ asset('images/mascot-sambut.jpg') }}" alt="Mascot Akuntan.ID" class="concierge-mascot-avatar">
                    <div>
                        <b class="concierge-title">Akuntan.ID Assistant</b>
                        <span class="concierge-status">● Online &amp; Siap Membantu</span>
                    </div>
                </div>
                <button type="button" class="concierge-close-btn" onclick="closeConciergeBubble()" aria-label="Tutup Sapaan">✕</button>
            </div>

            <p class="concierge-body-text">
                Halo! Selamat datang di <strong>Akuntan Indonesia .ID</strong> 👋<br>
                Ada yang bisa kami bantu terkait pembukuan atau perpajakan bisnis Anda di Batam?
            </p>

            <div class="concierge-quick-chips">
                <button type="button" class="concierge-chip-btn chip-pembukuan" onclick="handleConciergeChoice('pembukuan')">
                    <span class="chip-ico">📊</span>
                    <span>Rapikan Pembukuan &amp; SAK</span>
                </button>
                <button type="button" class="concierge-chip-btn chip-pajak" onclick="handleConciergeChoice('pajak')">
                    <span class="chip-ico">📑</span>
                    <span>Konsultasi Pajak &amp; Coretax</span>
                </button>
                <button type="button" class="concierge-chip-btn chip-sp2dk" onclick="handleConciergeChoice('sp2dk')">
                    <span class="chip-ico">⚖️</span>
                    <span>Pendampingan SP2DK &amp; Sengketa</span>
                </button>
                <button type="button" class="concierge-chip-btn chip-paket" onclick="handleConciergeChoice('paket')">
                    <span class="chip-ico">💼</span>
                    <span>Lihat Daftar Paket Harga</span>
                </button>
            </div>

            <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID Batam, saya ingin bertanya dan konsultasi langsung dengan Akuntan.') }}" target="_blank" class="concierge-wa-direct-btn">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                <span>Chat Konsultan via WA</span>
            </a>
        </div>

        <!-- Floating Mascot Button Launcher with Teaser Pill -->
        <div class="mascot-launcher-cluster">
            <div class="mascot-teaser-pill" onclick="toggleConciergeBubble()">
                <span class="teaser-wave">👋</span>
                <span class="teaser-text">Ada yang bisa dibantu?</span>
            </div>
            <button type="button" class="mascot-floating-launcher" onclick="toggleConciergeBubble()" aria-label="Buka Percakapan Maskot">
                <img src="{{ asset('images/mascot-sambut.jpg') }}" alt="Akuntan.ID Mascot" class="launcher-avatar-img">
                <span class="launcher-online-dot"></span>
            </button>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- FOOTER COMPREHENSIVE -->
    <!-- ========================================================================= -->
    <footer class="footer-vibrant">
        <div class="container">
            <div class="footer-top-grid">
                <!-- Brand Info & Legal Register -->
                <div class="footer-brand-block">
                    <div class="footer-logo-row">
                        <div class="footer-logo-wrap">
                            <img src="{{ asset('images/logo.png') }}" alt="Akuntan Indonesia .ID" class="brand-logo">
                        </div>
                        <div>
                            <span class="footer-brand-title">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                            <span class="footer-brand-sub">Kantor Jasa Akuntansi &amp; Pajak Batam</span>
                        </div>
                    </div>
                    <p class="footer-lead-text">
                        {{ $profile['subtitle'] }}
                    </p>
                    <div class="footer-legal-tag">
                        ⚖️ Izin Resmi Kemenkeu RI &amp; Kuasa Hukum Pengadilan Pajak RI
                    </div>
                </div>

                <!-- 10 Services Quick Links -->
                <div>
                    <h4 class="footer-heading">Layanan Unggulan</h4>
                    <ul class="footer-links-list">
                        <li><a href="#pembukuan">Pembukuan (Bookkeeping)</a></li>
                        <li><a href="#kompilasi-laporan">Kompilasi Laporan SAK</a></li>
                        <li><a href="#perpajakan-litigasi">Pajak &amp; Kuasa Hukum Pajak</a></li>
                        <li><a href="#akuntansi-manajemen">Akuntansi Manajemen</a></li>
                        <li><a href="#sistem-informasi">Sistem Cloud Accounting</a></li>
                        <li><a href="#laporan-gcg">Tata Kelola GCG &amp; AUP</a></li>
                    </ul>
                </div>

                <!-- Fast Navigation -->
                <div>
                    <h4 class="footer-heading">Navigasi Utama</h4>
                    <ul class="footer-links-list">
                        <li><a href="#layanan">Semua 10 Layanan</a></li>
                        <li><a href="#founder">Profil Founder</a></li>
                        <li><a href="#misi-nilai">Visi &amp; 4 Pilar Misi</a></li>
                        <li><a href="#paket">Paket Harga Transparan</a></li>
                        <li><a href="#perbandingan">Komparasi Nilai</a></li>
                        <li><a href="{{ route('article.index') }}">Artikel &amp; Coretax DJP</a></li>
                        <li><a href="#faq">Pertanyaan Umum (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Contact Details -->
                <div>
                    <h4 class="footer-heading">Kontak &amp; Kantor Batam</h4>
                    <div class="footer-contact-items">
                        <div class="f-contact-row">
                            <span>📍</span>
                            <span>{{ $profile['contact']['address'] }}</span>
                        </div>
                        <div class="f-contact-row">
                            <span>📞</span>
                            <span>{{ $profile['contact']['phone'] }}</span>
                        </div>
                        <div class="f-contact-row">
                            <span>✉️</span>
                            <span>{{ $profile['contact']['email'] }}</span>
                        </div>
                        <div class="f-contact-row">
                            <span>🕒</span>
                            <span>{{ $profile['contact']['hours'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-row">
                <span>&copy; {{ date('Y') }} Akuntan Indonesia .ID. All rights reserved.</span>
                <span>Kantor Jasa Akuntansi &amp; Konsultan Pajak Resmi • Kota Batam, Kepulauan Riau &amp; Seluruh Indonesia</span>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Navbar Scroll Styling
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 30) {
                nav.classList.add('is-scrolled');
            } else {
                nav.classList.remove('is-scrolled');
            }
        });

        // Mobile Nav Drawer Toggle
        function toggleNav() {
            const drawer = document.getElementById('mobileDrawer');
            drawer.classList.toggle('is-open');
        }

        // Mascot Concierge Logic
        function toggleConciergeBubble() {
            const bubble = document.getElementById('conciergeBubble');
            bubble.classList.toggle('is-hidden');
        }

        function closeConciergeBubble() {
            const bubble = document.getElementById('conciergeBubble');
            bubble.classList.add('is-hidden');
        }

        function handleConciergeChoice(choice) {
            const bubble = document.getElementById('conciergeBubble');
            bubble.classList.add('is-hidden');

            if (choice === 'pembukuan') {
                const target = document.getElementById('pembukuan');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            } else if (choice === 'pajak') {
                const target = document.getElementById('perpajakan-litigasi');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            } else if (choice === 'sp2dk') {
                const target = document.getElementById('perpajakan-litigasi');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            } else if (choice === 'paket') {
                const target = document.getElementById('paket');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Auto-show concierge greeting after 1.2 seconds on initial load
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const bubble = document.getElementById('conciergeBubble');
                if (bubble) {
                    bubble.classList.remove('is-hidden');
                }
            }, 1200);
        });
    </script>
    @yield('scripts_extra')
</body>
</html>
