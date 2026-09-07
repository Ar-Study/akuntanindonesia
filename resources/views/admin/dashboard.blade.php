@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb', 'Ringkasan')
@section('page_title', 'Dashboard Backoffice')

@section('styles')
<style>
    /* =========================================================================
       COMPACT MASCOT HERO BANNER
       ========================================================================= */
    .dashboard-mascot-hero {
        background: linear-gradient(135deg, #EFF6FF 0%, #FFF5F7 50%, #F8FAFC 100%);
        border: 1px solid #DBEAFE;
        border-radius: var(--radius-lg);
        padding: 16px 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.04);
        position: relative;
        overflow: hidden;
    }

    .dashboard-mascot-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--admin-ruby) 0%, var(--admin-blue) 50%, var(--admin-cyan) 100%);
    }

    .hero-left-cluster {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .hero-mascot-thumb {
        position: relative;
        width: 58px;
        height: 64px;
        flex-shrink: 0;
        border-radius: 12px;
        background: radial-gradient(circle at 50% 30%, #EFF6FF 0%, #DBEAFE 100%);
        border: 1.5px solid #FFFFFF;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.06);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2px;
        overflow: hidden;
    }

    .hero-mascot-thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center bottom;
    }

    .welcome-headline {
        font-size: 1.15rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        color: var(--admin-navy-950);
        margin-bottom: 2px;
    }

    .welcome-subline {
        font-size: 0.78rem;
        color: var(--admin-navy-600);
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .status-dot-sm {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-weight: 700;
        color: var(--admin-emerald);
        font-size: 0.72rem;
        background: #FFFFFF;
        padding: 1px 7px;
        border-radius: var(--radius-full);
        border: 1px solid var(--admin-emerald-border);
    }

    /* Hero Quick Buttons */
    .hero-quick-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        flex-shrink: 0;
    }

    .btn-hero-action {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #FFFFFF;
        border: 1px solid var(--admin-border);
        color: var(--admin-navy-800);
        font-size: 0.78rem;
        font-weight: 700;
        padding: 7px 12px;
        border-radius: var(--radius-sm);
        text-decoration: none;
        transition: var(--transition);
        white-space: nowrap;
    }

    .btn-hero-action:hover {
        background: var(--admin-blue-light);
        border-color: var(--admin-blue);
        color: var(--admin-blue-hover);
        transform: translateY(-1px);
    }

    .btn-hero-primary {
        background: linear-gradient(135deg, var(--admin-blue) 0%, #1D4ED8 100%);
        border: none;
        color: #FFFFFF;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
    }

    .btn-hero-primary:hover {
        background: linear-gradient(135deg, #1D4ED8 0%, #1E3A8A 100%);
        color: #FFFFFF;
    }

    /* =========================================================================
       METRIC STATS OVERVIEW GRID (COMPACT)
       ========================================================================= */
    .stats-overview-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 20px;
    }

    .stat-box {
        background: #FFFFFF;
        border-radius: var(--radius-md);
        padding: 14px 16px;
        border: 1px solid var(--admin-border);
        box-shadow: 0 1px 4px rgba(15, 23, 42, 0.02);
        display: flex;
        align-items: center;
        gap: 12px;
        transition: var(--transition);
    }

    .stat-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.06);
        border-color: #CBD5E1;
    }

    .stat-box-icon {
        width: 42px;
        height: 42px;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }

    .icon-blue { background: var(--admin-blue-light); }
    .icon-ruby { background: var(--admin-ruby-light); }
    .icon-emerald { background: var(--admin-emerald-light); }
    .icon-gold { background: var(--admin-gold-light); }

    .stat-box-info {
        flex: 1;
        overflow: hidden;
    }

    .stat-box-number {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--admin-navy-950);
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .stat-box-label {
        font-size: 0.74rem;
        font-weight: 700;
        color: var(--admin-navy-600);
        margin-top: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* =========================================================================
       TWO COLUMNS DASHBOARD OVERVIEW
       ========================================================================= */
    .dashboard-two-cols {
        display: grid;
        grid-template-columns: 1.55fr 1fr;
        gap: 18px;
    }

    .client-avatar-circle {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: var(--admin-blue-light);
        border: 1px solid var(--admin-blue-border);
        color: var(--admin-blue);
        font-weight: 800;
        font-size: 0.74rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .btn-wa-action {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        color: #059669;
        background: #ECFDF5;
        border: 1px solid #A7F3D0;
        font-size: 0.74rem;
        font-weight: 700;
        padding: 3px 7px;
        border-radius: var(--radius-sm);
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-wa-action:hover {
        background: #059669;
        color: #FFFFFF;
    }

    .article-item-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 0;
        border-bottom: 1px solid var(--admin-border);
        gap: 10px;
    }

    .article-item-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .article-title-link {
        font-size: 0.82rem;
        font-weight: 700;
        color: var(--admin-navy-950);
        text-decoration: none;
        line-height: 1.3;
        display: block;
    }

    .article-title-link:hover {
        color: var(--admin-blue);
    }

    /* =========================================================================
       RESPONSIVE RULES
       ========================================================================= */
    @media (max-width: 1100px) {
        .dashboard-mascot-hero {
            flex-direction: column;
            align-items: flex-start;
        }

        .hero-quick-actions {
            width: 100%;
        }

        .stats-overview-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-two-cols {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 580px) {
        .stats-overview-grid {
            grid-template-columns: 1fr;
        }

        .hero-quick-actions {
            flex-direction: column;
        }

        .btn-hero-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
    <!-- 1. Compact Mascot Hero Welcome Banner -->
    <div class="dashboard-mascot-hero">
        <div class="hero-left-cluster">
            <div class="hero-mascot-thumb" title="Si Akuntan - Asisten 3D">
                <img src="{{ asset('images/mascot-standing.png') }}" alt="Si Akuntan">
            </div>
            <div>
                <h2 class="welcome-headline">Selamat Datang di Pusat Kendali Akuntan.ID</h2>
                <div class="welcome-subline">
                    <span>Admin: <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong></span>
                    <span>&bull;</span>
                    <span class="status-dot-sm">● Backoffice Online</span>
                </div>
            </div>
        </div>

        <div class="hero-quick-actions">
            <a href="{{ route('admin.articles.create') }}" class="btn-hero-action btn-hero-primary">
                <span>✍️ Tulis Artikel</span>
            </a>
            <a href="{{ route('admin.consultations.index') }}" class="btn-hero-action">
                <span>📥 Cek Leads</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="btn-hero-action">
                <span>➕ Paket Layanan</span>
            </a>
        </div>
    </div>

    <!-- 2. Metric Stat Cards Overview Grid -->
    <div class="stats-overview-grid">
        <!-- Card 1: Articles -->
        <div class="stat-box">
            <div class="stat-box-icon icon-blue">📰</div>
            <div class="stat-box-info">
                <div class="stat-box-number">{{ $stats['total_articles'] }}</div>
                <div class="stat-box-label">Artikel ({{ $stats['published_articles'] }} Tayang)</div>
            </div>
        </div>

        <!-- Card 2: Consultations -->
        <div class="stat-box">
            <div class="stat-box-icon icon-ruby">📥</div>
            <div class="stat-box-info">
                <div class="stat-box-number">{{ $stats['total_consultations'] }}</div>
                <div class="stat-box-label">Leads ({{ $stats['new_consultations'] }} Baru)</div>
            </div>
        </div>

        <!-- Card 3: Services -->
        <div class="stat-box">
            <div class="stat-box-icon icon-emerald">💼</div>
            <div class="stat-box-info">
                <div class="stat-box-number">{{ $stats['total_services'] }}</div>
                <div class="stat-box-label">Paket Layanan</div>
            </div>
        </div>

        <!-- Card 4: FAQs & Testimonials -->
        <div class="stat-box">
            <div class="stat-box-icon icon-gold">⭐</div>
            <div class="stat-box-info">
                <div class="stat-box-number">{{ $stats['total_faqs'] + $stats['total_testimonials'] }}</div>
                <div class="stat-box-label">{{ $stats['total_faqs'] }} FAQ &bull; {{ $stats['total_testimonials'] }} Testimoni</div>
            </div>
        </div>
    </div>

    <!-- 3. Dual Column Section: Consultations + Articles -->
    <div class="dashboard-two-cols">
        <!-- Left: Recent Consultations Inbox -->
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="admin-card-title">
                    <span>📥</span>
                    <span>Leads Konsultasi Masuk Terbaru</span>
                </h3>
                <a href="{{ route('admin.consultations.index') }}" class="btn-secondary btn-sm">
                    Lihat Semua ({{ $stats['total_consultations'] }}) &rarr;
                </a>
            </div>
            <div class="admin-table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Klien</th>
                            <th>WhatsApp</th>
                            <th>Kebutuhan</th>
                            <th>Status</th>
                            <th style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentConsultations as $c)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <div class="client-avatar-circle">
                                            {{ strtoupper(substr($c->nama, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong style="color: var(--admin-navy-950); font-size: 0.84rem;">{{ $c->nama }}</strong>
                                            <div style="font-size: 0.7rem; color: var(--admin-navy-400);">{{ $c->bisnis ?: 'Perorangan' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $c->telepon) }}?text={{ urlencode('Halo ' . $c->nama . ', kami dari tim Akuntan Indonesia .ID menindaklanjuti pengajuan konsultasi Anda.') }}" target="_blank" class="btn-wa-action" title="Hubungi via WhatsApp">
                                        <span>💬 {{ $c->telepon }}</span>
                                    </a>
                                </td>
                                <td>
                                    <span style="font-size: 0.78rem; color: var(--admin-navy-800);">{{ Str::limit($c->kebutuhan, 32) }}</span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $c->status }}">
                                        {{ ucfirst($c->status) }}
                                    </span>
                                </td>
                                <td style="text-align: right;">
                                    <a href="{{ route('admin.consultations.show', $c) }}" class="btn-secondary btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: var(--admin-navy-400); padding: 28px 16px;">
                                    Belum ada leads konsultasi baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Latest Educational Articles -->
        <div>
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">
                        <span>📰</span>
                        <span>Artikel Edukasi Terbaru</span>
                    </h3>
                    <a href="{{ route('admin.articles.index') }}" class="btn-secondary btn-sm">
                        Kelola &rarr;
                    </a>
                </div>
                <div class="admin-card-body" style="padding: 12px 16px;">
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        @forelse($recentArticles as $art)
                            <div class="article-item-row">
                                <div style="flex: 1;">
                                    <a href="{{ route('admin.articles.edit', $art) }}" class="article-title-link">
                                        {{ Str::limit($art->title, 48) }}
                                    </a>
                                    <div style="font-size: 0.7rem; color: var(--admin-navy-400); margin-top: 2px;">
                                        <span style="color: var(--admin-blue); font-weight: 700;">{{ $art->category }}</span> &bull; <span>{{ $art->date_formatted }}</span>
                                    </div>
                                </div>
                                <div>
                                    @if($art->is_published)
                                        <span class="status-badge status-selesai">Tayang</span>
                                    @else
                                        <span class="status-badge status-dibatalkan">Draft</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div style="text-align: center; color: var(--admin-navy-400); padding: 18px;">
                                <p style="font-size: 0.8rem;">Belum ada artikel.</p>
                                <a href="{{ route('admin.articles.create') }}" class="btn-primary btn-sm" style="margin-top: 6px;">
                                    + Tulis Artikel
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Trust Badges -->
            <div class="admin-card" style="padding: 14px 16px;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; font-size: 0.74rem; font-weight: 700; color: var(--admin-navy-700);">
                    <div style="background: var(--admin-navy-50); padding: 8px 10px; border-radius: var(--radius-sm); border: 1px solid var(--admin-border); display: flex; align-items: center; gap: 6px;">
                        <span>🏛️</span> KJA Kemenkeu RI
                    </div>
                    <div style="background: var(--admin-navy-50); padding: 8px 10px; border-radius: var(--radius-sm); border: 1px solid var(--admin-border); display: flex; align-items: center; gap: 6px;">
                        <span>⚖️</span> Kuasa Hukum Pajak
                    </div>
                    <div style="background: var(--admin-navy-50); padding: 8px 10px; border-radius: var(--radius-sm); border: 1px solid var(--admin-border); display: flex; align-items: center; gap: 6px;">
                        <span>⚡</span> Coretax DJP Ready
                    </div>
                    <div style="background: var(--admin-navy-50); padding: 8px 10px; border-radius: var(--radius-sm); border: 1px solid var(--admin-border); display: flex; align-items: center; gap: 6px;">
                        <span>🔒</span> TLS 256-Bit SSL
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
