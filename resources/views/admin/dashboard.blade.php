@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan & Dashboard')

@section('styles')
<style>
    .stats-overview-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 28px;
    }

    .stat-box {
        background: #FFFFFF;
        border-radius: 12px;
        padding: 22px 24px;
        border: 1px solid var(--admin-border);
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .stat-box-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
    }

    .icon-blue { background: #EFF6FF; color: var(--admin-blue); }
    .icon-ruby { background: #FFF1F2; color: var(--admin-ruby); }
    .icon-emerald { background: #ECFDF5; color: var(--admin-emerald); }
    .icon-gold { background: #FFFBEB; color: var(--admin-gold); }

    .stat-box-number {
        font-size: 1.65rem;
        font-weight: 800;
        color: var(--admin-navy-950);
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .stat-box-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--admin-navy-600);
        margin-top: 4px;
    }

    .quick-actions-bar {
        background: linear-gradient(135deg, var(--admin-navy-950) 0%, var(--admin-navy-900) 100%);
        border-radius: 14px;
        padding: 24px;
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .quick-actions-title h3 {
        font-size: 1.15rem;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .quick-actions-title p {
        font-size: 0.82rem;
        color: #94A3B8;
    }

    .quick-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-quick {
        background: rgba(255, 255, 255, 0.12);
        color: #FFFFFF;
        border: 1px solid rgba(255, 255, 255, 0.18);
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .btn-quick:hover {
        background: #FFFFFF;
        color: var(--admin-navy-950);
    }

    .dashboard-two-cols {
        display: grid;
        grid-template-columns: 1.6fr 1fr;
        gap: 24px;
    }

    @media (max-width: 1200px) {
        .stats-overview-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .dashboard-two-cols {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .stats-overview-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
    <!-- Quick Actions Banner -->
    <div class="quick-actions-bar">
        <div class="quick-actions-title">
            <h3>Selamat Datang di Pusat Kendali Akuntan.ID</h3>
            <p>Kelola artikel edukasi, paket layanan, respons prospek klien, dan seluruh konten publik secara langsung.</p>
        </div>
        <div class="quick-buttons">
            <a href="{{ route('admin.articles.create') }}" class="btn-quick">
                <span>✍️</span>
                <span>Tulis Artikel Baru</span>
            </a>
            <a href="{{ route('admin.consultations.index') }}" class="btn-quick">
                <span>📥</span>
                <span>Cek Leads Masuk</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="btn-quick">
                <span>➕</span>
                <span>Tambah Paket Layanan</span>
            </a>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-overview-grid">
        <div class="stat-box">
            <div class="stat-box-icon icon-blue">📰</div>
            <div>
                <div class="stat-box-number">{{ $stats['total_articles'] }}</div>
                <div class="stat-box-label">Total Artikel ({{ $stats['published_articles'] }} Tayang)</div>
            </div>
        </div>

        <div class="stat-box">
            <div class="stat-box-icon icon-ruby">📥</div>
            <div>
                <div class="stat-box-number">{{ $stats['total_consultations'] }}</div>
                <div class="stat-box-label">Leads Konsultasi ({{ $stats['new_consultations'] }} Baru)</div>
            </div>
        </div>

        <div class="stat-box">
            <div class="stat-box-icon icon-emerald">💼</div>
            <div>
                <div class="stat-box-number">{{ $stats['total_services'] }}</div>
                <div class="stat-box-label">Paket Layanan Aktif</div>
            </div>
        </div>

        <div class="stat-box">
            <div class="stat-box-icon icon-gold">⭐</div>
            <div>
                <div class="stat-box-number">{{ $stats['total_faqs'] }} FAQ / {{ $stats['total_testimonials'] }} Testimoni</div>
                <div class="stat-box-label">Kredibilitas &amp; Interaksi</div>
            </div>
        </div>
    </div>

    <!-- Dual Column Sections -->
    <div class="dashboard-two-cols">
        <!-- Recent Consultations Inbox -->
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="admin-card-title">📥 Leads Konsultasi Terbaru</h2>
                <a href="{{ route('admin.consultations.index') }}" class="btn-secondary btn-sm">Lihat Semua Inbox</a>
            </div>
            <div class="admin-table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Klien</th>
                            <th>No. Telp / WA</th>
                            <th>Kebutuhan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentConsultations as $c)
                            <tr>
                                <td>
                                    <strong>{{ $c->nama }}</strong>
                                    @if($c->bisnis)
                                        <div style="font-size: 0.76rem; color: #64748B;">{{ $c->bisnis }}</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $c->telepon) }}" target="_blank" style="color: var(--admin-blue); font-weight: 600; text-decoration: none;">
                                        {{ $c->telepon }} ↗
                                    </a>
                                </td>
                                <td>
                                    <span style="font-size: 0.82rem;">{{ Str::limit($c->kebutuhan, 40) }}</span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $c->status }}">
                                        {{ ucfirst($c->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.consultations.show', $c) }}" class="btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #94A3B8; padding: 32px;">
                                    Belum ada leads konsultasi masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Articles -->
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="admin-card-title">📰 Artikel Edukasi Regulasi</h2>
                <a href="{{ route('admin.articles.index') }}" class="btn-secondary btn-sm">Kelola</a>
            </div>
            <div class="admin-card-body" style="padding: 12px 20px;">
                <div style="display: flex; flex-direction: column; gap: 14px;">
                    @forelse($recentArticles as $art)
                        <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 12px; border-bottom: 1px solid var(--admin-border);">
                            <div style="flex: 1; padding-right: 12px;">
                                <a href="{{ route('admin.articles.edit', $art) }}" style="font-size: 0.88rem; font-weight: 700; color: var(--admin-navy-950); text-decoration: none;">
                                    {{ Str::limit($art->title, 55) }}
                                </a>
                                <div style="font-size: 0.74rem; color: #64748B; margin-top: 3px;">
                                    <span>{{ $art->category }}</span> &bull; <span>{{ $art->date_formatted }}</span>
                                </div>
                            </div>
                            <div>
                                @if($art->is_published)
                                    <span style="font-size: 0.72rem; font-weight: 700; color: #047857; background: #ECFDF5; padding: 3px 8px; border-radius: 6px;">Tayang</span>
                                @else
                                    <span style="font-size: 0.72rem; font-weight: 700; color: #64748B; background: #F1F5F9; padding: 3px 8px; border-radius: 6px;">Draft</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; color: #94A3B8; padding: 24px;">Belum ada artikel.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
