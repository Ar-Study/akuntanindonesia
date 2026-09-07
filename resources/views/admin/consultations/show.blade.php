@extends('admin.layouts.app')

@section('title', 'Detail Konsultasi - ' . $consultation->nama)
@section('page_title', 'Detail Prospek Klien')

@section('content')
    <div style="max-width: 900px;">
        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <h2 class="admin-card-title">Pengajuan Konsultasi #{{ $consultation->id }}</h2>
                    <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                        Masuk pada {{ $consultation->created_at->format('d F Y, H:i') }} WIB
                    </p>
                </div>
                <a href="{{ route('admin.consultations.index') }}" class="btn-secondary btn-sm">
                    ← Kembali ke Inbox
                </a>
            </div>

            <div class="admin-card-body">
                <div class="form-grid-2" style="margin-bottom: 24px;">
                    <div>
                        <div style="font-size: 0.78rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Nama Lengkap:</div>
                        <div style="font-size: 1.15rem; font-weight: 800; color: var(--admin-navy-950); margin-top: 4px;">{{ $consultation->nama }}</div>
                    </div>

                    <div>
                        <div style="font-size: 0.78rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Nomor WhatsApp:</div>
                        <div style="margin-top: 4px;">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->telepon) }}" target="_blank" class="btn-primary btn-sm" style="background: #10B981;">
                                💬 Hubungi via WhatsApp ({{ $consultation->telepon }})
                            </a>
                        </div>
                    </div>

                    <div>
                        <div style="font-size: 0.78rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Bidang Bisnis:</div>
                        <div style="font-size: 1rem; font-weight: 600; color: var(--admin-navy-900); margin-top: 4px;">{{ $consultation->bisnis ?: '-' }}</div>
                    </div>

                    <div>
                        <div style="font-size: 0.78rem; font-weight: 700; color: #64748B; text-transform: uppercase;">Layanan yang Dibutuhkan:</div>
                        <div style="font-size: 1rem; font-weight: 700; color: var(--admin-ruby); margin-top: 4px;">{{ $consultation->kebutuhan }}</div>
                    </div>
                </div>

                <div style="background: #F8FAFC; border: 1px solid var(--admin-border); border-radius: 10px; padding: 18px; margin-bottom: 28px;">
                    <div style="font-size: 0.78rem; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 6px;">Pesan Tambahan Klien:</div>
                    <div style="font-size: 0.92rem; color: var(--admin-navy-900); line-height: 1.6; white-space: pre-line;">
                        {{ $consultation->pesan ?: '(Tidak ada pesan tambahan)' }}
                    </div>
                </div>

                <!-- Update Status & Admin Notes Form -->
                <form method="POST" action="{{ route('admin.consultations.status', $consultation) }}" style="border-top: 1px solid var(--admin-border); padding-top: 24px;">
                    @csrf
                    @method('PATCH')

                    <h3 style="font-size: 1rem; font-weight: 800; color: var(--admin-navy-950); margin-bottom: 16px;">
                        Tindak Lanjut &amp; Catatan Internal
                    </h3>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="status" class="form-label">Status Prospek</label>
                            <select name="status" id="status" class="form-control">
                                <option value="baru" {{ $consultation->status === 'baru' ? 'selected' : '' }}>Baru Masuk</option>
                                <option value="dihubungi" {{ $consultation->status === 'dihubungi' ? 'selected' : '' }}>Sudah Dihubungi</option>
                                <option value="selesai" {{ $consultation->status === 'selesai' ? 'selected' : '' }}>Selesai / Deal</option>
                                <option value="dibatalkan" {{ $consultation->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan / Tidak Valid</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admin_notes" class="form-label">Catatan Admin (Hanya terlihat oleh internal):</label>
                        <textarea name="admin_notes" id="admin_notes" rows="3" class="form-control" placeholder="Contoh: Sudah dikirimi proposal via WA tanggal 07/09/2026...">{{ old('admin_notes', $consultation->admin_notes) }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                        <button type="submit" class="btn-primary">
                            <span>💾</span> Simpan Status &amp; Catatan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
