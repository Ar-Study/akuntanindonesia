@extends('admin.layouts.app')

@section('title', 'Inbox Konsultasi')
@section('page_title', 'Inbox Konsultasi & Leads')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">Daftar Formulir Konsultasi Klien</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Seluruh pengajuan konsultasi dari landing page tersimpan otomatis di sini.</p>
            </div>

            <!-- Status Quick Badges / Tabs -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="{{ route('admin.consultations.index', ['status' => 'all']) }}" class="btn-secondary btn-sm {{ !request('status') || request('status') === 'all' ? 'active' : '' }}">
                    Semua ({{ $statusCounts['all'] }})
                </a>
                <a href="{{ route('admin.consultations.index', ['status' => 'baru']) }}" class="btn-secondary btn-sm {{ request('status') === 'baru' ? 'active' : '' }}" style="color: #1D4ED8;">
                    Baru ({{ $statusCounts['baru'] }})
                </a>
                <a href="{{ route('admin.consultations.index', ['status' => 'dihubungi']) }}" class="btn-secondary btn-sm {{ request('status') === 'dihubungi' ? 'active' : '' }}" style="color: #B45309;">
                    Dihubungi ({{ $statusCounts['dihubungi'] }})
                </a>
                <a href="{{ route('admin.consultations.index', ['status' => 'selesai']) }}" class="btn-secondary btn-sm {{ request('status') === 'selesai' ? 'active' : '' }}" style="color: #047857;">
                    Selesai ({{ $statusCounts['selesai'] }})
                </a>
            </div>
        </div>

        <div class="admin-table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Waktu Masuk</th>
                        <th>Nama Klien</th>
                        <th>No. Telp / WhatsApp</th>
                        <th>Bidang Bisnis</th>
                        <th>Kebutuhan</th>
                        <th>Status</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consultations as $c)
                        <tr>
                            <td>
                                <div style="font-size: 0.8rem; color: #64748B;">
                                    {{ $c->created_at->format('d M Y') }}
                                    <div style="font-size: 0.72rem;">{{ $c->created_at->format('H:i') }} WIB</div>
                                </div>
                            </td>
                            <td>
                                <strong style="color: var(--admin-navy-950);">{{ $c->nama }}</strong>
                            </td>
                            <td>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $c->telepon) }}" target="_blank" style="color: var(--admin-blue); font-weight: 700; text-decoration: none;">
                                    💬 {{ $c->telepon }}
                                </a>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem;">{{ $c->bisnis ?: '-' }}</span>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem;">{{ Str::limit($c->kebutuhan, 40) }}</span>
                            </td>
                            <td>
                                <span class="status-badge status-{{ $c->status }}">
                                    {{ ucfirst($c->status) }}
                                </span>
                            </td>
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="{{ route('admin.consultations.show', $c) }}" class="btn-primary btn-sm">
                                    Detail
                                </a>
                                <form method="POST" action="{{ route('admin.consultations.destroy', $c) }}" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data konsultasi ini?')">
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
                                Belum ada pesan konsultasi yang masuk.
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
