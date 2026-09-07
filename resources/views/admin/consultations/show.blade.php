@extends('admin.layouts.app')

@section('title', 'Detail Konsultasi - ' . $consultation->nama)
@section('breadcrumb', 'Inbox Konsultasi')
@section('page_title', 'Detail Pengajuan Prospek Klien')

@section('content')
    <div style="max-width: 920px;">
        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <h2 class="admin-card-title">
                        <span>📥</span>
                        <span>Pengajuan Konsultasi #{{ $consultation->id }}</span>
                    </h2>
                    <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                        Diterima pada {{ $consultation->created_at->format('d F Y, H:i') }} WIB ({{ $consultation->created_at->diffForHumans() }})
                    </p>
                </div>
                <a href="{{ route('admin.consultations.index') }}" class="btn-secondary btn-sm">
                    ← Kembali ke Inbox
                </a>
            </div>

            <div class="admin-card-body">
                <!-- Client Info Grid -->
                <div class="form-grid-2" style="margin-bottom: 24px;">
                    <div>
                        <div style="font-size: 0.74rem; font-weight: 800; color: var(--admin-navy-400); text-transform: uppercase; letter-spacing: 0.04em;">Nama Lengkap Klien:</div>
                        <div style="font-size: 1.25rem; font-weight: 800; color: var(--admin-navy-950); margin-top: 4px;">{{ $consultation->nama }}</div>
                    </div>

                    <div>
                        <div style="font-size: 0.74rem; font-weight: 800; color: var(--admin-navy-400); text-transform: uppercase; letter-spacing: 0.04em;">WhatsApp / Telepon:</div>
                        <div style="margin-top: 4px;">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->telepon) }}?text={{ urlencode('Halo ' . $consultation->nama . ', kami dari tim Akuntan Indonesia .ID menindaklanjuti pengajuan konsultasi Anda mengenai ' . $consultation->kebutuhan . '.') }}" target="_blank" class="btn-primary btn-sm" style="background: #059669; font-weight: 800;">
                                💬 Hubungi via WhatsApp ({{ $consultation->telepon }}) ↗
                            </a>
                        </div>
                    </div>

                    <div>
                        <div style="font-size: 0.74rem; font-weight: 800; color: var(--admin-navy-400); text-transform: uppercase; letter-spacing: 0.04em;">Nama Bisnis / Usaha:</div>
                        <div style="font-size: 0.95rem; font-weight: 700; color: var(--admin-navy-900); margin-top: 4px;">{{ $consultation->bisnis ?: '(Belum dicantumkan)' }}</div>
                    </div>

                    <div>
                        <div style="font-size: 0.74rem; font-weight: 800; color: var(--admin-navy-400); text-transform: uppercase; letter-spacing: 0.04em;">Kebutuhan Layanan:</div>
                        <div style="font-size: 0.95rem; font-weight: 800; color: var(--admin-ruby); margin-top: 4px;">{{ $consultation->kebutuhan }}</div>
                    </div>
                </div>

                <!-- Client Message Box -->
                <div style="background: var(--admin-navy-50); border: 1.5px solid var(--admin-border); border-radius: var(--radius-md); padding: 18px 20px; margin-bottom: 28px;">
                    <div style="font-size: 0.74rem; font-weight: 800; color: var(--admin-navy-400); text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 8px;">Pesan Tambahan Klien:</div>
                    <div style="font-size: 0.92rem; color: var(--admin-navy-900); line-height: 1.6; white-space: pre-line;">
                        {{ $consultation->pesan ?: '(Tidak ada catatan tambahan dari klien)' }}
                    </div>
                </div>

                <!-- Update Status & Internal Notes Form -->
                <form method="POST" action="{{ route('admin.consultations.status', $consultation) }}" style="border-top: 1px solid var(--admin-border); padding-top: 24px;">
                    @csrf
                    @method('PATCH')

                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--admin-navy-950); margin-bottom: 16px; display: flex; align-items: center; gap: 6px;">
                        <span>📋</span>
                        <span>Tindak Lanjut &amp; Catatan Internal Admin</span>
                    </h3>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="status" class="form-label">Status Prospek Saat Ini</label>
                            <select name="status" id="status" class="form-control" style="font-weight: 700;">
                                <option value="baru" {{ $consultation->status === 'baru' ? 'selected' : '' }}>⚡ Baru Masuk (Belum Dihubungi)</option>
                                <option value="dihubungi" {{ $consultation->status === 'dihubungi' ? 'selected' : '' }}>📞 Sudah Dihubungi / Follow-up</option>
                                <option value="selesai" {{ $consultation->status === 'selesai' ? 'selected' : '' }}>✓ Selesai / Jadi Klien (Deal)</option>
                                <option value="dibatalkan" {{ $consultation->status === 'dibatalkan' ? 'selected' : '' }}>❌ Dibatalkan / Tidak Valid</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admin_notes" class="form-label">Catatan Tim Internal (Hanya terlihat oleh admin):</label>
                        <textarea name="admin_notes" id="admin_notes" rows="3" class="form-control" placeholder="Tuliskan perkembangan follow up, misalnya: Sudah ditelepon tanggal 07/09/2026, klien tertarik paket Scale-up bulanan...">{{ old('admin_notes', $consultation->admin_notes) }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                        <button type="submit" class="btn-primary">
                            <span>💾</span>
                            <span>Simpan Perubahan Status &amp; Catatan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
