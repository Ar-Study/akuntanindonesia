@extends('admin.layouts.app')

@section('title', 'Kelola FAQ')
@section('page_title', 'Tanya Jawab (FAQ)')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">Daftar Pertanyaan yang Sering Diajukan</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Kelola pertanyaan umum seputar legalitas, jangkauan, dan layanan akuntansi.</p>
            </div>
            <a href="{{ route('admin.faqs.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tambah FAQ</span>
            </a>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 5%;">Urutan</th>
                        <th style="width: 15%;">Kategori</th>
                        <th style="width: 35%;">Pertanyaan</th>
                        <th style="width: 35%;">Jawaban</th>
                        <th style="text-align: right; width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faqs as $f)
                        <tr>
                            <td>
                                <strong style="color: #64748B;">#{{ $f->sort_order }}</strong>
                            </td>
                            <td>
                                <span style="font-size: 0.76rem; background: #F1F5F9; padding: 3px 8px; border-radius: 4px; font-weight: 700;">
                                    {{ $f->category }}
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--admin-navy-950); font-size: 0.88rem;">{{ $f->question }}</strong>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: #475569; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $f->answer }}
                                </span>
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('admin.faqs.edit', $f) }}" class="btn-primary btn-sm">
                                    ✏ Edit
                                </a>
                                <form method="POST" action="{{ route('admin.faqs.destroy', $f) }}" style="display: inline;" onsubmit="return confirm('Hapus FAQ ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: #94A3B8; padding: 40px;">
                                Belum ada FAQ.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
