<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>@yield('title', 'Akuntan Indonesia .ID | Next-Gen Finance & Tax Partner (KJA Hendra Setiyawan)')</title>
    <meta name="description" content="@yield('meta_description', 'Akuntan Indonesia .ID (KJA Hendra Setiyawan) - Kantor Jasa Akuntansi & Konsultan Pajak Resmi. Pembukuan sat-set, laporan keuangan SAK, lapor SPT, tax planning, dan Kuasa Hukum Pengadilan Pajak.')">
    <meta name="keywords" content="kantor jasa akuntan batam, kja hendra setiyawan, akuntan indonesia, konsultan pajak batam, kuasa hukum pengadilan pajak, jasa pembukuan umkm, lapor spt tahunan, tax planning, coretax djp, akuntan bisnis indonesia">
    <meta name="author" content="KJA Hendra Setiyawan - Akuntan Indonesia .ID">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Akuntan Indonesia .ID">
    <meta property="og:title" content="@yield('og_title', 'Akuntan Indonesia .ID — Next-Gen Finance & Tax Partner')">
    <meta property="og:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia. Didukung Akuntan Beregister Negara & Kuasa Hukum Pengadilan Pajak.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/owner-hendra-setiyawan.png') }}">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Akuntan Indonesia .ID — Next-Gen Finance & Tax Partner')">
    <meta name="twitter:description" content="@yield('og_description', 'Partner Akuntansi dan Perpajakan Resmi untuk UMKM & Korporasi di Batam & Seluruh Indonesia.')">
    <meta name="twitter:image" content="{{ asset('images/owner-hendra-setiyawan.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
                'name' => 'Akuntan Indonesia .ID (KJA Hendra Setiyawan)',
                'alternateName' => 'Akuntan.ID',
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
                        <span class="brand-subtitle">KJA Hendra Setiyawan</span>
                    </div>
                </a>

                <ul class="nav-links" id="navLinks">
                    <li><a href="#layanan" class="nav-link">Layanan</a></li>
                    <li><a href="#misi-nilai" class="nav-link">Tentang Kami</a></li>
                    <li><a href="#paket" class="nav-link">Paket</a></li>
                    <li><a href="#faq" class="nav-link">FAQ</a></li>
                    <li><a href="#kontak" class="nav-link">Kontak</a></li>
                </ul>

                <div class="nav-actions">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID (KJA Hendra Setiyawan), saya ingin konsultasi sat-set urusan keuangan & pajak bisnis saya.') }}" target="_blank" rel="noopener noreferrer" class="btn-cta-gold">
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
                <a href="#layanan" class="mobile-nav-link" onclick="toggleNav()">Layanan</a>
                <a href="#misi-nilai" class="mobile-nav-link" onclick="toggleNav()">Tentang Kami</a>
                <a href="#paket" class="mobile-nav-link" onclick="toggleNav()">Paket Biaya</a>
                <a href="#faq" class="mobile-nav-link" onclick="toggleNav()">FAQ &amp; Bantuan</a>
                <a href="#kontak" class="mobile-nav-link" onclick="toggleNav()">Kontak &amp; Lokasi</a>
                <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin konsultasi gratis via WhatsApp') }}" target="_blank" class="btn-primary-vibrant text-center" style="margin-top: 10px;">
                    <span>Chat WhatsApp Sat-Set</span>
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
                        <span class="concierge-status">● Siap Membantu</span>
                    </div>
                </div>
                <button type="button" class="concierge-close-btn" onclick="closeConciergeBubble()" aria-label="Tutup Sapaan">✕</button>
            </div>

            <p class="concierge-body-text">
                Halo! Selamat datang di <strong>Akuntan.ID</strong> 👋<br>
                Ada yang bisa kami bantu terkait keuangan atau perpajakan bisnis Anda?
            </p>

            <div class="concierge-quick-chips">
                <button type="button" class="concierge-chip-btn" onclick="handleConciergeChoice('pembukuan')">
                    <span>📊</span>
                    <span>Rapikan Pembukuan &amp; SAK</span>
                </button>
                <button type="button" class="concierge-chip-btn" onclick="handleConciergeChoice('pajak')">
                    <span>📑</span>
                    <span>Konsultasi Pajak &amp; Coretax</span>
                </button>
                <button type="button" class="concierge-chip-btn" onclick="handleConciergeChoice('sp2dk')">
                    <span>⚖️</span>
                    <span>Pendampingan SP2DK &amp; Sengketa</span>
                </button>
                <button type="button" class="concierge-chip-btn" onclick="handleConciergeChoice('paket')">
                    <span>💼</span>
                    <span>Lihat Daftar Paket Harga</span>
                </button>
            </div>

            <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin bertanya dan konsultasi langsung dengan Akuntan.') }}" target="_blank" class="concierge-wa-direct-btn">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                <span>Chat Konsultan via WA</span>
            </a>
        </div>

        <!-- Floating Mascot Button Launcher -->
        <button type="button" class="mascot-floating-launcher" onclick="toggleConciergeBubble()" aria-label="Buka Percakapan Maskot">
            <img src="{{ asset('images/mascot-sambut.jpg') }}" alt="Akuntan.ID Mascot" class="launcher-avatar-img">
            <span class="launcher-online-dot"></span>
        </button>
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
                            <span class="footer-brand-sub">KJA Hendra Setiyawan</span>
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
                        <li><a href="#misi-nilai">Visi &amp; 4 Pilar Misi</a></li>
                        <li><a href="#paket">Paket Harga Transparan</a></li>
                        <li><a href="#perbandingan">Komparasi Nilai</a></li>
                        <li><a href="#berita">Wawasan &amp; Coretax</a></li>
                        <li><a href="#faq">Pertanyaan Umum (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Contact Details -->
                <div>
                    <h4 class="footer-heading">Kontak &amp; Kantor</h4>
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
                <span>&copy; {{ date('Y') }} Akuntan Indonesia .ID (KJA Hendra Setiyawan). All rights reserved.</span>
                <span>Next-Gen Finance &amp; Tax Partner • Batam &amp; Seluruh Indonesia</span>
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

        // Auto-show concierge greeting after 1.5 seconds on initial load
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
