@extends('admin.layouts.app')

@section('title', 'Kategori Artikel')
@section('breadcrumb', 'Kategori')
@section('page_title', 'Kelola Kategori Artikel')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
            <h2 class="admin-card-title">
                <span>🏷️</span>
                <span>Daftar Kategori Artikel</span>
            </h2>
            <span style="font-size: 0.76rem; color: var(--admin-navy-600); background: var(--admin-navy-100); padding: 2px 8px; border-radius: var(--radius-full); font-weight: 700;">
                Total: {{ $categories->total() }} Kategori
            </span>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <form action="{{ route('admin.categories.index') }}" method="GET" style="display: flex; gap: 6px;">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}" 
                    placeholder="Cari kategori..." 
                    class="form-control" 
                    style="padding: 6px 10px; font-size: 0.78rem; width: 180px;"
                >
                <button type="submit" class="btn-secondary btn-sm">Cari</button>
            </form>

            <a href="{{ route('admin.categories.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tambah Kategori</span>
            </a>
        </div>
    </div>

    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama Kategori</th>
                        <th>Slug (URL)</th>
                        <th>Deskripsi</th>
                        <th style="text-align: center;">Jumlah Artikel</th>
                        <th style="text-align: right; width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $cat)
                        <tr>
                            <td style="color: var(--admin-navy-400); font-weight: 700;">
                                {{ $categories->firstItem() + $index }}
                            </td>
                            <td>
                                <strong style="color: var(--admin-navy-950); font-size: 0.88rem;">{{ $cat->name }}</strong>
                            </td>
                            <td>
                                <code style="font-size: 0.76rem; background: var(--admin-navy-50); padding: 2px 6px; border-radius: 4px; color: var(--admin-blue);">{{ $cat->slug }}</code>
                            </td>
                            <td style="color: var(--admin-navy-600); font-size: 0.82rem; max-width: 320px;">
                                {{ $cat->description ?: '-' }}
                            </td>
                            <td style="text-align: center;">
                                <span class="status-badge status-baru" style="font-size: 0.72rem;">
                                    {{ $cat->articles_count }} Artikel
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 6px; align-items: center;">
                                    <a href="{{ route('admin.categories.edit', $cat) }}" class="btn-secondary btn-sm" title="Edit Kategori">
                                        ✏️ Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus kategori {{ $cat->name }}? Artikel yang memakai kategori ini tidak akan terhapus.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-sm" title="Hapus Kategori">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 36px 20px; color: var(--admin-navy-400);">
                                <div style="font-size: 2rem; margin-bottom: 8px;">🏷️</div>
                                <strong>Belum ada data kategori.</strong>
                                <div style="margin-top: 8px;">
                                    <a href="{{ route('admin.categories.create') }}" class="btn-primary btn-sm">
                                        Tambah Kategori Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div style="padding: 14px 18px; border-top: 1px solid var(--admin-border);">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
