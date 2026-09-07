@extends('admin.layouts.app')

@section('title', 'Kelola Artikel & Edukasi')
@section('page_title', 'Manajemen Edukasi & Berita')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">Daftar Artikel &amp; Regulasi</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Kelola materi edukasi perpajakan, tips akuntansi, dan berita regulasi.</p>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tulis Artikel Baru</span>
            </a>
        </div>

        <!-- Filter & Search Toolbar -->
        <div style="padding: 16px 24px; background: #FAFAFA; border-bottom: 1px solid var(--admin-border); display: flex; gap: 14px; flex-wrap: wrap;">
            <form method="GET" action="{{ route('admin.articles.index') }}" style="display: flex; gap: 10px; flex: 1; flex-wrap: wrap;">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}" 
                    class="form-control" 
                    placeholder="Cari judul artikel atau topik..." 
                    style="max-width: 320px;"
                >

                <select name="category" class="form-control" style="max-width: 220px;" onchange="this.form.submit()">
                    <option value="all">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-secondary">
                    <span>🔍</span> Cari
                </button>

                @if(request('q') || (request('category') && request('category') !== 'all'))
                    <a href="{{ route('admin.articles.index') }}" class="btn-secondary" style="color: #64748B;">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 40%;">Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $art)
                        <tr>
                            <td>
                                <div>
                                    <strong style="color: var(--admin-navy-950); font-size: 0.92rem;">{{ $art->title }}</strong>
                                    <div style="font-size: 0.75rem; color: #64748B; margin-top: 3px; font-family: monospace;">
                                        slug: /berita/{{ $art->slug }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.8rem; background: #F1F5F9; padding: 4px 10px; border-radius: 6px; font-weight: 600;">
                                    {{ $art->category }}
                                </span>
                            </td>
                            <td>
                                <div style="font-size: 0.82rem; font-weight: 600;">{{ $art->author }}</div>
                                <div style="font-size: 0.72rem; color: #64748B;">{{ $art->read_time }}</div>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: #475569;">{{ $art->date_formatted }}</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.articles.toggle', $art) }}" style="display: inline;">
                                    @csrf
                                    @if($art->is_published)
                                        <button type="submit" style="border: none; background: #ECFDF5; color: #047857; font-size: 0.74rem; font-weight: 700; padding: 4px 10px; border-radius: 999px; cursor: pointer;" title="Klik untuk jadikan draft">
                                            ✓ Tayang
                                        </button>
                                    @else
                                        <button type="submit" style="border: none; background: #F1F5F9; color: #64748B; font-size: 0.74rem; font-weight: 700; padding: 4px 10px; border-radius: 999px; cursor: pointer;" title="Klik untuk publikasikan">
                                            ○ Draft
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('article.detail', $art->slug) }}" target="_blank" class="btn-secondary btn-sm" title="Lihat di web publik">
                                    👁
                                </a>
                                <a href="{{ route('admin.articles.edit', $art) }}" class="btn-primary btn-sm" title="Edit artikel">
                                    ✏ Edit
                                </a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $art) }}" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" title="Hapus artikel">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: #94A3B8; padding: 40px;">
                                Tidak ada artikel yang sesuai kriteria pencarian.
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
