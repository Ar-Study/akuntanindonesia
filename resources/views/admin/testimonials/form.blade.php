@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('breadcrumb', 'Testimoni Klien')
@section('page_title', $isEdit ? 'Edit Ulasan Klien' : 'Tambah Testimoni Baru')

@section('content')
    <div class="admin-card" style="max-width: 820px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">
                    <span>⭐</span>
                    <span>{{ $isEdit ? 'Edit Ulasan Klien' : 'Formulir Testimoni Baru' }}</span>
                </h2>
                <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                    Ulasan kepuasan klien ini akan tampil di bagian slider testimoni landing page sebagai bukti kredibilitas (*social proof*).
                </p>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary btn-sm">
                ← Kembali ke Testimoni
            </a>
        </div>

        <div class="admin-card-body">
            <form method="POST" action="{{ $isEdit ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="client_name" class="form-label">Nama Klien <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="client_name" 
                            name="client_name" 
                            class="form-control" 
                            value="{{ old('client_name', $testimonial->client_name) }}" 
                            required 
                            placeholder="Contoh: Budi Pratama, S.T."
                        >
                        @error('client_name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company" class="form-label">Nama Perusahaan / Bisnis</label>
                        <input 
                            type="text" 
                            id="company" 
                            name="company" 
                            class="form-control" 
                            value="{{ old('company', $testimonial->company) }}" 
                            placeholder="PT Digital Niaga Batam (E-Commerce)"
                        >
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="form-group">
                        <label for="role" class="form-label">Jabatan Klien</label>
                        <input 
                            type="text" 
                            id="role" 
                            name="role" 
                            class="form-control" 
                            value="{{ old('role', $testimonial->role ?: 'Owner / Founder') }}" 
                            placeholder="Owner, Founder, Direktur Keuangan"
                        >
                    </div>

                    <div class="form-group">
                        <label for="rating" class="form-label">Rating Kepuasan <span style="color: var(--admin-ruby);">*</span></label>
                        <select name="rating" id="rating" class="form-control" style="font-weight: 700; color: #D97706;">
                            <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang - Sangat Puas)</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang - Puas)</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang - Cukup)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="form-label">Urutan Tampil (1, 2, 3...)</label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            class="form-control" 
                            value="{{ old('sort_order', $testimonial->sort_order ?: 1) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="review" class="form-label">Kutipan / Ulasan Testimoni Klien <span style="color: var(--admin-ruby);">*</span></label>
                    <textarea 
                        id="review" 
                        name="review" 
                        rows="4" 
                        class="form-control" 
                        required 
                        placeholder="Contoh: Sejak bekerja sama dengan Akuntan.ID, semua pembukuan tersusun rapi tiap tanggal 5, laporan pajak selalu tepat waktu, dan cash flow bisnis jadi transparan..."
                    >{{ old('review', $testimonial->review) }}</textarea>
                    @error('review')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="background: var(--admin-navy-50); padding: 14px 18px; border-radius: var(--radius-md); border: 1px solid var(--admin-border);">
                    <label class="form-check" style="font-weight: 700; color: var(--admin-navy-950); display: inline-flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--admin-blue);">
                        <span>✓ Aktifkan dan Tampilkan di Landing Page Publik</span>
                    </label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px; border-top: 1px solid var(--admin-border); padding-top: 20px;">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Tambah Testimoni' }}</span>
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
