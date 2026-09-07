@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Paket Layanan' : 'Tambah Paket Layanan')
@section('breadcrumb', 'Paket Layanan')
@section('page_title', $isEdit ? 'Edit Paket Layanan' : 'Tambah Paket Layanan Baru')

@section('content')
    <div class="admin-card" style="max-width: 860px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">
                    <span>💼</span>
                    <span>{{ $isEdit ? 'Edit Paket Layanan' : 'Formulir Paket Layanan Baru' }}</span>
                </h2>
                <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                    Paket ini akan ditampilkan secara otomatis pada tabel harga dan layanan di landing page publik.
                </p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="btn-secondary btn-sm">
                ← Kembali ke Daftar
            </a>
        </div>

        <div class="admin-card-body">
            <form method="POST" action="{{ $isEdit ? route('admin.services.update', $service) : route('admin.services.store') }}">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="title" class="form-label">
                            <span>Nama Paket Layanan <span style="color: var(--admin-ruby);">*</span></span>
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control" 
                            value="{{ old('title', $service->title) }}" 
                            required 
                            placeholder="Contoh: Paket Scale-Up Bisnis"
                        >
                        @error('title')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="badge" class="form-label">
                            <span>Badge / Label Promosi (Opsional)</span>
                        </label>
                        <input 
                            type="text" 
                            id="badge" 
                            name="badge" 
                            class="form-control" 
                            value="{{ old('badge', $service->badge) }}" 
                            placeholder="Paling Diminati (Best Value), Paling Hemat, dsb."
                        >
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="price_note" class="form-label">
                            <span>Keterangan Harga / Biaya</span>
                        </label>
                        <input 
                            type="text" 
                            id="price_note" 
                            name="price_note" 
                            class="form-control" 
                            value="{{ old('price_note', $service->price_note) }}" 
                            placeholder="Contoh: Mulai Rp 2.5 Juta / bulan, atau Custom Sesuai Kebutuhan"
                        >
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="form-label">
                            <span>Nomor Urutan Tampil (1, 2, 3...)</span>
                        </label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            class="form-control" 
                            value="{{ old('sort_order', $service->sort_order ?: 1) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="subtitle" class="form-label">
                        <span>Deskripsi Singkat Target Paket</span>
                    </label>
                    <textarea 
                        id="subtitle" 
                        name="subtitle" 
                        rows="2" 
                        class="form-control" 
                        placeholder="Contoh: Dirancang untuk CV / PT berkembang dengan transaksi aktif yang membutuhkan kepatuhan pajak & laporan komprehensif..."
                    >{{ old('subtitle', $service->subtitle) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="features_text" class="form-label">
                        <span>Daftar Fitur Layanan (Tulis 1 baris per poin fitur)</span>
                    </label>
                    @php
                        $featVal = old('features_text', is_array($service->features) ? implode("\n", $service->features) : '');
                    @endphp
                    <textarea 
                        id="features_text" 
                        name="features_text" 
                        rows="6" 
                        class="form-control" 
                        placeholder="Pencatatan s.d. 500 transaksi / bulan&#10;Laporan Keuangan Standar SAK EMKM / EP&#10;Kompilasi SPT Masa PPh 21, 23, dan PPN&#10;Tax Planning & Review Kepatuhan Bulanan&#10;Pendampingan respons SP2DK dari DJP"
                    >{{ $featVal }}</textarea>
                    <div class="form-hint">💡 Setiap baris teks di atas akan otomatis tampil dengan ikon centang hijau di kartu harga website.</div>
                </div>

                <div class="form-group" style="background: var(--admin-navy-50); padding: 14px 18px; border-radius: var(--radius-md); border: 1px solid var(--admin-border);">
                    <label class="form-check" style="font-weight: 700; color: var(--admin-navy-950); display: inline-flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $service->is_featured) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--admin-blue);">
                        <span>⭐ Sorot sebagai Paket Unggulan / Paling Populer (Tampil lebih menonjol di beranda)</span>
                    </label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px; border-top: 1px solid var(--admin-border); padding-top: 20px;">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Tambah Paket Layanan' }}</span>
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
