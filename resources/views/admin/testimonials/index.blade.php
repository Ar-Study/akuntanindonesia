@extends('admin.layouts.app')

@section('title', 'Kelola Testimoni Klien')
@section('page_title', 'Testimoni & Review Klien')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">Daftar Testimoni Klien</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Ulasan dan rating kepuasan klien yang tampil di slider testimoni.</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tambah Testimoni</span>
            </a>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 25%;">Nama Klien &amp; Perusahaan</th>
                        <th style="width: 15%;">Rating</th>
                        <th style="width: 45%;">Isi Ulasan / Kutipan</th>
                        <th style="width: 15%; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $t)
                        <tr>
                            <td>
                                <strong style="color: var(--admin-navy-950); font-size: 0.92rem;">{{ $t->client_name }}</strong>
                                <div style="font-size: 0.76rem; color: #64748B;">
                                    {{ $t->company ? "{$t->role} - {$t->company}" : ($t->role ?: '-') }}
                                </div>
                            </td>
                            <td>
                                <div style="color: #F59E0B; font-size: 0.95rem;">
                                    @for($i = 0; $i < $t->rating; $i++)
                                        ★
                                    @endfor
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.84rem; color: #334155; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    "{{ $t->review }}"
                                </span>
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn-primary btn-sm">
                                    ✏ Edit
                                </a>
                                <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" style="display: inline;" onsubmit="return confirm('Hapus testimoni ini?')">
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
                            <td colspan="4" style="text-align: center; color: #94A3B8; padding: 40px;">
                                Belum ada ulasan testimoni.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
