@extends('layouts.app')

@php
    $artTitle = is_array($article) ? $article['title'] : $article->title;
    $artExcerpt = is_array($article) ? $article['excerpt'] : $article->excerpt;
    $artCat = is_array($article) ? $article['category'] : $article->category_title;
    $artRead = is_array($article) ? $article['read_time'] : $article->read_time;
    $artDate = is_array($article) ? $article['date'] : ($article->date_formatted ?: $article->created_at->isoFormat('D MMMM Y'));
    $artAuthor = is_array($article) ? $article['author'] : $article->author_name;
    $artAuthorRole = is_array($article) ? ($article['author_role'] ?? 'Akuntan & Konsultan Perpajakan Resmi') : $article->author_role_title;
    $artAuthorBio = is_array($article) ? ($article['author_bio'] ?? 'Akuntan berpraktek, Konsultan Pajak terdaftar dan berizin di Kementerian Keuangan Republik Indonesia.') : $article->author_bio_text;
    $artAuthorAvatar = is_array($article) ? ($article['author_avatar'] ?? asset('images/mascot-standing.png')) : $article->author_avatar_url;
    $artContent = is_array($article) ? $article['content'] : $article->content;
    $artHighlights = is_array($article) ? ($article['highlights'] ?? []) : ($article->highlights ?: []);
    $artTags = is_array($article) ? ($article['tags'] ?? []) : ($article->tags ?: []);
@endphp

@section('title', $artTitle . ' | Akuntan Indonesia .ID Batam')
@section('meta_description', $artExcerpt)
@section('og_title', $artTitle . ' — Akuntan Indonesia .ID')
@section('og_description', $artExcerpt)

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
                <li><a href="{{ route('article.index') }}">Artikel</a></li>
                <li class="separator">/</li>
                <li class="active-crumb" aria-current="page">{{ Str::limit($artTitle, 45) }}</li>
            </ol>
        </nav>

        <div class="article-layout-grid">
            <!-- Main Content Area -->
            <main class="article-main-column">
                <!-- Article Header Meta -->
                <header class="article-header">
                    <div class="header-tag-row">
                        <a href="{{ route('article.index', ['kategori' => $artCat]) }}" class="article-category-badge">
                            {{ $artCat }}
                        </a>
                        <span class="article-reading-time">⏱ {{ $artRead }}</span>
                        <span class="article-pub-date">📅 {{ $artDate }}</span>
                    </div>

                    <h1 class="article-main-title">
                        {{ $artTitle }}
                    </h1>

                    <p class="article-lead-excerpt">
                        {{ $artExcerpt }}
                    </p>

                    <!-- Author Info Header Row -->
                    <div class="article-author-header">
                        <div style="width: 44px; height: 44px; border-radius: 50%; overflow: hidden; border: 2px solid #FFFFFF; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background: #FFF; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ $artAuthorAvatar }}" alt="{{ $artAuthor }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-meta-info">
                            <span class="author-name">{{ $artAuthor }}</span>
                            <span class="author-role">{{ $artAuthorRole }}</span>
                        </div>
                    </div>
                </header>

                <!-- Key Highlights Callout -->
                @if(!empty($artHighlights))
                    <div class="article-highlights-box">
                        <div class="highlights-title">
                            <span>📌</span>
                            <strong>Ringkasan Poin Kunci Wawasan:</strong>
                        </div>
                        <ul class="highlights-list">
                            @foreach($artHighlights as $hl)
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
                    {!! $artContent !!}
                </div>

                <!-- Article Tags & Share Row -->
                <footer class="article-footer-meta">
                    @if(!empty($artTags))
                        <div class="article-tags-wrap">
                            <span class="tags-label">Topik Terkait:</span>
                            <div class="tags-chips">
                                @foreach($artTags as $tag)
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
                                href="https://wa.me/?text={{ urlencode($artTitle . ' - Baca selengkapnya di Akuntan Indonesia .ID: ' . url()->current()) }}" 
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

                <!-- Author Bio Box (with Mascot Fallback) -->
                <div class="article-author-bio-card">
                    <div class="bio-avatar-frame">
                        <img src="{{ $artAuthorAvatar }}" alt="{{ $artAuthor }}" class="bio-img">
                    </div>
                    <div class="bio-details">
                        <span class="bio-label">TENTANG PENULIS &amp; TIM AHLI</span>
                        <h4 class="bio-name">{{ $artAuthor }}</h4>
                        <div style="font-size: 0.8rem; color: var(--color-ruby-600); font-weight: 700; margin-bottom: 6px;">{{ $artAuthorRole }}</div>
                        <p class="bio-text">
                            {{ $artAuthorBio }}
                        </p>
                    </div>
                </div>

                <!-- Back to Articles Index Button -->
                <div class="back-action-wrap">
                    <a href="{{ route('article.index') }}" class="btn-back-link">
                        <span aria-hidden="true">←</span>
                        <span>Kembali ke Semua Artikel</span>
                    </a>
                </div>
            </main>

            <!-- Sidebar Column -->
            <aside class="article-sidebar-column">
                <!-- Sticky Topic Consultation Card -->
                <div class="sidebar-sticky-card">
                    <div class="sidebar-cta-box">
                        <div class="cta-glow-orb"></div>
                        <span class="sidebar-badge">KONSULTASI BATAM</span>
                        <h3 class="sidebar-cta-title">Hadapi Masalah Terkait Topik Ini?</h3>
                        <p class="sidebar-cta-desc">
                            Jangan biarkan kebingungan regulasi menghambat akselerasi bisnis Anda. Konsultasikan langsung bersama tim akuntan beregister dan konsultan pajak kami di Batam via WhatsApp.
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
                            href="https://wa.me/{{ $profile['contact']['wa_number'] ?? \App\Models\Setting::get('wa_number', '6281945077770') }}?text={{ urlencode('Halo ' . ($profile['brand_name'] ?? 'Akuntan.ID') . ' Batam, saya membaca artikel \"' . $artTitle . '\" di website dan ingin konsultasi terkait kondisi bisnis saya.') }}" 
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
                        <h4 class="sidebar-box-heading">Kantor &amp; Hotline Batam</h4>
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
                    <span class="section-label label-ruby">REKOMENDASI ARTIKEL</span>
                    <h2 class="section-title">Artikel Finansial &amp; Pajak Lainnya</h2>
                    <p class="section-desc">Perluas pengetahuan Anda seputar tata kelola keuangan dan kepatuhan hukum.</p>
                </div>

                <div class="articles-vibrant-grid">
                    @foreach($relatedArticles as $rel)
                        @php
                            $relSlug = is_array($rel) ? $rel['slug'] : $rel->slug;
                            $relTitle = is_array($rel) ? $rel['title'] : $rel->title;
                            $relCat = is_array($rel) ? $rel['category'] : $rel->category_title;
                            $relRead = is_array($rel) ? $rel['read_time'] : $rel->read_time;
                            $relDate = is_array($rel) ? $rel['date'] : ($rel->date_formatted ?: $rel->created_at->isoFormat('D MMMM Y'));
                            $relExcerpt = is_array($rel) ? $rel['excerpt'] : $rel->excerpt;
                        @endphp
                        <article class="vibrant-article-card">
                            <div class="art-tag-row">
                                <span class="art-badge">{{ $relCat }}</span>
                                <span class="art-time">⏱ {{ $relRead }}</span>
                            </div>
                            <h3 class="art-heading">
                                <a href="{{ route('article.detail', $relSlug) }}">
                                    {{ $relTitle }}
                                </a>
                            </h3>
                            <p class="art-summary">{{ $relExcerpt }}</p>
                            <div class="art-bottom">
                                <span class="art-date">{{ $relDate }}</span>
                                <a href="{{ route('article.detail', $relSlug) }}" class="art-action">
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
