@extends('layouts.app')

@section('title', $article['title'] . ' | Akuntan Indonesia .ID')
@section('meta_description', $article['excerpt'])

@section('content')
<div class="article-detail-page">
    <!-- Ambient Animated Mesh Gradient -->
    <div class="mesh-orb orb-ruby"></div>
    <div class="mesh-orb orb-blue"></div>

    <div class="container page-container">
        <!-- Breadcrumbs Navigation -->
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <ol class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li class="separator">/</li>
                <li><a href="{{ route('article.index') }}">Edukasi Regulasi</a></li>
                <li class="separator">/</li>
                <li class="active-crumb" aria-current="page">{{ Str::limit($article['title'], 45) }}</li>
            </ol>
        </nav>

        <div class="article-layout-grid">
            <!-- Main Content Area -->
            <main class="article-main-column">
                <!-- Article Header Meta -->
                <header class="article-header">
                    <div class="header-tag-row">
                        <a href="{{ route('article.index', ['kategori' => $article['category']]) }}" class="article-category-badge">
                            {{ $article['category'] }}
                        </a>
                        <span class="article-reading-time">⏱ {{ $article['read_time'] }}</span>
                        <span class="article-pub-date">📅 {{ $article['date'] }}</span>
                    </div>

                    <h1 class="article-main-title">
                        {{ $article['title'] }}
                    </h1>

                    <p class="article-lead-excerpt">
                        {{ $article['excerpt'] }}
                    </p>

                    <!-- Author Info Header Row -->
                    <div class="article-author-header">
                        <div class="author-avatar-badge">⚖️</div>
                        <div class="author-meta-info">
                            <span class="author-name">{{ $article['author'] }}</span>
                            <span class="author-role">{{ $article['author_role'] ?? 'Akuntan & Konsultan Perpajakan Resmi' }}</span>
                        </div>
                    </div>
                </header>

                <!-- Key Highlights Callout -->
                @if(!empty($article['highlights']))
                    <div class="article-highlights-box">
                        <div class="highlights-title">
                            <span>📌</span>
                            <strong>Ringkasan Poin Kunci Wawasan:</strong>
                        </div>
                        <ul class="highlights-list">
                            @foreach($article['highlights'] as $hl)
                                <li>
                                    <span class="hl-chk">✓</span>
                                    <span>{{ $hl }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Article Rich Body HTML Content -->
                <div class="article-body-content">
                    {!! $article['content'] !!}
                </div>

                <!-- Article Tags & Share Row -->
                <footer class="article-footer-meta">
                    @if(!empty($article['tags']))
                        <div class="article-tags-wrap">
                            <span class="tags-label">Topik Terkait:</span>
                            <div class="tags-chips">
                                @foreach($article['tags'] as $tag)
                                    <span class="tag-chip">#{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Social Share Action -->
                    <div class="article-share-bar">
                        <span class="share-title">Bagikan Wawasan Ini:</span>
                        <div class="share-buttons-group">
                            <!-- WhatsApp Share -->
                            <a 
                                href="https://wa.me/?text={{ urlencode($article['title'] . ' - Baca selengkapnya di Akuntan Indonesia .ID: ' . url()->current()) }}" 
                                target="_blank" 
                                class="share-btn share-wa" 
                                title="Bagikan ke WhatsApp"
                            >
                                <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                                <span>WhatsApp</span>
                            </a>

                            <!-- Copy Link -->
                            <button type="button" class="share-btn share-copy" onclick="copyArticleUrl(this)" title="Salin tautan artikel">
                                <span>🔗</span>
                                <span>Salin Tautan</span>
                            </button>
                        </div>
                    </div>
                </footer>

                <!-- Author Bio Box -->
                <div class="article-author-bio-card">
                    <div class="bio-avatar-frame">
                        <img src="{{ asset('images/owner-hendra-setiyawan.png') }}" alt="{{ $article['author'] }}" class="bio-img">
                    </div>
                    <div class="bio-details">
                        <span class="bio-label">TENTANG PENULIS &amp; TIM AHLI</span>
                        <h4 class="bio-name">{{ $article['author'] }}</h4>
                        <p class="bio-text">
                            Praktisi akuntansi profesional dan Kuasa Hukum Resmi Pengadilan Pajak Republik Indonesia berizin resmi Kementerian Keuangan RI. Berpengalaman luas dalam restrukturisasi pembukuan, pendampingan SP2DK, tax planning, dan mitigasi sengketa perpajakan korporasi.
                        </p>
                    </div>
                </div>

                <!-- Back to Articles Index Button -->
                <div class="back-action-wrap">
                    <a href="{{ route('article.index') }}" class="btn-back-link">
                        <span aria-hidden="true">←</span>
                        <span>Kembali ke Semua Edukasi Regulasi</span>
                    </a>
                </div>
            </main>

            <!-- Sidebar Column -->
            <aside class="article-sidebar-column">
                <!-- Sticky Topic Consultation Card -->
                <div class="sidebar-sticky-card">
                    <div class="sidebar-cta-box">
                        <div class="cta-glow-orb"></div>
                        <span class="sidebar-badge">DISKUSI RESMI</span>
                        <h3 class="sidebar-cta-title">Hadapi Masalah Terkait Topik Ini?</h3>
                        <p class="sidebar-cta-desc">
                            Jangan biarkan kebingungan regulasi menghambat akselerasi bisnis Anda. Konsultasikan langsung bersama tim akuntan beregister dan kuasa hukum pajak kami via WhatsApp.
                        </p>

                        <div class="sidebar-benefits-list">
                            <div class="sidebar-benefit-item">
                                <span class="chk-icon">✓</span>
                                <span>Respons Cepat via WhatsApp</span>
                            </div>
                            <div class="sidebar-benefit-item">
                                <span class="chk-icon">✓</span>
                                <span>Solusi Yuridis Berdasar Hukum</span>
                            </div>
                            <div class="sidebar-benefit-item">
                                <span class="chk-icon">✓</span>
                                <span>Kerahasiaan Data Terjamin (NDA)</span>
                            </div>
                        </div>

                        <a 
                            href="https://wa.me/{{ env('WA_NUMBER', '6281945077770') }}?text={{ urlencode('Halo Akuntan.ID, saya membaca artikel \"' . $article['title'] . '\" di website dan ingin konsultasi terkait kondisi bisnis saya.') }}" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="btn-sidebar-wa"
                        >
                            <svg class="icon-wa" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.09-.177.188-.076.362.101.174.449.741.963 1.2.662.59 1.221.773 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564.289.13.332.203c.043.072.043.419-.101.824z"/></svg>
                            <span>Konsultasikan Kasus Ini</span>
                        </a>
                    </div>

                    <!-- Quick Contact Sidebar Card -->
                    <div class="sidebar-contact-box">
                        <h4 class="sidebar-box-heading">Kantor &amp; Hotline Resmi</h4>
                        <div class="sidebar-info-row">
                            <span>📞</span>
                            <span>{{ $profile['contact']['phone'] }}</span>
                        </div>
                        <div class="sidebar-info-row">
                            <span>✉️</span>
                            <span>{{ $profile['contact']['email'] }}</span>
                        </div>
                        <div class="sidebar-info-row">
                            <span>📍</span>
                            <span>{{ $profile['contact']['address'] }}</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Related Articles Section -->
        @if(count($relatedArticles) > 0)
            <section class="related-articles-section">
                <div class="section-header">
                    <span class="section-label label-ruby">REKOMENDASI WAWASAN</span>
                    <h2 class="section-title">Edukasi Regulasi Lainnya</h2>
                    <p class="section-desc">Perluas pengetahuan Anda seputar tata kelola keuangan dan kepatuhan hukum.</p>
                </div>

                <div class="articles-vibrant-grid">
                    @foreach($relatedArticles as $rel)
                        <article class="vibrant-article-card">
                            <div class="art-tag-row">
                                <span class="art-badge">{{ $rel['category'] }}</span>
                                <span class="art-time">⏱ {{ $rel['read_time'] }}</span>
                            </div>
                            <h3 class="art-heading">
                                <a href="{{ route('article.detail', $rel['slug']) }}">
                                    {{ $rel['title'] }}
                                </a>
                            </h3>
                            <p class="art-summary">{{ $rel['excerpt'] }}</p>
                            <div class="art-bottom">
                                <span class="art-date">{{ $rel['date'] }}</span>
                                <a href="{{ route('article.detail', $rel['slug']) }}" class="art-action">
                                    <span>Baca Artikel</span>
                                    <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</div>

<!-- Copy URL Script -->
<script>
    function copyArticleUrl(btn) {
        navigator.clipboard.writeText(window.location.href).then(function() {
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span>✓</span><span>Tersalin!</span>';
            btn.classList.add('copied');
            setTimeout(function() {
                btn.innerHTML = originalText;
                btn.classList.remove('copied');
            }, 2000);
        }).catch(function() {
            alert('Tautan artikel: ' + window.location.href);
        });
    }
</script>
@endsection
