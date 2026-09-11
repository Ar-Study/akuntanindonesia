@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Layanan' : 'Tambah Layanan Baru')
@section('page_title', $isEdit ? 'Edit Layanan Halaman Depan' : 'Tambah Layanan Halaman Depan')

@section('content')
    <div class="admin-card" style="max-width: 880px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">
                    <span>💼</span>
                    <span>{{ $isEdit ? 'Edit Kartu Layanan: ' . $service->title : 'Formulir Layanan Baru' }}</span>
                </h2>
                <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                    Layanan ini akan langsung ditampilkan pada Bento Grid interaktif Section 4 di halaman depan.
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
                            <span>Nama / Judul Layanan <span style="color: var(--admin-ruby);">*</span></span>
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control" 
                            value="{{ old('title', $service->title) }}" 
                            required 
                            placeholder="Contoh: Pembukuan (Bookkeeping)"
                        >
                        @error('title')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug" class="form-label">
                            <span>Slug URL (Opsional)</span>
                        </label>
                        <input 
                            type="text" 
                            id="slug" 
                            name="slug" 
                            class="form-control" 
                            value="{{ old('slug', $service->slug) }}" 
                            placeholder="pembukuan-bookkeeping (otomatis jika kosong)"
                        >
                        @error('slug')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="form-group">
                        <label for="category" class="form-label">
                            <span>Kategori Filter <span style="color: var(--admin-ruby);">*</span></span>
                        </label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="pembukuan" {{ old('category', $service->category) === 'pembukuan' ? 'selected' : '' }}>📊 Pembukuan &amp; Laporan SAK</option>
                            <option value="pajak" {{ old('category', $service->category) === 'pajak' ? 'selected' : '' }}>⚖️ Pajak &amp; Kuasa Hukum</option>
                            <option value="manajemen" {{ old('category', $service->category) === 'manajemen' ? 'selected' : '' }}>📈 Manajemen &amp; GCG</option>
                            <option value="sistem" {{ old('category', $service->category) === 'sistem' ? 'selected' : '' }}>💻 Sistem Cloud</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color" class="form-label">
                            <span>Warna Tema Bento <span style="color: var(--admin-ruby);">*</span></span>
                        </label>
                        <select id="color" name="color" class="form-select" required>
                            <option value="ruby" {{ old('color', $service->color ?: 'ruby') === 'ruby' ? 'selected' : '' }}>🔴 Ruby (Merah Elegan)</option>
                            <option value="indigo" {{ old('color', $service->color) === 'indigo' ? 'selected' : '' }}>🔵 Indigo (Biru Profesional)</option>
                            <option value="gold" {{ old('color', $service->color) === 'gold' ? 'selected' : '' }}>🟡 Gold (Amber Keemasan)</option>
                            <option value="emerald" {{ old('color', $service->color) === 'emerald' ? 'selected' : '' }}>🟢 Emerald (Hijau Stabil)</option>
                            <option value="cyan" {{ old('color', $service->color) === 'cyan' ? 'selected' : '' }}>💠 Cyan (Biru Modern)</option>
                            <option value="violet" {{ old('color', $service->color) === 'violet' ? 'selected' : '' }}>🟣 Violet (Ungu Eksklusif)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="icon" class="form-label">
                            <span>Icon Emoji</span>
                        </label>
                        <input 
                            type="text" 
                            id="icon" 
                            name="icon" 
                            class="form-control" 
                            value="{{ old('icon', $service->icon ?: '📊') }}" 
                            placeholder="Contoh: 📊, 📑, ⚖️, 📈, 💻"
                            style="text-align: center; font-size: 1.1rem;"
                        >
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="badge" class="form-label">
                            <span>Badge / Label Keunggulan (Opsional)</span>
                        </label>
                        <input 
                            type="text" 
                            id="badge" 
                            name="badge" 
                            class="form-control" 
                            value="{{ old('badge', $service->badge) }}" 
                            placeholder="Contoh: Pondasi Bisnis Rapi, Standar SAK EMKM, Litigasi Resmi"
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
                    <label for="desc" class="form-label">
                        <span>Deskripsi Lengkap Layanan <span style="color: var(--admin-ruby);">*</span></span>
                    </label>
                    <textarea 
                        id="desc" 
                        name="desc" 
                        rows="4" 
                        class="form-textarea" 
                        required
                        placeholder="Jelaskan manfaat dan rincian yang didapatkan klien dari layanan ini..."
                    >{{ old('desc', $service->effective_description) }}</textarea>
                    @error('desc')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="points_text" class="form-label">
                        <span>Poin-Poin Checklist Layanan (Tulis 1 baris per poin)</span>
                    </label>
                    @php
                        $pointsArr = $service->effective_points;
                        $pointsVal = old('points_text', is_array($pointsArr) ? implode("\n", $pointsArr) : '');
                    @endphp
                    <textarea 
                        id="points_text" 
                        name="points_text" 
                        rows="5" 
                        class="form-textarea" 
                        placeholder="Pencatatan transaksi harian & rekonsiliasi mutasi bank&#10;Tracking arus kas (cash flow) masuk & keluar real-time&#10;Pemisahan rekening pribadi dan operasional bisnis&#10;Pengarsipan bukti transaksi digital terstruktur"
                    >{{ $pointsVal }}</textarea>
                    <div class="form-hint">Setiap baris baru akan otomatis menjadi satu butir checklist centang pada kartu layanan.</div>
                </div>

                <div class="form-group">
                    <label for="mascot_tip" class="form-label">
                        <span>Tips Singkat Karakter Maskot (Mascot Tip)</span>
                    </label>
                    <input 
                        type="text" 
                        id="mascot_tip" 
                        name="mascot_tip" 
                        class="form-control" 
                        value="{{ old('mascot_tip', $service->mascot_tip) }}" 
                        placeholder="Contoh: Catatan rapi bikin bisnis bebas bocor!"
                    >
                    <div class="form-hint">Kotak tip kecil berikon lampu ide dan avatar maskot di kartu layanan.</div>
                </div>

                <div style="background: var(--admin-navy-50); padding: 14px 16px; border-radius: var(--radius-md); border: 1px solid var(--admin-border); margin: 20px 0; display: flex; gap: 24px; flex-wrap: wrap;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.86rem; font-weight: 700; color: var(--admin-navy-800);">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1" 
                            {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                            style="width: 16px; height: 16px; accent-color: var(--admin-emerald);"
                        >
                        <span>Tampilkan di Halaman Depan (Aktif)</span>
                    </label>

                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.86rem; font-weight: 700; color: var(--admin-navy-800);">
                        <input 
                            type="checkbox" 
                            name="is_featured" 
                            value="1" 
                            {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}
                            style="width: 16px; height: 16px; accent-color: var(--admin-ruby);"
                        >
                        <span>Sorot Sebagai Layanan Unggulan (Lebar Bento Span 2)</span>
                    </label>
                </div>

                <div style="display: flex; gap: 10px; justify-content: flex-end;">
                    <a href="{{ route('admin.services.index') }}" class="btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Terbitkan Layanan' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
