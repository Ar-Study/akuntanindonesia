@extends('layouts.app')

@section('title', 'Kantor Jasa Akuntan Batam & Konsultan Pajak | Akuntan Indonesia .ID')
@section('meta_description', 'Kantor Jasa Akuntansi & Konsultan Pajak Resmi di Batam. Pembukuan sat-set, laporan keuangan SAK EMKM, lapor SPT, tax planning, Coretax DJP, dan Kuasa Hukum Pengadilan Pajak.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. HERO SECTION (DYNAMIC 3D MASCOT STAGE & FRESH MODERN VIBRANT THEME) -->
<!-- ========================================================================= -->
<section id="hero" class="hero-section">
    <!-- Ambient Animated Mesh Gradient Orbs -->
    <div class="mesh-orb orb-ruby"></div>
    <div class="mesh-orb orb-blue"></div>
    <div class="mesh-orb orb-amber"></div>

    <div class="container hero-inner">
        <div class="hero-content">
            <div class="hero-tag-pill">
                <span class="pulse-dot"></span>
                <span class="tag-bold">AKUNTAN INDONESIA .ID</span>
                <span class="tag-sep">•</span>
                <span>Kantor Jasa Akuntan &amp; Pajak Batam</span>
            </div>

            <h1 class="hero-headline">
                Financial Solved, <span class="headline-highlight">No Stress.</span><br>
                Fokus <span class="text-gradient">Scale-Up Bisnis</span> Anda.
            </h1>

            <p class="hero-subline">
                Satu solusi tepat untuk seluruh masalah pembukuan &amp; perpajakan bisnis Anda di Batam &amp; seluruh Indonesia. Kami membantu <strong>merapikan pembukuan</strong>, <strong>menata kepatuhan pajak Coretax</strong>, dan menyajikan <strong>laporan keuangan transparan standar SAK</strong> agar Anda bebas scale up tanpa hambatan regulasi.
            </p>

            <div class="hero-cta-group">
                <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID Batam, saya ingin konsultasi sat-set urusan pembukuan dan perpajakan bisnis saya.') }}" target="_blank" class="btn-primary-vibrant">
                    <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                    <span>Konsultasi Sat-Set via WA</span>
                </a>
                <a href="#layanan" class="btn-secondary-glow">
                    <span>Lihat 10 Layanan Lengkap</span>
                    <span>↓</span>
                </a>
            </div>

            <!-- Value Props List -->
            <div class="hero-prop-chips">
                <span class="prop-chip"><i class="chk">✓</i> Anti-Ribet &amp; Efisien</span>
                <span class="prop-chip"><i class="chk">✓</i> 100% Coretax DJP Ready</span>
                <span class="prop-chip"><i class="chk">✓</i> Kuasa Hukum Pengadilan Pajak</span>
            </div>
        </div>

        <!-- Hero Visual: 3D Mascot Character Stage Only -->
        <div class="hero-visual-wrapper">
            <div class="mascot-solo-stage">
                <div class="mascot-glow-backdrop"></div>
                <div class="mascot-figure-frame">
                    <img src="{{ asset('images/mascot-standing.png') }}" alt="Si Akuntan - Maskot Resmi Akuntan Indonesia .ID" class="mascot-hero-solo-img">
                </div>

                <!-- Speech Bubble for Mascot -->
                <div class="mascot-hero-bubble">
                    <span class="bubble-wave">👋</span>
                    <div class="bubble-text">
                        <strong>Halo! Saya Si Akuntan</strong>
                        <small>Partner sat-set keuangan &amp; pajak bisnis Anda!</small>
                    </div>
                </div>

                <!-- Floating Interactive Badge 1 (Kuasa Hukum Pajak RI) -->
                <div class="visual-badge badge-top-left">
                    <div class="badge-icon-box">⚖️</div>
                    <div>
                        <b>Kuasa Hukum Pajak RI</b>
                        <small>Resmi Pengadilan Pajak</small>
                    </div>
                </div>

                <!-- Floating Interactive Badge 2 (100% Coretax DJP Ready) -->
                <div class="visual-badge badge-mid-right">
                    <div class="badge-icon-box" style="background: rgba(37, 99, 235, 0.1); color: var(--color-blue-600);">💻</div>
                    <div>
                        <b>100% Coretax Ready</b>
                        <small>Sat-Set, Patuh &amp; Akurat</small>
                    </div>
                </div>

                <!-- Mascot Platform Tag -->
                <div class="mascot-stage-footer">
                    <div class="stage-footer-pill">
                        <span class="pulse-emerald-dot"></span>
                        <span>Si Akuntan • Next-Gen Mascot Partner</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Counter Ribbon -->
    <div class="container hero-stats-ribbon">
        <div class="stats-counter-grid">
            @foreach($profile['stats'] as $st)
                <div class="stat-counter-card">
                    <span class="stat-icon-glow">{{ $st['icon'] }}</span>
                    <strong class="stat-number-val">{{ $st['num'] }}</strong>
                    <span class="stat-label-text">{{ $st['label'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 2. ACCREDITATIONS & OFFICIAL AFFILIATION LOGOS RIBBON -->
<!-- ========================================================================= -->
<section class="accreditation-ribbon">
    <div class="container">
        <div class="accred-inner">
            <span class="accred-lead">KEANGGOTAAN &amp; AFILIASI PROFESI RESMI:</span>
            <div class="accred-badges-row">
                <!-- 1. Member of CA IAI -->
                <div class="accred-badge-item accred-logo-item" title="Member of Chartered Accountant Indonesia / Ikatan Akuntan Indonesia (IAI)">
                    <img src="{{ asset('images/logo-ca-iai.png') }}" alt="Member of Chartered Accountant Indonesia / Ikatan Akuntan Indonesia" class="accred-logo-img">
                </div>

                <!-- 2. CAW Network Member -->
                <div class="accred-badge-item accred-logo-item" title="Chartered Accountants Worldwide Network Member">
                    <img src="{{ asset('images/logo-caw.png') }}" alt="Chartered Accountants Worldwide Network Member" class="accred-logo-img">
                </div>

                <!-- 3. AKP2I -->
                <div class="accred-badge-item accred-logo-item" title="Asosiasi Konsultan Pajak Publik Indonesia (AKP2I)">
                    <img src="{{ asset('images/logo-akp2i.png') }}" alt="Asosiasi Konsultan Pajak Publik Indonesia" class="accred-logo-img">
                </div>

                <!-- 4. Kuasa Hukum Pengadilan Pajak -->
                <div class="accred-badge-item">
                    <span class="em-icon">⚖️</span>
                    <span>Kuasa Hukum Pengadilan Pajak RI</span>
                </div>

                <!-- 5. DJP Coretax System Ready -->
                <div class="accred-badge-item">
                    <span class="em-icon">💻</span>
                    <span>DJP Coretax Ready</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 3. DEDICATED FOUNDER PROFILE SECTION -->
<!-- ========================================================================= -->
<section id="founder" class="founder-section">
    <div class="container">
        <div class="founder-card-wrapper">
            <div class="founder-grid">
                <!-- Founder Photo Column -->
                <div class="founder-visual-col">
                    <div class="founder-photo-frame">
                        <img src="{{ asset('images/owner-hendra-setiyawan.png') }}" alt="{{ $profile['owner']['name'] }}" class="founder-main-photo">
                        <div class="founder-badge-overlay">
                            <span class="founder-verified-icon">✓</span>
                            <span>Akuntan Beregister Negara</span>
                        </div>
                    </div>
                    <div class="founder-affil-logos-row">
                        <img src="{{ asset('images/logo-ca-iai.png') }}" alt="CA IAI" class="founder-sub-logo" title="Ikatan Akuntan Indonesia">
                        <img src="{{ asset('images/logo-caw.png') }}" alt="CAW" class="founder-sub-logo" title="Chartered Accountants Worldwide">
                        <img src="{{ asset('images/logo-akp2i.png') }}" alt="AKP2I" class="founder-sub-logo" title="Asosiasi Konsultan Pajak Publik Indonesia">
                    </div>
                </div>

                <!-- Founder Bio & Credentials Column -->
                <div class="founder-info-col">
                    <span class="section-label label-ruby">FOUNDER &amp; MANAGING PARTNER</span>
                    <h2 class="founder-name">{{ $profile['owner']['name'] }}</h2>
                    <p class="founder-role-title">{{ $profile['owner']['title'] }}</p>

                    <p class="founder-bio-paragraph">
                        {{ $profile['owner']['bio'] }}
                    </p>

                    <div class="founder-credentials-list">
                        <h4 class="credentials-heading">Kredensial &amp; Lisensi Resmi:</h4>
                        <div class="credentials-grid">
                            @foreach($profile['owner']['credentials'] as $cred)
                                <div class="credential-item">
                                    <span class="cred-check">✓</span>
                                    <span>{{ $cred }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="founder-quote-box">
                        <p class="quote-text">
                            “Keberhasilan bisnis berawal dari pencatatan keuangan yang jujur, kepatuhan pajak yang terencana, dan keputusan strategis berbasis data riil. Kami hadir mengawal bisnis Anda tumbuh kokoh tanpa rasa cemas.”
                        </p>
                    </div>

                    <div class="founder-cta-row">
                        <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Pak Hendra & Tim Akuntan.ID, saya ingin berdiskusi mengenai pembukuan / perpajakan bisnis saya.') }}" target="_blank" class="btn-primary-vibrant">
                            <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                            <span>Konsultasi Langsung dengan Founder</span>
                        </a>
                        <a href="#kontak" class="btn-secondary-glow">
                            <span>Formulir Janji Temu</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 4. 10 LAYANAN LENGKAP DARI DOKUMEN (INTERACTIVE BENTO GRID & TABS) -->
<!-- ========================================================================= -->
<section id="layanan" class="services-bento-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-ruby">10 LAYANAN LENGKAP TERPADU</span>
            <h2 class="section-title">Ekosistem Solusi Finansial &amp; <span class="text-gradient">Perpajakan Terpadu</span></h2>
            <p class="section-desc">
                Dirancang khusus untuk memangkas proses rumit lewat alur kerja digital yang presisi, patuh aturan hukum, dan siap mengawal pertumbuhan bisnis Anda.
            </p>
        </div>

        <!-- Filter Category Tabs -->
        <div class="service-filter-tabs">
            <button type="button" class="filter-tab-btn is-active" onclick="filterServices('all', this)">Semua Layanan (10)</button>
            <button type="button" class="filter-tab-btn" onclick="filterServices('pembukuan', this)">📊 Pembukuan &amp; Laporan SAK</button>
            <button type="button" class="filter-tab-btn" onclick="filterServices('pajak', this)">⚖️ Pajak &amp; Kuasa Hukum</button>
            <button type="button" class="filter-tab-btn" onclick="filterServices('manajemen', this)">📈 Manajemen &amp; GCG</button>
            <button type="button" class="filter-tab-btn" onclick="filterServices('sistem', this)">💻 Sistem Cloud</button>
        </div>

        <!-- Bento Grid Cards -->
        <div class="bento-services-grid" id="servicesGrid">
            @foreach($services as $index => $srv)
                <div class="bento-card bento-theme-{{ $srv['color'] ?? 'ruby' }} {{ $index === 0 || $index === 5 ? 'bento-span-2' : '' }}" data-category="{{ $srv['category'] }}" id="{{ $srv['id'] }}">
                    <div class="bento-header">
                        <span class="bento-badge">{{ $srv['badge'] }}</span>
                        <div class="bento-icon">{{ $srv['icon'] }}</div>
                    </div>

                    <h3 class="bento-title">{{ $srv['title'] }}</h3>
                    <p class="bento-desc">{{ $srv['desc'] }}</p>

                    <!-- Mascot Helper Tip -->
                    @if(isset($srv['mascot_tip']))
                        @php
                            $categoryMascotMap = [
                                'pajak' => 'mascot-pajak.jpg',
                                'pembukuan' => 'mascot-profesional.jpg',
                                'manajemen' => 'mascot-solusi.jpg',
                                'sistem' => 'mascot-optimis.jpg',
                            ];
                            $cardMascotFile = $categoryMascotMap[$srv['category'] ?? ''] ?? 'mascot-tumbuh.jpg';
                        @endphp
                        <div class="bento-mascot-tip">
                            <img src="{{ asset('images/' . $cardMascotFile) }}" alt="Tip Maskot" class="mascot-tiny-avatar">
                            <span class="mascot-tip-text">💡 {{ $srv['mascot_tip'] }}</span>
                        </div>
                    @endif

                    <div class="bento-checklist">
                        @foreach($srv['points'] as $pt)
                            <div class="bento-check-item">
                                <span class="chk-bubble">✓</span>
                                <span>{{ $pt }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="bento-footer">
                        <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya ingin konsultasi mengenai layanan: ' . $srv['title']) }}" target="_blank" class="bento-action-link">
                            <span>Konsultasikan Layanan Ini</span>
                            <span class="arrow-sym">→</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 5. VISI, 4 PILAR MISI & 4 CORE VALUES (WITH 3D MASCOT POSES) -->
<!-- ========================================================================= -->
<section id="misi-nilai" class="mission-values-section">
    <div class="container">
        <!-- Official Vision Banner -->
        <div class="vision-banner-card">
            <span class="vision-label">VISI RESMI AKUNTAN INDONESIA .ID</span>
            <p class="vision-text">“{{ $vision }}”</p>
        </div>

        <div class="section-header text-center">
            <span class="section-label label-blue">OUR SPIRIT &amp; 4 PILAR MISI</span>
            <h2 class="section-title">Komitmen &amp; Nilai Utama <span class="text-gradient-blue">Akuntan Indonesia .ID</span></h2>
            <p class="section-desc">
                Kami hadir bukan sekadar mencatat angka, melainkan sebagai mitra terpercaya yang mengawal transparansi keuangan dan memberdayakan talenta akuntan muda.
            </p>
        </div>

        <!-- 4 Pillars of Mission with Mascot Poses -->
        <div class="mission-pillars-grid">
            @foreach($missionPillars as $mp)
                <div class="pillar-card pillar-{{ $mp['color'] }}">
                    <div class="pillar-mascot-frame">
                        <img src="{{ $mp['mascot_img'] }}" alt="{{ $mp['mascot_label'] }}" class="pillar-mascot-img">
                    </div>
                    <span class="pillar-badge">{{ $mp['badge'] }} • {{ $mp['mascot_label'] }}</span>
                    <h3 class="pillar-title">{{ $mp['title'] }}</h3>
                    <p class="pillar-desc">{{ $mp['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- 4 Core Values Strip -->
        <div class="core-values-strip">
            @foreach($coreValues as $cv)
                <div class="value-item">
                    <span class="val-icon">{{ $cv['icon'] }}</span>
                    <div>
                        <b>{{ $cv['title'] }}</b>
                        <p>{{ $cv['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 6. PAKET HARGA TRANSPARAN (PRICING TIERS) -->
<!-- ========================================================================= -->
<section id="paket" class="packages-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-gold">TRANSPARANSI INVESTASI</span>
            <h2 class="section-title">Pilihan Paket Layanan <span class="text-gradient">Sesuai Skala Bisnis</span></h2>
            <p class="section-desc">
                Investasi cerdas yang melindungi operasional usaha Anda dari denda pajak, surat SP2DK, dan ketidakpastian cash flow.
            </p>
        </div>

        <div class="pricing-cards-grid">
            @foreach($packages as $pkg)
                <div class="pricing-card {{ $pkg['is_popular'] ? 'is-best-value' : '' }}">
                    @if($pkg['is_popular'])
                        <div class="popular-glow-badge">{{ $pkg['badge'] }}</div>
                        <div class="tier-mascot-recommend">
                            <img src="{{ asset('images/mascot-optimis.jpg') }}" alt="Mascot Akuntan" class="tier-mascot-avatar">
                            <span>Pilihan Favorit Maskot Akuntan 🌟</span>
                        </div>
                    @else
                        <div class="standard-tier-badge">{{ $pkg['badge'] }}</div>
                    @endif

                    <h3 class="tier-name">{{ $pkg['name'] }}</h3>
                    <p class="tier-desc">{{ $pkg['desc'] }}</p>

                    <div class="tier-price-box">
                        <span class="tier-price-val">{{ $pkg['price'] }}</span>
                        <span class="tier-period-val">{{ $pkg['period'] }}</span>
                    </div>

                    <div class="tier-divider"></div>

                    <ul class="tier-features-list">
                        @foreach($pkg['features'] as $f)
                            <li>
                                <span class="tier-check">✓</span>
                                <span>{{ $f }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode($pkg['cta_wa']) }}" target="_blank" class="{{ $pkg['is_popular'] ? 'btn-tier-featured' : 'btn-tier-outline' }}">
                        {{ $pkg['cta_text'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 7. TABEL PERBANDINGAN TRANSPARAN (HEAD-TO-HEAD) -->
<!-- ========================================================================= -->
<section id="perbandingan" class="comparison-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-ruby">KOMPARASI NILAI</span>
            <h2 class="section-title">Mengapa Bermitra dengan <span class="text-gradient">Akuntan Indonesia .ID?</span></h2>
            <p class="section-desc">
                Lihat perbedaan mendasar antara bermitra bersama kami dibanding konsultan konvensional atau mengerjakannya sendiri tanpa lisensi resmi.
            </p>
        </div>

        <div class="vibrant-table-wrapper">
            <table class="vibrant-table">
                <thead>
                    <tr>
                        <th class="th-aspect">Aspek Kunci</th>
                        <th class="th-brand">
                            <div class="brand-th-inner">
                                <b>Akuntan Indonesia .ID</b>
                                <small>Finance &amp; Tax Partner</small>
                            </div>
                        </th>
                        <th class="th-other">Konsultan Konvensional</th>
                        <th class="th-other">Dikerjakan Sendiri</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comparisons as $cmp)
                        <tr>
                            <td class="td-aspect">
                                <strong>{{ $cmp['aspect'] }}</strong>
                            </td>
                            <td class="td-brand">
                                <span class="icon-chk">✓</span>
                                <span>{{ $cmp['our'] }}</span>
                            </td>
                            <td class="td-other">
                                <span class="icon-warn">⚠</span>
                                <span>{{ $cmp['conventional'] }}</span>
                            </td>
                            <td class="td-other">
                                <span class="icon-cross">✕</span>
                                <span>{{ $cmp['self'] }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 8. SOLUSI BERDASARKAN KATEGORI KLIEN (TARGET AUDIENCE) -->
<!-- ========================================================================= -->
<section id="solusi-klien" class="audience-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-blue">SEGMENTASI SOLUSI</span>
            <h2 class="section-title">Siapa yang Kami <span class="text-gradient-blue">Bantu Bertumbuh?</span></h2>
            <p class="section-desc">
                Pendekatan fleksibel yang disesuaikan dengan kebutuhan unik tiap skala dan model bisnis di era modern.
            </p>
        </div>

        <div class="audience-grid">
            @foreach($audiences as $aud)
                <div class="audience-card">
                    <div class="aud-icon">{{ $aud['icon'] }}</div>
                    <h3 class="aud-title">{{ $aud['title'] }}</h3>
                    <p class="aud-desc">{{ $aud['desc'] }}</p>
                    <div class="aud-tags">
                        @foreach($aud['tags'] as $tg)
                            <span class="aud-tag-pill">{{ $tg }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 9. ARTIKEL, TIPS & UPDATE CORETAX DJP (SINKRON DENGAN DB) -->
<!-- ========================================================================= -->
<section id="berita" class="articles-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-ruby">ARTIKEL &amp; WAWASAN</span>
            <h2 class="section-title">Artikel Finansial &amp; <span class="text-gradient">Update Coretax DJP</span></h2>
            <p class="section-desc">
                Pelajari perkembangan regulasi perpajakan nasional dan tips pembukuan agar operasional bisnis senantiasa aman dan patuh.
            </p>
        </div>

        <div class="articles-vibrant-grid">
            @foreach(array_slice($articles, 0, 3) as $art)
                <article class="vibrant-article-card">
                    <div class="art-tag-row">
                        <span class="art-badge">{{ $art['category'] }}</span>
                        <span class="art-time">{{ $art['read_time'] }}</span>
                    </div>
                    <h3 class="art-heading">
                        <a href="{{ route('article.detail', $art['slug']) }}">
                            {{ $art['title'] }}
                        </a>
                    </h3>
                    <p class="art-summary">{{ $art['excerpt'] }}</p>
                    <div class="art-bottom">
                        <span class="art-date">{{ $art['date'] }}</span>
                        <a href="{{ route('article.detail', $art['slug']) }}" class="art-action">
                            <span>Baca Artikel</span>
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        @if(count($articles) > 3)
            <div class="articles-view-all-wrap text-center">
                <a href="{{ route('article.index') }}" class="btn-articles-all">
                    <span>Lihat Semua Artikel &amp; Wawasan ({{ count($articles) }})</span>
                    <svg class="icon-arrow-all" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- ========================================================================= -->
<!-- 10. TESTIMONI & ULASAN KLIEN -->
<!-- ========================================================================= -->
<section id="testimoni" class="testimonials-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-emerald">SOCIAL PROOF</span>
            <h2 class="section-title">Cerita Sukses dari <span class="text-gradient">Para Business Owner</span></h2>
            <p class="section-desc">
                Pengalaman nyata para pelaku usaha yang merasakan efisiensi dan ketenangan bermitra bersama Akuntan Indonesia .ID.
            </p>
        </div>

        <div class="testimonials-vibrant-grid">
            @foreach($testimonials as $t)
                <div class="vibrant-testi-card">
                    <div class="testi-card-top">
                        <div class="stars-gold">
                            @for($i = 0; $i < $t['stars']; $i++)
                                ★
                            @endfor
                        </div>
                        <span class="testi-service-chip">{{ $t['service'] }}</span>
                    </div>

                    <p class="testi-text-quote">“{{ $t['quote'] }}”</p>

                    <div class="testi-user-footer">
                        <div class="user-avatar-initial">
                            {{ substr($t['name'], 0, 1) }}
                        </div>
                        <div class="user-meta">
                            <strong class="user-name">{{ $t['name'] }}</strong>
                            <span class="user-role">{{ $t['role'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 11. FAQ ACCORDION WITH LIVE SEARCH -->
<!-- ========================================================================= -->
<section id="faq" class="faq-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label label-gold">BANTUAN &amp; JAWABAN CEPAT</span>
            <h2 class="section-title">Pertanyaan yang <span class="text-gradient">Sering Diajukan (FAQ)</span></h2>
            <p class="section-desc">
                Cari jawaban cepat mengenai legalitas Kemenkeu, pendampingan SP2DK, atau mekanisme kerja sama jarak jauh (remote).
            </p>
        </div>

        <div class="faq-vibrant-wrapper">
            <div class="faq-search-box">
                <span class="faq-search-icon">🔍</span>
                <input type="text" id="faqSearchInput" class="faq-search-input-field" placeholder="Ketik kata kunci... (misal: 'izin', 'remote', 'SP2DK', 'waktu')" oninput="filterFaq(this.value)">
            </div>

            <div class="faq-accordion-list" id="faqList">
                @foreach($faqs as $index => $f)
                    <div class="faq-accordion-item {{ $index === 0 ? 'is-open' : '' }}" data-question="{{ strtolower($f['q']) }}" data-answer="{{ strtolower($f['a']) }}">
                        <button type="button" class="faq-accordion-trigger" onclick="toggleFaq(this)">
                            <span class="faq-q-text">{{ $f['q'] }}</span>
                            <span class="faq-icon-circle">+</span>
                        </button>
                        <div class="faq-accordion-panel" style="{{ $index === 0 ? 'max-height: 400px;' : '' }}">
                            <p>{{ $f['a'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 12. LOKASI BATAM & JANGKAUAN REMOTE DIGITAL -->
<!-- ========================================================================= -->
<section id="lokasi" class="location-vibrant-section">
    <div class="container">
        <div class="location-vibrant-grid">
            <div class="location-content">
                <span class="section-label label-blue">KANTOR &amp; JANGKAUAN</span>
                <h2 class="section-title">Pusat di Batam, <span class="text-gradient-blue">Layanan Seluruh Indonesia</span></h2>
                <p class="location-text">
                    Kantor operasional kami berkedudukan di kawasan pusat bisnis Batam Center, siap melayani konsultasi langsung. Untuk klien di luar kota, seluruh penugasan dilakukan secara digital via cloud accounting dengan standar enkripsi data ketat.
                </p>

                <div class="location-points">
                    <div class="loc-point">
                        <span class="point-icon">📍</span>
                        <div>
                            <b>Alamat Kantor:</b>
                            <p>{{ $profile['contact']['address'] }}</p>
                        </div>
                    </div>
                    <div class="loc-point">
                        <span class="point-icon">🕒</span>
                        <div>
                            <b>Jam Operasional:</b>
                            <p>{{ $profile['contact']['hours'] }}</p>
                        </div>
                    </div>
                    <div class="loc-point">
                        <span class="point-icon">🌐</span>
                        <div>
                            <b>Jangkauan Layanan:</b>
                            <p>{{ $profile['contact']['coverage'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="location-map-wrapper">
                <div class="map-card-frame">
                    <iframe 
                        title="Peta Lokasi Kantor Akuntan Indonesia Batam"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.057774169724!2d104.04870027581177!3d1.127814998860956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da9779df52cf91%3A0xe9f00a3821034c44!2sBatam%20Center%2C%20Teluk%20Tering%2C%20Batam%20City%2C%20Riau%20Islands!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" 
                        width="100%" 
                        height="380" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 13. QUICK CONSULTATION FORM (WITH 3D MASCOT WELCOME) -->
<!-- ========================================================================= -->
<section id="kontak" class="contact-vibrant-section">
    <div class="container">
        <div class="contact-card-vibrant">
            <div class="section-header text-center">
                <span class="section-label label-ruby">MULAI HARI INI</span>
                <h2 class="section-title">Konsultasikan Bisnis Anda <span class="text-gradient">Secara Sat-Set</span></h2>
                <p class="section-desc">
                    Isi formulir singkat berikut dan tim kami akan segera menyambungkan sesi konsultasi langsung ke WhatsApp Anda.
                </p>
            </div>

            <!-- 3D Mascot Interactive Consultation Banner -->
            <div class="contact-mascot-showcase">
                <div class="mascot-showcase-visual">
                    <img src="{{ asset('images/mascot-standing.png') }}" alt="Mascot Akuntan Indonesia" class="mascot-showcase-img">
                    <span class="mascot-badge-pill">Partner 3D Si Akuntan</span>
                </div>
                <div class="mascot-showcase-details">
                    <div class="showcase-tag">✨ KONSULTASI AWAL BEBAS BIAYA &amp; SAT-SET</div>
                    <h3 class="showcase-title">Siap Menata Laporan Keuangan &amp; Kepatuhan Pajak Bisnis Anda!</h3>
                    <p class="showcase-desc">
                        Didukung langsung oleh Tim Akuntan Beregister Negara (Ak., CA) dan Kuasa Hukum Pengadilan Pajak RI di Batam. Respon cepat langsung terhubung ke WhatsApp resmi kami.
                    </p>
                    <div class="showcase-points">
                        <span class="point-chip"><i class="chk-icon">✓</i> 100% Kerahasiaan Terjamin</span>
                        <span class="point-chip"><i class="chk-icon">✓</i> Tanpa Ribet &amp; Solusi Presisi</span>
                        <span class="point-chip"><i class="chk-icon">✓</i> DJP Coretax System Ready</span>
                    </div>
                </div>
            </div>

            <form id="consultationForm" onsubmit="handleConsultationSubmit(event)">
                @csrf
                <div class="form-grid-2">
                    <div class="form-field">
                        <label for="inputNama">Nama Lengkap / PIC <span class="req">*</span></label>
                        <input type="text" id="inputNama" name="nama" class="vibrant-input" placeholder="Contoh: Hendra Kusuma" required>
                    </div>
                    <div class="form-field">
                        <label for="inputTelepon">Nomor WhatsApp Aktif <span class="req">*</span></label>
                        <input type="tel" id="inputTelepon" name="telepon" class="vibrant-input" placeholder="Contoh: 081234567890" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-field">
                        <label for="inputBisnis">Nama Usaha / Bidang Bisnis</label>
                        <input type="text" id="inputBisnis" name="bisnis" class="vibrant-input" placeholder="Contoh: F&amp;B / Retail / Startup / PT Niaga Batam">
                    </div>
                    <div class="form-field">
                        <label for="selectKebutuhan">Kebutuhan Layanan <span class="req">*</span></label>
                        <select id="selectKebutuhan" name="kebutuhan" class="vibrant-input" required>
                            <option value="">-- Pilih Kebutuhan Layanan --</option>
                            <option value="Pembukuan & Laporan SAK">Pembukuan &amp; Kompilasi Laporan SAK</option>
                            <option value="Perpajakan & Lapor SPT">Perpajakan &amp; Lapor SPT Rutin</option>
                            <option value="Pendampingan SP2DK & Sengketa Pajak">Pendampingan SP2DK &amp; Sengketa Pajak</option>
                            <option value="Kuasa Hukum Pengadilan Pajak">Kuasa Hukum Pengadilan Pajak RI</option>
                            <option value="Akuntansi Manajemen & Strategi">Akuntansi Manajemen &amp; Strategi Finansial</option>
                            <option value="Setup Sistem Cloud Accounting">Setup Sistem Cloud Accounting</option>
                            <option value="Penyusunan GCG / AUP">Penyusunan GCG / AUP Khusus</option>
                            <option value="Paket Scale-Up Bisnis">Paket Scale-Up Bisnis</option>
                            <option value="Lainnya">Lainnya / Diskusi Umum</option>
                        </select>
                    </div>
                </div>

                <div class="form-field">
                    <label for="inputPesan">Pesan / Kendala Keuangan yang Dihadapi</label>
                    <textarea id="inputPesan" name="pesan" rows="3" class="vibrant-input" placeholder="Ceritakan singkat kondisi atau pertanyaan bisnis Anda..."></textarea>
                </div>

                <div id="formAlertBox" class="form-alert-box" style="display:none;"></div>

                <button type="submit" id="formSubmitBtn" class="btn-primary-vibrant full-width">
                    <span>Kirim &amp; Hubungkan ke WhatsApp Resmi</span>
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts_extra')
<script>
    // 10 Services Category Filtering
    function filterServices(category, btn) {
        const tabs = document.querySelectorAll('.filter-tab-btn');
        tabs.forEach(t => t.classList.remove('is-active'));
        btn.classList.add('is-active');

        const cards = document.querySelectorAll('#servicesGrid .bento-card');
        cards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            if (category === 'all' || cardCat === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // FAQ Accordion Toggle
    function toggleFaq(button) {
        const item = button.parentElement;
        const panel = item.querySelector('.faq-accordion-panel');
        const isOpen = item.classList.contains('is-open');

        // Close others
        document.querySelectorAll('.faq-accordion-item').forEach(other => {
            if (other !== item) {
                other.classList.remove('is-open');
                const otherPanel = other.querySelector('.faq-accordion-panel');
                if (otherPanel) otherPanel.style.maxHeight = null;
            }
        });

        if (isOpen) {
            item.classList.remove('is-open');
            panel.style.maxHeight = null;
        } else {
            item.classList.add('is-open');
            panel.style.maxHeight = panel.scrollHeight + 30 + 'px';
        }
    }

    // FAQ Live Search
    function filterFaq(query) {
        const q = query.toLowerCase().trim();
        const items = document.querySelectorAll('#faqList .faq-accordion-item');

        items.forEach(item => {
            const question = item.getAttribute('data-question') || '';
            const answer = item.getAttribute('data-answer') || '';
            if (question.includes(q) || answer.includes(q)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Quick Consultation AJAX Form
    async function handleConsultationSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('consultationForm');
        const submitBtn = document.getElementById('formSubmitBtn');
        const alertBox = document.getElementById('formAlertBox');

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Menghubungkan...</span>';
        alertBox.style.display = 'none';

        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('api.consultation') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok && data.status === 'success') {
                alertBox.className = 'form-alert-box is-success';
                alertBox.innerText = data.message;
                alertBox.style.display = 'block';
                form.reset();

                if (data.redirect_url) {
                    setTimeout(() => {
                        window.open(data.redirect_url, '_blank');
                    }, 800);
                }
            } else {
                alertBox.className = 'form-alert-box is-error';
                alertBox.innerText = data.message || 'Mohon periksa kembali isian formulir Anda.';
                alertBox.style.display = 'block';
            }
        } catch (err) {
            alertBox.className = 'form-alert-box is-error';
            alertBox.innerText = 'Terjadi kendala jaringan. Silakan hubungi kami langsung via WhatsApp.';
            alertBox.style.display = 'block';
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Kirim & Hubungkan ke WhatsApp Resmi</span> <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>';
        }
    }
</script>
@endsection
