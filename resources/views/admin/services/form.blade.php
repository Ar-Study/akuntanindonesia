@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Paket Layanan' : 'Tambah Paket Layanan')
@section('page_title', $isEdit ? 'Edit Paket Layanan' : 'Tambah Paket Layanan Baru')

@section('content')
    <div class="admin-card" style="max-width: 850px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">{{ $isEdit ? 'Edit Paket' : 'Form Paket Baru' }}</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Paket ini akan ditampilkan di kartu tabel harga landing page.</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="btn-secondary btn-sm">
                ← Kembali
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
                        <label for="title" class="form-label">Nama Paket <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control" 
                            value="{{ old('title', $service->title) }}" 
                            required 
                            placeholder="Contoh: Paket Scale-Up Bisnis"
                        >
                    </div>

                    <div class="form-group">
                        <label for="badge" class="form-label">Badge / Pita Promosi</label>
                        <input 
                            type="text" 
                            id="badge" 
                            name="badge" 
                            class="form-control" 
                            value="{{ old('badge', $service->badge) }}" 
                            placeholder="Paling Diminati (Best Value)"
                        >
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="price_note" class="form-label">Keterangan Biaya / Harga</label>
                        <input 
                            type="text" 
                            id="price_note" 
                            name="price_note" 
                            class="form-control" 
                            value="{{ old('price_note', $service->price_note) }}" 
                            placeholder="Mulai Rp 2.5 Juta / bulan"
                        >
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="form-label">Nomor Urutan Tampil</label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            class="form-control" 
                            value="{{ old('sort_order', $service->sort_order) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="subtitle" class="form-label">Deskripsi Singkat Target Paket</label>
                    <textarea 
                        id="subtitle" 
                        name="subtitle" 
                        rows="2" 
                        class="form-control" 
                        placeholder="Contoh: Dirancang untuk CV / PT berkembang dengan transaksi aktif..."
                    >{{ old('subtitle', $service->subtitle) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="features_text" class="form-label">Daftar Fitur &amp; Cakupan Layanan (1 baris per poin)</label>
                    @php
                        $featVal = old('features_text', is_array($service->features) ? implode("\n", $service->features) : '');
                    @endphp
                    <textarea 
                        id="features_text" 
                        name="features_text" 
                        rows="6" 
                        class="form-control" 
                        placeholder="Pencatatan s.d. 500 transaksi / bulan&#10;Laporan Keuangan Standar SAK EMKM&#10;Kompilasi SPT Masa PPh 21, 23, dan PPN&#10;Tax Planning & Review Kepatuhan"
                    >{{ $featVal }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-check" style="font-weight: 700; color: var(--admin-navy-900); display: inline-flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $service->is_featured) ? 'checked' : '' }} style="width: 18px; height: 18px;">
                        <span>Sorot sebagai Paket Unggulan / Paling Populer (Tampil lebih menonjol)</span>
                    </label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px; border-top: 1px solid var(--admin-border); padding-top: 20px;">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Tambah Paket' }}</span>
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
