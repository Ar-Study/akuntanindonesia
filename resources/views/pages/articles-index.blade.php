@extends('layouts.app')

@section('title', 'Edukasi Regulasi & Wawasan Pajak Bisnis | Akuntan Indonesia .ID')
@section('meta_description', 'Pusat wawasan perpajakan nasional, panduan Coretax DJP, tips pembukuan standar SAK, dan strategi kepatuhan hukum bisnis dari Akuntan Indonesia .ID.')

@section('content')
<div class="articles-index-page">
    <!-- Ambient Animated Mesh Gradient -->
    <div class="mesh-orb orb-ruby"></div>
    <div class="mesh-orb orb-blue"></div>

    <div class="container page-container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <ol class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li class="separator">/</li>
                <li aria-current="page">Edukasi Regulasi</li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="page-header text-center">
            <span class="section-label label-ruby">PUSAT LITERASI &amp; REGULASI</span>
            <h1 class="page-headline">
                Wawasan Finansial, Coretax &amp; <br>
                <span class="text-gradient">Kepatuhan Perpajakan Bisnis</span>
            </h1>
            <p class="page-subline">
                Pelajari perkembangan regulasi perpajakan nasional, standar akuntansi SAK, dan panduan mitigasi risiko finansial langsung dari praktisi akuntan dan kuasa hukum pengadilan pajak berizin resmi.
            </p>
        </div>

        <!-- Search & Category Filters -->
        <div class="articles-filter-card">
            <!-- Search Form -->
            <form action="{{ route('article.index') }}" method="GET" class="articles-search-form">
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <div class="search-input-wrap">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ request('q', '') }}" 
                        placeholder="Cari topik wawasan (misal: Coretax, SP2DK, SAK EMKM, PPh Final)..." 
                        class="search-input"
                    >
                    @if(request('q'))
                        <a href="{{ route('article.index', ['kategori' => request('kategori')]) }}" class="search-clear" title="Hapus pencarian">✕</a>
                    @endif
                    <button type="submit" class="search-submit-btn">Cari</button>
                </div>
            </form>

            <!-- Category Pills -->
            <div class="category-pills-row">
                <a 
                    href="{{ route('article.index', ['q' => request('q')]) }}" 
                    class="category-pill {{ !request('kategori') || request('kategori') === 'all' ? 'active' : '' }}"
                >
                    Semua Topik ({{ count($allArticles) }})
                </a>
                @foreach($categories as $cat)
                    <a 
                        href="{{ route('article.index', ['kategori' => $cat, 'q' => request('q')]) }}" 
                        class="category-pill {{ request('kategori') === $cat ? 'active' : '' }}"
                    >
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Active Filter Indicator -->
        @if(request('kategori') || request('q'))
            <div class="filter-status-row">
                <span>Menampilkan hasil filter:</span>
                @if(request('kategori'))
                    <span class="filter-chip">Kategori: <strong>{{ request('kategori') }}</strong></span>
                @endif
                @if(request('q'))
                    <span class="filter-chip">Pencarian: <strong>"{{ request('q') }}"</strong></span>
                @endif
                <a href="{{ route('article.index') }}" class="reset-filter-link">Reset Semua Filter ↺</a>
            </div>
        @endif

        <!-- Articles Grid -->
        @if(count($articles) > 0)
            <div class="articles-all-grid">
                @foreach($articles as $art)
                    <article class="vibrant-article-card all-grid-card">
                        <div class="art-tag-row">
                            <a href="{{ route('article.index', ['kategori' => $art['category']]) }}" class="art-badge" title="Filter berdasarkan {{ $art['category'] }}">
                                {{ $art['category'] }}
                            </a>
                            <span class="art-time">⏱ {{ $art['read_time'] }}</span>
                        </div>

                        <h2 class="art-heading">
                            <a href="{{ route('article.detail', $art['slug']) }}">
                                {{ $art['title'] }}
                            </a>
                        </h2>

                        <p class="art-summary">{{ $art['excerpt'] }}</p>

                        <!-- Highlights Quick Bullets -->
                        @if(!empty($art['highlights']))
                            <div class="art-quick-points">
                                @foreach(array_slice($art['highlights'], 0, 2) as $hl)
                                    <div class="quick-point-item">
                                        <span class="chk-dot">✓</span>
                                        <span>{{ $hl }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="art-bottom">
                            <div class="art-author-info">
                                <span class="art-author-avatar">✍️</span>
                                <div>
                                    <span class="art-author-name">{{ $art['author'] }}</span>
                                    <span class="art-date">{{ $art['date'] }}</span>
                                </div>
                            </div>
                            <a href="{{ route('article.detail', $art['slug']) }}" class="art-action-btn">
                                <span>Baca Selengkapnya</span>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state-card text-center">
                <div class="empty-icon">🔍</div>
                <h3>Tidak Ada Artikel Ditemukan</h3>
                <p>Kata kunci atau kategori yang Anda pilih tidak cocok dengan artikel manapun saat ini.</p>
                <a href="{{ route('article.index') }}" class="btn-primary-vibrant btn-reset-search">
                    <span>Lihat Semua Artikel</span>
                </a>
            </div>
        @endif

        <!-- Consultation CTA Card at bottom -->
        <div class="article-archive-cta-card">
            <div class="cta-inner">
                <div>
                    <span class="section-label label-gold">KONSULTASI KHUSUS</span>
                    <h3 class="cta-card-title">Punya Pertanyaan Spesifik Terkait Masalah Finansial &amp; Pajak Bisnis Anda?</h3>
                    <p class="cta-card-desc">
                        Diskusikan langsung bersama tim Akuntan Beregister Negara dan Kuasa Hukum Resmi Pengadilan Pajak kami. Solusi jelas, transparan, dan terarah tanpa biaya siluman.
                    </p>
                </div>
                <div class="cta-action-area">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya membaca wawasan di portal edukasi regulasi dan ingin konsultasi bisnis saya.') }}" target="_blank" rel="noopener noreferrer" class="btn-cta-gold">
                        <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                        <span>Konsultasi via WhatsApp</span>
                    </a>
                    <a href="{{ route('home') }}#kontak" class="btn-secondary-glow">
                        <span>Formulir Janji Temu</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
