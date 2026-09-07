@extends('admin.layouts.app')

@section('title', 'Penulis Artikel')
@section('breadcrumb', 'Penulis')
@section('page_title', 'Kelola Penulis & Kontributor')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
            <h2 class="admin-card-title">
                <span>👤</span>
                <span>Daftar Penulis &amp; Ahli</span>
            </h2>
            <span style="font-size: 0.76rem; color: var(--admin-navy-600); background: var(--admin-navy-100); padding: 2px 8px; border-radius: var(--radius-full); font-weight: 700;">
                Total: {{ $authors->total() }} Penulis
            </span>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <form action="{{ route('admin.authors.index') }}" method="GET" style="display: flex; gap: 6px;">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}" 
                    placeholder="Cari nama penulis..." 
                    class="form-control" 
                    style="padding: 6px 10px; font-size: 0.78rem; width: 180px;"
                >
                <button type="submit" class="btn-secondary btn-sm">Cari</button>
            </form>

            <a href="{{ route('admin.authors.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tambah Penulis</span>
            </a>
        </div>
    </div>

    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">Foto</th>
                        <th>Nama &amp; Gelar</th>
                        <th>Jabatan / Kredensial</th>
                        <th>Bio Singkat</th>
                        <th style="text-align: center;">Artikel</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: right; width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authors as $author)
                        <tr>
                            <td>
                                <div style="width: 42px; height: 42px; border-radius: 50%; overflow: hidden; border: 2px solid var(--admin-border); background: var(--admin-navy-50); display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ $author->avatar_url }}" alt="{{ $author->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </td>
                            <td>
                                <strong style="color: var(--admin-navy-950); font-size: 0.88rem; display: block;">{{ $author->name }}</strong>
                                @if($author->email)
                                    <small style="color: var(--admin-navy-400); font-size: 0.75rem;">{{ $author->email }}</small>
                                @endif
                            </td>
                            <td style="color: var(--admin-navy-800); font-weight: 600; font-size: 0.82rem;">
                                {{ $author->role ?: 'Akuntan & Konsultan Pajak' }}
                            </td>
                            <td style="color: var(--admin-navy-600); font-size: 0.8rem; max-width: 300px;">
                                {{ Str::limit($author->bio ?: '-', 90) }}
                            </td>
                            <td style="text-align: center;">
                                <span class="status-badge status-baru" style="font-size: 0.72rem;">
                                    {{ $author->articles_count }} Artikel
                                </span>
                            </td>
                            <td style="text-align: center;">
                                @if($author->is_active)
                                    <span class="status-badge status-selesai">Aktif</span>
                                @else
                                    <span class="status-badge status-dibatalkan">Nonaktif</span>
                                @endif
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 6px; align-items: center;">
                                    <a href="{{ route('admin.authors.edit', $author) }}" class="btn-secondary btn-sm" title="Edit Penulis">
                                        ✏️ Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus penulis {{ $author->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-sm" title="Hapus Penulis">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 36px 20px; color: var(--admin-navy-400);">
                                <div style="font-size: 2rem; margin-bottom: 8px;">👤</div>
                                <strong>Belum ada data penulis.</strong>
                                <div style="margin-top: 8px;">
                                    <a href="{{ route('admin.authors.create') }}" class="btn-primary btn-sm">
                                        Tambah Penulis Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($authors->hasPages())
            <div style="padding: 14px 18px; border-top: 1px solid var(--admin-border);">
                {{ $authors->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
