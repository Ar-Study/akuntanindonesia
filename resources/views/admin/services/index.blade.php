@extends('admin.layouts.app')

@section('title', 'Kelola Paket Layanan')
@section('page_title', 'Paket Layanan & Harga')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">Daftar Paket Layanan</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Kelola paket pricing yang tampil di landing page website publik.</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn-primary">
                <span>➕</span>
                <span>Tambah Paket</span>
            </a>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Urutan</th>
                        <th>Nama Paket</th>
                        <th>Badge / Label</th>
                        <th>Estimasi Harga</th>
                        <th>Jumlah Fitur</th>
                        <th>Highlight</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $svc)
                        <tr>
                            <td>
                                <span style="font-weight: 700; color: #64748B;">#{{ $svc->sort_order }}</span>
                            </td>
                            <td>
                                <strong style="font-size: 0.95rem; color: var(--admin-navy-950);">{{ $svc->title }}</strong>
                                <div style="font-size: 0.75rem; color: #64748B;">{{ Str::limit($svc->subtitle, 45) }}</div>
                            </td>
                            <td>
                                @if($svc->badge)
                                    <span style="font-size: 0.76rem; background: #EFF6FF; color: var(--admin-blue); padding: 3px 8px; border-radius: 4px; font-weight: 700;">
                                        {{ $svc->badge }}
                                    </span>
                                @else
                                    <span style="color: #94A3B8;">-</span>
                                @endif
                            </td>
                            <td>
                                <strong style="color: var(--admin-navy-900); font-size: 0.88rem;">{{ $svc->price_note ?: '-' }}</strong>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem;">{{ count($svc->features ?? []) }} poin</span>
                            </td>
                            <td>
                                @if($svc->is_featured)
                                    <span style="font-size: 0.74rem; background: #FFF1F2; color: var(--admin-ruby); padding: 3px 8px; border-radius: 999px; font-weight: 800;">
                                        ★ Populer
                                    </span>
                                @else
                                    <span style="color: #94A3B8; font-size: 0.8rem;">Standar</span>
                                @endif
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('admin.services.edit', $svc) }}" class="btn-primary btn-sm">
                                    ✏ Edit
                                </a>
                                <form method="POST" action="{{ route('admin.services.destroy', $svc) }}" style="display: inline;" onsubmit="return confirm('Hapus paket layanan ini?')">
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
                            <td colspan="7" style="text-align: center; color: #94A3B8; padding: 40px;">
                                Belum ada paket layanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
