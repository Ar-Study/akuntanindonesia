@extends('layouts.app')

@section('title', 'Akuntan Indonesia .ID | Next-Gen Finance & Tax Partner (KJA Hendra Setiyawan)')
@section('meta_description', 'AkuntanIndonesia.id - Kantor Jasa Akuntansi & Konsultan Pajak Resmi. Pembukuan sat-set, laporan keuangan SAK, lapor SPT, tax planning, dan Kuasa Hukum Pengadilan Pajak.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. HERO SECTION (VIBRANT NEXT-GEN FINANCE THEME) -->
<!-- ========================================================================= -->
<section id="hero" class="hero-section">
    <!-- Ambient Animated Mesh Gradient Orbs -->
    <div class="mesh-orb orb-ruby"></div>
    <div class="mesh-orb orb-amber"></div>
    <div class="mesh-orb orb-cyan"></div>
    <div class="mesh-grid-pattern"></div>

    <div class="container hero-inner">
        <div class="hero-content">
            <div class="hero-tag-pill">
                <span class="pulse-dot"></span>
                <span class="tag-bold">AKUNTAN INDONESIA .ID</span>
                <span class="tag-sep">•</span>
                <span>Next-Gen Finance &amp; Tax Partner</span>
            </div>

            <h1 class="hero-headline">
                Financial Solved, <span class="headline-highlight">No Stress.</span><br>
                Fokus <span class="text-gradient">Scale-Up Bisnis</span> Anda.
            </h1>

            <p class="hero-subline">
                Satu solusi tepat untuk seluruh masalah keuangan &amp; perpajakan bisnis Anda. Kami membantu <strong>merapikan pembukuan</strong>, <strong>menata kepatuhan pajak</strong>, dan menyajikan <strong>laporan keuangan transparan</strong> agar bisnis Anda melesat tanpa hambatan regulasi.
            </p>

            <div class="hero-cta-group">
                <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan Indonesia, saya ingin konsultasi sat-set urusan pembukuan dan perpajakan bisnis saya.') }}" target="_blank" class="btn-primary-vibrant">
                    <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                    <span>Konsultasi Sat-Set via WA</span>
                </a>
                <a href="#kalkulator" class="btn-secondary-glow">
                    <span class="calc-icon-spark">🧮</span>
                    <span>Hitung Pajak UMKM 0.5%</span>
                </a>
            </div>

            <!-- Value Props List from Document -->
            <div class="hero-prop-chips">
                <span class="prop-chip"><i class="chk">✓</i> Anti-Ribet &amp; Efisien</span>
                <span class="prop-chip"><i class="chk">✓</i> Coretax DJP Ready</span>
                <span class="prop-chip"><i class="chk">✓</i> Kuasa Hukum Litigasi Pajak</span>
            </div>
        </div>

        <!-- Hero Visual: Executive Owner with Dynamic Multi-Badge Cards -->
        <div class="hero-visual-wrapper">
            <div class="owner-visual-stage">
                <div class="owner-glow-ring"></div>
                <div class="owner-photo-frame">
                    <img src="{{ asset('images/owner-hendra-setiyawan.png') }}" alt="Hendra Setiyawan, Ak., CA" class="owner-hero-img">
                </div>

                <!-- Floating Interactive Badge 1 (Ruby) -->
                <div class="visual-badge badge-ruby">
                    <div class="badge-icon-box">⚖️</div>
                    <div>
                        <b>Kuasa Hukum Pajak</b>
                        <small>Pengadilan Pajak RI</small>
                    </div>
                </div>

                <!-- Floating Interactive Badge 2 (Gold) -->
                <div class="visual-badge badge-gold">
                    <div class="badge-icon-box">🏛️</div>
                    <div>
                        <b>Akuntan Beregister</b>
                        <small>Kemenkeu RI &amp; IAI</small>
                    </div>
                </div>

                <!-- Floating Interactive Badge 3 (Emerald) -->
                <div class="visual-badge badge-emerald">
                    <div class="badge-icon-box">🛡️</div>
                    <div>
                        <b>Rp 0 Denda Pajak</b>
                        <small>99.8% Laporan Tepat Waktu</small>
                    </div>
                </div>

                <!-- Owner Identity Tag -->
                <div class="owner-stage-footer">
                    <div>
                        <b class="owner-name-title">Hendra Setiyawan, Ak., CA</b>
                        <span class="owner-designation">Managing Partner • Akuntan Indonesia .ID</span>
                    </div>
                    <span class="live-status-badge">● Online Konsultasi</span>
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
<!-- 2. ACCREDITATIONS & LOGOS -->
<!-- ========================================================================= -->
<section class="accreditation-ribbon">
    <div class="container">
        <div class="accred-inner">
            <span class="accred-lead">LEGALITAS &amp; AKREDITASI RESMI:</span>
            <div class="accred-badges-row">
                <div class="accred-badge-item">
                    <img src="{{ asset('images/image2.jpeg') }}" alt="IAI" class="accred-img">
                    <span>Ikatan Akuntan Indonesia (IAI)</span>
                </div>
                <div class="accred-badge-item">
                    <img src="{{ asset('images/image3.jpeg') }}" alt="Chartered Accountants Worldwide" class="accred-img">
                    <span>Chartered Accountant (CA)</span>
                </div>
                <div class="accred-badge-item">
                    <img src="{{ asset('images/image5.jpeg') }}" alt="Kementerian Keuangan RI" class="accred-img">
                    <span>Kementerian Keuangan RI</span>
                </div>
                <div class="accred-badge-item text-badge">
                    <span class="em-icon">⚖️</span>
                    <span>Kuasa Hukum Pengadilan Pajak RI</span>
                </div>
                <div class="accred-badge-item text-badge">
                    <span class="em-icon">💻</span>
                    <span>DJP Coretax System Ready</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 3. BENTO GRID LAYANAN UNGGULAN (COLORFUL & HIGH-IMPACT) -->
<!-- ========================================================================= -->
<section id="layanan" class="services-bento-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">EKOSISTEM LAYANAN TERPADU</span>
            <h2 class="section-title">Solusi Akuntansi &amp; Pajak <span class="text-gradient">End-to-End Tanpa Pusing</span></h2>
            <p class="section-desc">
                Dirancang khusus untuk membantu business owner, pelaku UMKM, dan perusahaan agar proses rumit terpangkas lewat alur kerja digital yang presisi.
            </p>
        </div>

        <div class="bento-services-grid">
            @foreach($services as $index => $srv)
                <div class="bento-card bento-theme-{{ $srv['color'] ?? 'ruby' }} {{ $index === 0 ? 'bento-span-2' : '' }}" id="{{ $srv['id'] }}">
                    <div class="bento-header">
                        <span class="bento-badge">{{ $srv['badge'] }}</span>
                        <div class="bento-icon">
                            @if($srv['icon'] === 'ledger')
                                📊
                            @elseif($srv['icon'] === 'tax')
                                📑
                            @elseif($srv['icon'] === 'law')
                                ⚖️
                            @elseif($srv['icon'] === 'strategy')
                                📈
                            @elseif($srv['icon'] === 'system')
                                💻
                            @else
                                🛡️
                            @endif
                        </div>
                    </div>

                    <h3 class="bento-title">{{ $srv['title'] }}</h3>
                    <p class="bento-desc">{{ $srv['desc'] }}</p>

                    <div class="bento-checklist">
                        @foreach($srv['points'] as $pt)
                            <div class="bento-check-item">
                                <span class="chk-bubble">✓</span>
                                <span>{{ $pt }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="bento-footer">
                        <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan Indonesia, saya ingin konsultasi mengenai layanan: ' . $srv['title']) }}" target="_blank" class="bento-action-link">
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
<!-- 4. VISI, MISI & CORE VALUES DARI DOKUMEN RESMI (COLORFUL 4 PILLARS) -->
<!-- ========================================================================= -->
<section id="misi-nilai" class="mission-values-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">OUR SPIRIT &amp; CORE VALUES</span>
            <h2 class="section-title">Nilai-Nilai Utama <span class="text-gradient">Akuntan Indonesia .ID</span></h2>
            <p class="section-desc">
                Kami hadir bukan sekadar untuk mencatat angka atau menghitung pajak, melainkan sebagai mitra strategis dengan komitmen integritas tinggi.
            </p>
        </div>

        <!-- 4 Pillars of Mission -->
        <div class="mission-pillars-grid">
            <div class="pillar-card pillar-ruby">
                <div class="pillar-number">01</div>
                <h3 class="pillar-title">Financial Solved, No Stress</h3>
                <p class="pillar-desc">
                    Memberikan layanan akuntansi dan perpajakan end-to-end yang sat-set, patuh aturan, dan bikin bisnis klien jalan tanpa pusing.
                </p>
            </div>

            <div class="pillar-card pillar-gold">
                <div class="pillar-number">02</div>
                <h3 class="pillar-title">Work Smarter &amp; Efficient</h3>
                <p class="pillar-desc">
                    Memangkas proses rumit lewat solusi digital yang efektif dan efisien biar klien bisa fokus scaling up bisnis mereka.
                </p>
            </div>

            <div class="pillar-card pillar-emerald">
                <div class="pillar-number">03</div>
                <h3 class="pillar-title">Level Up Akuntan Muda</h3>
                <p class="pillar-desc">
                    Buka ruang mentorship yang seru dan inklusif buat mencetak akuntan muda Indonesia yang makin kompeten, cerdas, dan siap bersaing.
                </p>
            </div>

            <div class="pillar-card pillar-cyan">
                <div class="pillar-number">04</div>
                <h3 class="pillar-title">Impact Buat Negara</h3>
                <p class="pillar-desc">
                    Mendorong keterbukaan laporan keuangan dan kepatuhan pajak sebagai wujud kontribusi nyata membangun ekonomi Indonesia yang lebih sehat.
                </p>
            </div>
        </div>

        <!-- Core Values Strip -->
        <div class="core-values-strip">
            <div class="value-item">
                <span class="val-icon">⚡</span>
                <div>
                    <b>High Standard &amp; Agile</b>
                    <p>Kerja serba cepat, presisi, dan selalu up-to-date dengan regulasi DJP terkini.</p>
                </div>
            </div>
            <div class="value-item">
                <span class="val-icon">🔍</span>
                <div>
                    <b>Radical Transparency</b>
                    <p>Jujur, memegang teguh etika profesi, dan menjaga kepercayaan penuh klien.</p>
                </div>
            </div>
            <div class="value-item">
                <span class="val-icon">⏱️</span>
                <div>
                    <b>Efficiency First (Anti-Ribet)</b>
                    <p>Semua masalah keuangan diselesaikan lewat cara cerdas dan hemat waktu.</p>
                </div>
            </div>
            <div class="value-item">
                <span class="val-icon">🌱</span>
                <div>
                    <b>Growth Mindset</b>
                    <p>Terus belajar, membimbing, dan memfasilitasi bisnis berkembang maksimal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 5. INTERACTIVE KALKULATOR PAJAK UMKM 0.5% (VIBRANT & DYNAMIC) -->
<!-- ========================================================================= -->
<section id="kalkulator" class="calculator-vibrant-section">
    <div class="container">
        <div class="calc-glass-card">
            <div class="calc-card-head text-center">
                <span class="section-label vibrant-label">SIMULASI INTERAKTIF</span>
                <h2 class="section-title">Kalkulator Pajak UMKM <span class="text-gradient">PPh Final 0.5% (UU HPP)</span></h2>
                <p class="section-desc">
                    Cek estimasi pajak terutang usaha Anda secara instan. Ketahui fasilitas <strong>bebas pajak omzet s.d. Rp 500 Juta/tahun</strong> bagi Orang Pribadi.
                </p>
            </div>

            <div class="calc-main-grid">
                <!-- Left Input Controls -->
                <div class="calc-controls">
                    <label class="ctrl-group-label">1. Pilih Bentuk Entitas Bisnis:</label>
                    <div class="entity-pills-row">
                        <label class="entity-toggle-box">
                            <input type="radio" name="entity_type" value="op" checked onchange="calculateTax()">
                            <div class="toggle-card">
                                <span class="t-badge green">UU HPP 500 Jt Free</span>
                                <b>Orang Pribadi (OP)</b>
                                <small>Fasilitas bebas pajak omzet 500 Jt</small>
                            </div>
                        </label>
                        <label class="entity-toggle-box">
                            <input type="radio" name="entity_type" value="badan" onchange="calculateTax()">
                            <div class="toggle-card">
                                <span class="t-badge gold">PPh Final 0.5%</span>
                                <b>Badan Usaha (PT/CV)</b>
                                <small>0.5% dari seluruh peredaran bruto</small>
                            </div>
                        </label>
                    </div>

                    <label for="monthlyRevenue" class="ctrl-group-label">2. Masukkan Rata-rata Omzet / Penjualan Kotor per Bulan:</label>
                    <div class="vibrant-input-group">
                        <span class="input-curr-prefix">Rp</span>
                        <input type="number" id="monthlyRevenue" class="vibrant-number-input" value="60000000" min="0" step="5000000" oninput="syncRevenueFromInput(this.value)">
                    </div>

                    <!-- Interactive Glowing Slider -->
                    <div class="vibrant-slider-box">
                        <input type="range" id="revenueSlider" class="glowing-range-slider" min="0" max="400000000" step="5000000" value="60000000" oninput="syncRevenueFromSlider(this.value)">
                        <div class="slider-labels">
                            <span>Rp 0</span>
                            <span>Rp 200 Jt / bulan</span>
                            <span>Rp 400 Jt / bulan</span>
                        </div>
                    </div>

                    <!-- Contextual Explanation Callout -->
                    <div class="calc-info-callout" id="calcRuleExplanation">
                        💡 Fasilitas <strong>UU HPP (PP 55/2022)</strong>: Wajib Pajak Orang Pribadi UMKM mendapat pembebasan pajak atas omzet kumulatif hingga <strong>Rp 500.000.000 per tahun</strong>. PPh 0.5% hanya dikenakan atas omzet yang melebihi 500 juta.
                    </div>
                </div>

                <!-- Right Live Output Card -->
                <div class="calc-display-card">
                    <div class="display-card-header">
                        <span class="live-pill">● SIMULASI REAL-TIME</span>
                        <h4>Hasil Kalkulasi Pajak Terutang</h4>
                    </div>

                    <div class="metric-row">
                        <span class="m-label">Estimasi Omzet Tahunan:</span>
                        <strong class="m-val" id="annualRevenueText">Rp 720.000.000</strong>
                    </div>

                    <div class="metric-row">
                        <span class="m-label">Omzet Bebas Pajak (PTKP UMKM):</span>
                        <span class="m-val text-emerald" id="ptkpText">Rp 500.000.000</span>
                    </div>

                    <div class="metric-row">
                        <span class="m-label">Dasar Pengenaan Pajak (DPP):</span>
                        <span class="m-val" id="taxableRevenueText">Rp 220.000.000</span>
                    </div>

                    <div class="final-tax-display">
                        <span class="tax-caption">ESTIMASI PPH FINAL 0.5% (SETAHUN):</span>
                        <div class="tax-amount-hero" id="taxDueText">Rp 1.100.000</div>
                        <span class="tax-monthly-rate" id="taxDueMonthlySub">(atau sekitar Rp 91.667 / bulan)</span>
                    </div>

                    <div class="calc-action-wrap">
                        <a href="#" id="waCalcShareBtn" target="_blank" class="btn-primary-vibrant full-width">
                            <span>Konsultasikan Hasil Simulasi Ini</span>
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                        </a>
                        <small class="disclaimer-note">*Simulasi mengacu pada ketentuan PP 55 / UU Harmonisasi Peraturan Perpajakan (HPP).</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 6. PAKET HARGA TRANSPARAN (PRICING) -->
<!-- ========================================================================= -->
<section id="paket" class="packages-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">TRANSPARANSI BIAYA</span>
            <h2 class="section-title">Pilihan Paket Layanan <span class="text-gradient">Sesuai Skala Bisnis</span></h2>
            <p class="section-desc">
                Investasi cerdas yang melindungi bisnis dari denda pajak, SP2DK, dan ketidakpastian arus kas.
            </p>
        </div>

        <div class="pricing-cards-grid">
            @foreach($packages as $pkg)
                <div class="pricing-card {{ $pkg['is_popular'] ? 'is-best-value' : '' }}">
                    @if($pkg['is_popular'])
                        <div class="popular-glow-badge">{{ $pkg['badge'] }}</div>
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
<!-- 7. TABEL PERBANDINGAN TRANSPARAN -->
<!-- ========================================================================= -->
<section id="perbandingan" class="comparison-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">KOMPARASI NILAI</span>
            <h2 class="section-title">Mengapa Bermitra dengan <span class="text-gradient">Akuntan Indonesia .ID?</span></h2>
            <p class="section-desc">
                Lihat perbedaan mendasar antara bermitra bersama kami dibanding konsultan konvensional atau mengerjakannya sendiri.
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
                                <small>Next-Gen Finance &amp; Tax Partner</small>
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
                                <span>{{ $cmp['kja'] }}</span>
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
<!-- 8. WAWASAN & BERITA PAJAK TERBARU -->
<!-- ========================================================================= -->
<section id="berita" class="articles-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">EDUKASI REGULASI</span>
            <h2 class="section-title">Wawasan Finansial &amp; <span class="text-gradient">Update Coretax DJP</span></h2>
            <p class="section-desc">
                Pelajari perkembangan regulasi perpajakan nasional dan tips pembukuan agar bisnis senantiasa aman dan patuh.
            </p>
        </div>

        <div class="articles-vibrant-grid">
            @foreach($articles as $art)
                <article class="vibrant-article-card">
                    <div class="art-tag-row">
                        <span class="art-badge">{{ $art['category'] }}</span>
                        <span class="art-time">{{ $art['read_time'] }}</span>
                    </div>
                    <h3 class="art-heading">
                        <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan Indonesia, saya ingin konsultasi mengenai topik artikel: ' . $art['title']) }}" target="_blank">
                            {{ $art['title'] }}
                        </a>
                    </h3>
                    <p class="art-summary">{{ $art['excerpt'] }}</p>
                    <div class="art-bottom">
                        <span class="art-date">{{ $art['date'] }}</span>
                        <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan Indonesia, saya membaca topik ' . $art['title'] . ' dan ingin berdiskusi.') }}" target="_blank" class="art-action">
                            <span>Diskusi Topik</span>
                            <span class="arrow">→</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 9. TESTIMONI & ULASAN KLIEN -->
<!-- ========================================================================= -->
<section id="testimoni" class="testimonials-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">ULASAN KLIEN</span>
            <h2 class="section-title">Cerita Sukses dari <span class="text-gradient">Para Business Owner</span></h2>
            <p class="section-desc">
                Pengalaman nyata para pelaku usaha yang merasakan efisiensi dan ketenangan bermitra dengan Akuntan Indonesia .ID.
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
<!-- 10. FAQ ACCORDION DENGAN LIVE FILTER -->
<!-- ========================================================================= -->
<section id="faq" class="faq-vibrant-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label vibrant-label">FAQ &amp; BANTUAN</span>
            <h2 class="section-title">Pertanyaan yang <span class="text-gradient">Sering Diajukan</span></h2>
            <p class="section-desc">
                Cari jawaban cepat mengenai legalitas, pendampingan SP2DK, atau alur kerja sama remote.
            </p>
        </div>

        <div class="faq-vibrant-wrapper">
            <div class="faq-search-box">
                <span class="faq-search-icon">🔍</span>
                <input type="text" id="faqSearchInput" class="faq-search-input-field" placeholder="Ketik kata kunci pertanyaan... (misal: 'izin', 'remote', 'SP2DK')" oninput="filterFaq(this.value)">
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
<!-- 11. LOKASI & PEMBAYARAN -->
<!-- ========================================================================= -->
<section id="lokasi" class="location-vibrant-section">
    <div class="container">
        <div class="location-vibrant-grid">
            <div class="location-content">
                <span class="section-label vibrant-label">KANTOR &amp; JANGKAUAN</span>
                <h2 class="section-title">Pusat di Batam, <span class="text-gradient">Layanan Seluruh Indonesia</span></h2>
                <p class="location-text">
                    Kantor operasional kami berkedudukan di kawasan pusat bisnis Batam Center, siap melayani konsultasi langsung. Untuk klien di luar kota, seluruh penugasan dilakukan secara online via cloud accounting dengan jaminan keamanan data.
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

                <div class="payment-badges-wrap">
                    <span class="payment-title">Metode Pembayaran Resmi KJA:</span>
                    <div class="pay-chips-group">
                        <span class="pay-chip">BCA Bisnis</span>
                        <span class="pay-chip">Mandiri Virtual Account</span>
                        <span class="pay-chip">BRI</span>
                        <span class="pay-chip">QRIS</span>
                        <span class="pay-chip">Invoice Faktur Pajak Resmi</span>
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
<!-- 12. QUICK CONSULTATION FORM -->
<!-- ========================================================================= -->
<section id="kontak" class="contact-vibrant-section">
    <div class="container">
        <div class="contact-card-vibrant">
            <div class="section-header text-center">
                <span class="section-label vibrant-label">MULAI HARI INI</span>
                <h2 class="section-title">Konsultasikan Bisnis Anda <span class="text-gradient">Secara Sat-Set</span></h2>
                <p class="section-desc">
                    Isi formulir singkat berikut dan tim kami akan segera menyambungkan sesi konsultasi ke WhatsApp resmi Anda.
                </p>
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
                        <input type="text" id="inputBisnis" name="bisnis" class="vibrant-input" placeholder="Contoh: F&amp;B / Toko Online / PT Digital">
                    </div>
                    <div class="form-field">
                        <label for="selectKebutuhan">Kebutuhan Layanan <span class="req">*</span></label>
                        <select id="selectKebutuhan" name="kebutuhan" class="vibrant-input" required>
                            <option value="">-- Pilih Kebutuhan Layanan --</option>
                            <option value="Pembukuan Rutin Bulanan">Pembukuan Rutin Bulanan</option>
                            <option value="Kompilasi Laporan Keuangan SAK">Kompilasi Laporan Keuangan SAK</option>
                            <option value="Lapor SPT Tahunan / Masa Pajak">Lapor SPT Tahunan / Masa Pajak</option>
                            <option value="Pendampingan SP2DK & Sengketa Pajak">Pendampingan SP2DK &amp; Sengketa Pajak</option>
                            <option value="Kuasa Hukum Pengadilan Pajak">Kuasa Hukum Pengadilan Pajak</option>
                            <option value="Setup Sistem Informasi Akuntansi Cloud">Setup Sistem Informasi Akuntansi Cloud</option>
                            <option value="Lainnya">Lainnya / Diskusi Umum</option>
                        </select>
                    </div>
                </div>

                <div class="form-field">
                    <label for="inputPesan">Pesan / Kendala Keuangan yang Dihadapi</label>
                    <textarea id="inputPesan" name="pesan" rows="3" class="vibrant-input" placeholder="Ceritakan singkat kondisi atau pertanyaan Anda..."></textarea>
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
