@extends('admin.layouts.app')

@section('title', 'Inbox Konsultasi')
@section('breadcrumb', 'Leads & Klien')
@section('page_title', 'Inbox Konsultasi Masuk')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">
                    <span>📥</span>
                    <span>Daftar Pengajuan Konsultasi Klien</span>
                </h2>
                <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                    Formulir konsultasi dari landing page tersimpan otomatis di sini untuk ditindaklanjuti.
                </p>
            </div>

            <!-- Status Quick Badges / Tabs Filter -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="{{ route('admin.consultations.index', ['status' => 'all']) }}" class="btn-secondary btn-sm {{ !request('status') || request('status') === 'all' ? 'active' : '' }}">
                    Semua ({{ $statusCounts['all'] }})
                </a>
                <a href="{{ route('admin.consultations.index', ['status' => 'baru']) }}" class="btn-secondary btn-sm {{ request('status') === 'baru' ? 'active' : '' }}" style="color: #1D4ED8; font-weight: 800;">
                    ⚡ Baru ({{ $statusCounts['baru'] }})
                </a>
                <a href="{{ route('admin.consultations.index', ['status' => 'dihubungi']) }}" class="btn-secondary btn-sm {{ request('status') === 'dihubungi' ? 'active' : '' }}" style="color: #B45309; font-weight: 800;">
                    📞 Dihubungi ({{ $statusCounts['dihubungi'] }})
                </a>
                <a href="{{ route('admin.consultations.index', ['status' => 'selesai']) }}" class="btn-secondary btn-sm {{ request('status') === 'selesai' ? 'active' : '' }}" style="color: #047857; font-weight: 800;">
                    ✓ Selesai ({{ $statusCounts['selesai'] }})
                </a>
            </div>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Waktu Masuk</th>
                        <th>Klien &amp; Usaha</th>
                        <th>WhatsApp Klien</th>
                        <th>Kebutuhan Layanan</th>
                        <th>Status Prospek</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consultations as $c)
                        <tr>
                            <td>
                                <div style="font-size: 0.8rem; color: var(--admin-navy-600); font-weight: 700;">
                                    {{ $c->created_at->format('d M Y') }}
                                    <div style="font-size: 0.72rem; color: var(--admin-navy-400); font-weight: 500;">
                                        {{ $c->created_at->format('H:i') }} WIB
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <strong style="color: var(--admin-navy-950); font-size: 0.92rem;">{{ $c->nama }}</strong>
                                    <div style="font-size: 0.76rem; color: var(--admin-navy-400);">
                                        🏢 {{ $c->bisnis ?: 'Perorangan / Belum ada badan' }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $c->telepon) }}?text={{ urlencode('Halo ' . $c->nama . ', kami dari tim Akuntan Indonesia .ID menindaklanjuti pengajuan konsultasi Anda mengenai ' . $c->kebutuhan . '.') }}" target="_blank" class="btn-secondary btn-sm" style="color: #059669; border-color: #A7F3D0; background: #ECFDF5; font-weight: 800;" title="Hubungi langsung via WhatsApp">
                                    <span>💬</span>
                                    <span>{{ $c->telepon }}</span>
                                </a>
                            </td>
                            <td>
                                <span style="font-size: 0.84rem; font-weight: 600; color: var(--admin-navy-800);">
                                    {{ Str::limit($c->kebutuhan, 45) }}
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-{{ $c->status }}">
                                    @if($c->status === 'baru')
                                        <span>⚡ Baru</span>
                                    @elseif($c->status === 'dihubungi')
                                        <span>📞 Dihubungi</span>
                                    @elseif($c->status === 'selesai')
                                        <span>✓ Selesai</span>
                                    @else
                                        <span>{{ ucfirst($c->status) }}</span>
                                    @endif
                                </span>
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('admin.consultations.show', $c) }}" class="btn-primary btn-sm" title="Buka detail lengkap & catatan">
                                    <span>🔍 Detail</span>
                                </a>
                                <form method="POST" action="{{ route('admin.consultations.destroy', $c) }}" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data konsultasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger btn-sm" title="Hapus pesan">
                                        <span>🗑️</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--admin-navy-400); padding: 48px 20px;">
                                <div style="font-size: 2.5rem; margin-bottom: 8px;">📥</div>
                                <strong style="font-size: 1rem; color: var(--admin-navy-800);">Belum ada pesan konsultasi.</strong>
                                <p style="font-size: 0.82rem; margin-top: 4px;">Setiap pengajuan formulir konsultasi dari landing page akan masuk secara otomatis ke sini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($consultations->hasPages())
            <div style="padding: 16px 24px; border-top: 1px solid var(--admin-border);">
                {{ $consultations->links() }}
            </div>
        @endif
    </div>
@endsection
