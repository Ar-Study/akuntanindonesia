@extends('admin.layouts.app')

@section('title', 'Kelola Layanan Halaman Depan')
@section('page_title', 'Layanan Halaman Depan (Bento Grid)')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">Daftar Layanan Website</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                    Kelola 10 kartu layanan interaktif Bento Grid yang tampil pada Section 4 di halaman depan.
                </p>
            </div>
            <div style="display: flex; gap: 8px;">
                <a href="{{ route('home') }}#layanan" target="_blank" class="btn-secondary">
                    <span>👁️</span>
                    <span>Lihat di Web</span>
                </a>
                <a href="{{ route('admin.services.create') }}" class="btn-primary">
                    <span>➕</span>
                    <span>Tambah Layanan</span>
                </a>
            </div>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">Urut</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Badge &amp; Tema</th>
                        <th>Poin Fitur</th>
                        <th>Status</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $svc)
                        @php
                            $colorHexMap = [
                                'ruby' => '#E11D48',
                                'indigo' => '#4F46E5',
                                'gold' => '#D97706',
                                'emerald' => '#059669',
                                'cyan' => '#0891B2',
                                'violet' => '#7C3AED',
                            ];
                            $hex = $colorHexMap[$svc->color] ?? '#2563EB';
                        @endphp
                        <tr>
                            <td>
                                <span style="font-weight: 700; color: #64748B;">#{{ $svc->sort_order }}</span>
                            </td>
                            <td>
                                <div style="display: flex; align-items: flex-start; gap: 10px;">
                                    <span style="font-size: 1.3rem; line-height: 1; padding: 4px 6px; background: #F1F5F9; border-radius: 6px;">{{ $svc->icon ?: '📊' }}</span>
                                    <div>
                                        <strong style="font-size: 0.92rem; color: var(--admin-navy-950);">{{ $svc->title }}</strong>
                                        <div style="font-size: 0.75rem; color: #64748B; margin-top: 2px;">{{ Str::limit($svc->effective_description, 60) }}</div>
                                        @if($svc->mascot_tip)
                                            <div style="font-size: 0.72rem; color: #059669; margin-top: 2px;">
                                                💡 {{ Str::limit($svc->mascot_tip, 45) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.76rem; background: #F1F5F9; color: var(--admin-navy-800); padding: 3px 8px; border-radius: 4px; font-weight: 700; border: 1px solid var(--admin-border);">
                                    {{ $svc->category_label ?: ucfirst($svc->category) }}
                                </span>
                            </td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 6px;">
                                    <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: {{ $hex }};" title="Tema: {{ $svc->color }}"></span>
                                    <span style="font-size: 0.76rem; color: var(--admin-navy-800); font-weight: 600;">
                                        {{ $svc->badge ?: '-' }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.8rem; font-weight: 700; color: var(--admin-navy-800);">
                                    {{ count($svc->effective_points) }} checklist
                                </span>
                            </td>
                            <td>
                                @if($svc->is_active)
                                    <span style="font-size: 0.72rem; background: #ECFDF5; color: #059669; padding: 3px 8px; border-radius: 999px; font-weight: 800; border: 1px solid #A7F3D0;">
                                        ✓ Aktif
                                    </span>
                                @else
                                    <span style="font-size: 0.72rem; background: #F1F5F9; color: #64748B; padding: 3px 8px; border-radius: 999px; font-weight: 700;">
                                        ✕ Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('admin.services.edit', $svc) }}" class="btn-primary btn-sm">
                                    ✏ Edit
                                </a>
                                <form method="POST" action="{{ route('admin.services.destroy', $svc) }}" style="display: inline;" onsubmit="return confirm('Hapus layanan ini dari website?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" title="Hapus Layanan">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; color: #94A3B8; padding: 40px;">
                                Belum ada layanan. Klik tombol "Tambah Layanan" untuk mulai menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
