@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('page_title', $isEdit ? 'Edit Testimoni Klien' : 'Tambah Testimoni Baru')

@section('content')
    <div class="admin-card" style="max-width: 800px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">{{ $isEdit ? 'Edit Review Klien' : 'Form Testimoni Baru' }}</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Ulasan kepuasan klien yang memperkuat social proof Akuntan.ID.</p>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary btn-sm">
                ← Kembali
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
                            placeholder="Contoh: Budi Pratama"
                        >
                    </div>

                    <div class="form-group">
                        <label for="company" class="form-label">Nama Perusahaan / Bisnis</label>
                        <input 
                            type="text" 
                            id="company" 
                            name="company" 
                            class="form-control" 
                            value="{{ old('company', $testimonial->company) }}" 
                            placeholder="PT Digital Niaga Batam"
                        >
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="form-group">
                        <label for="role" class="form-label">Jabatan / Peran</label>
                        <input 
                            type="text" 
                            id="role" 
                            name="role" 
                            class="form-control" 
                            value="{{ old('role', $testimonial->role) }}" 
                            placeholder="Owner / Direktur / Founder"
                        >
                    </div>

                    <div class="form-group">
                        <label for="rating" class="form-label">Rating Bintang (1 - 5) <span style="color: var(--admin-ruby);">*</span></label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang)</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="form-label">Urutan Tampil</label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            class="form-control" 
                            value="{{ old('sort_order', $testimonial->sort_order) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="review" class="form-label">Kutipan / Ulasan Klien <span style="color: var(--admin-ruby);">*</span></label>
                    <textarea 
                        id="review" 
                        name="review" 
                        rows="4" 
                        class="form-control" 
                        required 
                        placeholder="Tuliskan ulasan testimoni kepuasan klien atas jasa pembukuan, pajak, atau konsultasi..."
                    >{{ old('review', $testimonial->review) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-check" style="font-weight: 700; color: var(--admin-navy-900); display: inline-flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} style="width: 18px; height: 18px;">
                        <span>Aktifkan dan Tampilkan di Landing Page Publik</span>
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
