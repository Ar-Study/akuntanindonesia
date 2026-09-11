<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>@yield('title', 'Kantor Jasa Akuntan Batam & Konsultan Pajak | Akuntan Indonesia .ID')</title>
    <meta name="description" content="@yield('meta_description', 'Kantor Jasa Akuntansi & Konsultan Pajak Resmi di Batam. Pembukuan sat-set, laporan keuangan SAK EMKM, lapor SPT, tax planning, Coretax DJP, dan pendampingan perpajakan.')">
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
    <meta property="og:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia. Didukung Akuntan Beregister Negara & Konsultan Pajak Berizin Kementerian Keuangan RI.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:image:secure_url" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Kantor Jasa Akuntan Batam & Konsultan Pajak — Akuntan Indonesia .ID">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Kantor Jasa Akuntan Batam & Konsultan Pajak — Akuntan Indonesia .ID')">
    <meta name="twitter:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta name="twitter:image:alt" content="Kantor Jasa Akuntan Batam & Konsultan Pajak — Akuntan Indonesia .ID">

    <!-- Favicon & Device Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/favicon-48x48.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon-512x512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#7C1D2A">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ file_exists(public_path('css/app.css')) ? filemtime(public_path('css/app.css')) : '1.0.0' }}">

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
                'image' => asset('images/og-image.jpg'),
                'telephone' => $profile['contact']['phone'] ?? '0811-7777-109',
                'email' => $profile['contact']['email'] ?? 'halo@akuntanindonesia.id',
                'priceRange' => '$$',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Ruko Mega Legenda 2, Blk. B2 No.3A, Baloi Permai, Kec. Batam Kota',
                    'addressLocality' => 'Batam',
                    'addressRegion' => 'Kepulauan Riau',
                    'postalCode' => '29444',
                    'addressCountry' => 'ID'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => 1.141601,
                    'longitude' => 104.029651
                ],
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                        'opens' => '08:30',
                        'closes' => '17:00'
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
                    'name' => 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA',
                    'jobTitle' => 'Akuntan Berpraktek & Konsultan Pajak Berizin di Kementerian Keuangan',
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
                        <span class="brand-subtitle">Your Next-Gen Finance & Tax Partner</span>
                    </div>
                </a>

                <ul class="nav-links" id="navLinks">
                    <li><a href="{{ request()->routeIs('home') ? '#layanan' : route('home') . '#layanan' }}" class="nav-link">Layanan</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#founder' : route('home') . '#founder' }}" class="nav-link">Founder</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#misi-nilai' : route('home') . '#misi-nilai' }}" class="nav-link">Tentang Kami</a></li>
                    <li><a href="{{ route('article.index') }}" class="nav-link {{ request()->routeIs('article.*') ? 'active' : '' }}">Artikel</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#faq' : route('home') . '#faq' }}" class="nav-link">FAQ</a></li>
                    <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}" class="nav-link">Kontak</a></li>
                </ul>

                <div class="nav-actions">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '628117777109') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin konsultasi sat-set urusan keuangan & pajak bisnis saya di Batam.') }}" target="_blank" rel="noopener noreferrer" class="btn-cta-gold">
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
                        <span class="mobile-drawer-sub">Your Next-Gen Finance &amp; Tax Partner</span>
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
                <a href="{{ route('article.index') }}" class="mobile-nav-link {{ request()->routeIs('article.*') ? 'active' : '' }}">
                    <span>📚 Artikel &amp; Coretax DJP</span>
                </a>
                <a href="#faq" class="mobile-nav-link" onclick="toggleNav()">
                    <span>❓ Tanya Jawab (FAQ)</span>
                </a>
                <a href="#kontak" class="mobile-nav-link" onclick="toggleNav()">
                    <span>📍 Kontak &amp; Lokasi Batam</span>
                </a>
                <a href="https://wa.me/{{ env('WA_NUMBER', '628117777109') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin konsultasi sat-set via WhatsApp Batam') }}" target="_blank" class="btn-primary-vibrant text-center" style="margin-top: 10px;">
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
                <button type="button" class="concierge-chip-btn chip-founder" onclick="handleConciergeChoice('founder')">
                    <span class="chip-ico">👤</span>
                    <span>Profil Founder &amp; Legalitas</span>
                </button>
            </div>

            <a href="https://wa.me/{{ env('WA_NUMBER', '628117777109') }}?text={{ urlencode('Halo Akuntan.ID Batam, saya ingin bertanya dan konsultasi langsung dengan Akuntan.') }}" target="_blank" class="concierge-wa-direct-btn">
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
                        <div class="footer-brand-text">
                            <span class="footer-brand-title">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                            <span class="footer-brand-sub">Your Next-Gen Finance &amp; Tax Partner</span>
                        </div>
                    </div>
                    <p class="footer-lead-text">
                        {{ $profile['subtitle'] }}
                    </p>
                    <div class="footer-affil-row">
                        <span class="f-affil-chip">Register Negara Akuntan</span>
                        <span class="f-affil-chip">CA - Chartered Accountant</span>
                        <span class="f-affil-chip">Chartered Accountants Worldwide (CAW)</span>
                        <span class="f-affil-chip">Pengurus Cabang Asosiasi AKP2I</span>
                    </div>
                </div>

                <!-- 10 Services Quick Links -->
                <div>
                    <h4 class="footer-heading">Layanan Unggulan</h4>
                    <ul class="footer-links-list">
                        <li><a href="{{ request()->routeIs('home') ? '#pembukuan' : route('home') . '#pembukuan' }}">Pembukuan &amp; Rekonsiliasi</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#kompilasi-laporan' : route('home') . '#kompilasi-laporan' }}">Kompilasi Laporan SAK EMKM</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#perpajakan-litigasi' : route('home') . '#perpajakan-litigasi' }}">Perpajakan &amp; Konsultan Pajak</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#akuntansi-manajemen' : route('home') . '#akuntansi-manajemen' }}">Akuntansi Manajemen &amp; Strategi</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#sistem-informasi' : route('home') . '#sistem-informasi' }}">Sistem Cloud Accounting</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#laporan-gcg' : route('home') . '#laporan-gcg' }}">Tata Kelola Perusahaan (GCG) &amp; AUP</a></li>
                    </ul>
                </div>

                <!-- Fast Navigation -->
                <div>
                    <h4 class="footer-heading">Navigasi Utama</h4>
                    <ul class="footer-links-list">
                        <li><a href="{{ request()->routeIs('home') ? '#layanan' : route('home') . '#layanan' }}">10 Layanan Komprehensif</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#founder' : route('home') . '#founder' }}">Profil Founder &amp; Lisensi</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#misi-nilai' : route('home') . '#misi-nilai' }}">Visi &amp; 4 Pilar Misi</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#perbandingan' : route('home') . '#perbandingan' }}">Komparasi Keunggulan</a></li>
                        <li><a href="{{ route('article.index') }}">Artikel &amp; Wawasan Pajak</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#faq' : route('home') . '#faq' }}">Tanya Jawab (FAQ)</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}">Konsultasi Sat-Set</a></li>
                    </ul>
                </div>

                <!-- Contact Details -->
                <div>
                    <h4 class="footer-heading">Kontak &amp; Kantor Batam</h4>
                    <div class="footer-contact-items">
                        <div class="f-contact-row">
                            <span class="f-ico">📍</span>
                            <a href="{{ $profile['contact']['maps_url'] ?? 'https://www.google.com/maps/place/PT.+AKUNTAN+BISNIS+INDONESIA+(Konsultan+Pajak+Dan+Keuangan)/@1.1416011,104.0296512,17z/data=!3m1!4b1!4m6!3m5!1s0x31d98d2dda714a13:0xd2b1359e2dfdd1a4!8m2!3d1.1416011!4d104.0296512!16s%2Fg%2F11hz_1g3sg?entry=ttu&g_ep=EgoyMDI2MDkwMi4wIKXMDSoASAFQAw%3D%3D' }}" target="_blank" rel="noopener noreferrer" class="f-link-highlight" title="PT. AKUNTAN BISNIS INDONESIA (Konsultan Pajak Dan Keuangan) - Google Maps">
                                Kantor Operasional Batam: {{ $profile['contact']['address'] }} ↗
                            </a>
                        </div>
                        <div class="f-contact-row">
                            <span class="f-ico">💬</span>
                            <a href="https://wa.me/{{ env('WA_NUMBER', '628117777109') }}?text={{ urlencode('Halo Akuntan.ID Batam, saya ingin berkonsultasi mengenai pembukuan dan perpajakan bisnis saya.') }}" target="_blank" rel="noopener noreferrer" class="f-link-highlight">
                                WhatsApp: {{ $profile['contact']['phone'] }}
                            </a>
                        </div>
                        <div class="f-contact-row">
                            <span class="f-ico">✉️</span>
                            <a href="mailto:{{ $profile['contact']['email'] }}" class="f-link-highlight">
                                {{ $profile['contact']['email'] }}
                            </a>
                        </div>
                        <div class="f-contact-row">
                            <span class="f-ico">🕒</span>
                            <span>{{ $profile['contact']['hours'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-row">
                <span>&copy; {{ date('Y') }} Akuntan Indonesia .ID. All rights reserved.</span>
                <span>Your Next-Gen Finance &amp; Tax Partner • Kantor Jasa Akuntansi &amp; Konsultan Pajak Berizin Kementerian Keuangan RI</span>
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
            } else if (choice === 'founder') {
                const target = document.getElementById('founder');
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
