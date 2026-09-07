@extends('admin.layouts.app')

@section('title', 'Kelola Artikel')
@section('breadcrumb', 'Artikel')
@section('page_title', 'Manajemen Artikel')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">
                    <span>📰</span>
                    <span>Daftar Artikel</span>
                </h2>
                <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                    Kelola materi panduan pajak, tips akuntansi, dan artikel wawasan untuk klien publik.
                </p>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tulis Artikel Baru</span>
            </a>
        </div>

        <!-- Filter & Search Toolbar (Clean & User-Friendly) -->
        <div style="padding: 16px 24px; background: var(--admin-navy-50); border-bottom: 1px solid var(--admin-border); display: flex; gap: 12px; flex-wrap: wrap; align-items: center; justify-content: space-between;">
            <form method="GET" action="{{ route('admin.articles.index') }}" style="display: flex; gap: 10px; flex: 1; flex-wrap: wrap; align-items: center;">
                <div style="position: relative; flex: 1; max-width: 340px;">
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ request('q') }}" 
                        class="form-control" 
                        placeholder="🔍 Cari judul atau topik artikel..." 
                        style="padding-left: 14px;"
                    >
                </div>

                <select name="category" class="form-control" style="max-width: 200px;" onchange="this.form.submit()">
                    <option value="all">Semua Kategori</option>
                    @foreach($categories as $cat)
                        @php $catVal = is_object($cat) ? $cat->name : $cat; @endphp
                        <option value="{{ $catVal }}" {{ request('category') === $catVal ? 'selected' : '' }}>
                            {{ $catVal }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-secondary">
                    <span>Cari</span>
                </button>

                @if(request('q') || (request('category') && request('category') !== 'all'))
                    <a href="{{ route('admin.articles.index') }}" class="btn-secondary" style="color: var(--admin-navy-600);">
                        Reset Filter
                    </a>
                @endif
            </form>

            <div style="font-size: 0.8rem; color: var(--admin-navy-600); font-weight: 700;">
                Total: <strong>{{ $articles->total() }}</strong> artikel
            </div>
        </div>

        <!-- Articles Data Table -->
        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 42%;">Judul &amp; Tautan</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal Tayang</th>
                        <th>Status</th>
                        <th style="text-align: right;">Aksi Cepat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $art)
                        <tr>
                            <td>
                                <div>
                                    <a href="{{ route('admin.articles.edit', $art) }}" style="color: var(--admin-navy-950); font-weight: 800; font-size: 0.92rem; text-decoration: none; display: block; line-height: 1.35;">
                                        {{ $art->title }}
                                    </a>
                                    <div style="font-size: 0.74rem; color: var(--admin-navy-400); margin-top: 3px; display: flex; align-items: center; gap: 6px;">
                                        <span>🔗 /berita/{{ $art->slug }}</span>
                                        <span>&bull;</span>
                                        <span>👁️ {{ number_format($art->views ?? 0) }} views</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.78rem; background: var(--admin-navy-100); color: var(--admin-navy-800); padding: 4px 10px; border-radius: var(--radius-sm); font-weight: 700;">
                                    {{ $art->category_title }}
                                </span>
                            </td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 28px; height: 28px; border-radius: 50%; overflow: hidden; border: 1.5px solid var(--admin-border); background: #FFF; flex-shrink: 0;">
                                        <img src="{{ $art->author_avatar_url }}" alt="{{ $art->author_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div>
                                        <div style="font-size: 0.82rem; font-weight: 700; color: var(--admin-navy-900);">{{ $art->author_name }}</div>
                                        <div style="font-size: 0.72rem; color: var(--admin-navy-400);">⏱️ {{ $art->read_time }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--admin-navy-700); font-weight: 600;">
                                    {{ $art->date_formatted }}
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.articles.toggle', $art) }}" style="display: inline;">
                                    @csrf
                                    @if($art->is_published)
                                        <button type="submit" class="status-badge status-selesai" style="border: none; cursor: pointer;" title="Klik untuk mengubah status menjadi draf">
                                            <span>✓</span>
                                            <span>Tayang</span>
                                        </button>
                                    @else
                                        <button type="submit" class="status-badge status-dibatalkan" style="border: none; cursor: pointer;" title="Klik untuk langsung mempublikasikan">
                                            <span>○</span>
                                            <span>Draft</span>
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('article.detail', $art->slug) }}" target="_blank" class="btn-secondary btn-sm" title="Lihat pratinjau artikel di website publik">
                                    <span>🌐 Lihat</span>
                                </a>
                                <a href="{{ route('admin.articles.edit', $art) }}" class="btn-primary btn-sm" title="Edit artikel ini">
                                    <span>✏️ Edit</span>
                                </a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $art) }}" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" title="Hapus artikel">
                                        <span>🗑️</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--admin-navy-400); padding: 48px 20px;">
                                <div style="font-size: 2.5rem; margin-bottom: 8px;">📰</div>
                                <strong style="font-size: 1rem; color: var(--admin-navy-800);">Tidak ada artikel yang ditemukan.</strong>
                                <p style="font-size: 0.82rem; margin: 6px 0 16px;">Mulai buat artikel edukasi baru untuk meningkatkan kredibilitas &amp; SEO website.</p>
                                <a href="{{ route('admin.articles.create') }}" class="btn-primary btn-sm">
                                    + Tulis Artikel Baru Sekarang
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
            <div style="padding: 16px 24px; border-top: 1px solid var(--admin-border);">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection
