@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit FAQ' : 'Tambah FAQ')
@section('breadcrumb', 'Kelola FAQ')
@section('page_title', $isEdit ? 'Edit Tanya Jawab (FAQ)' : 'Tambah Tanya Jawab Baru')

@section('content')
    <div class="admin-card" style="max-width: 820px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">
                    <span>❓</span>
                    <span>{{ $isEdit ? 'Edit Tanya Jawab' : 'Formulir FAQ Baru' }}</span>
                </h2>
                <p style="font-size: 0.8rem; color: var(--admin-navy-600); margin-top: 2px;">
                    Tanya jawab ini akan muncul di accordion FAQ pada landing page untuk mengedukasi calon klien.
                </p>
            </div>
            <a href="{{ route('admin.faqs.index') }}" class="btn-secondary btn-sm">
                ← Kembali ke FAQ
            </a>
        </div>

        <div class="admin-card-body">
            <form method="POST" action="{{ $isEdit ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="category" class="form-label">Kategori FAQ <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="category" 
                            name="category" 
                            class="form-control" 
                            value="{{ old('category', $faq->category ?: 'Layanan') }}" 
                            required 
                            list="faqCategories"
                            placeholder="Legalitas, Jangkauan, Perpajakan, Layanan"
                        >
                        <datalist id="faqCategories">
                            <option value="Legalitas & Izin">
                            <option value="Jangkauan Layanan">
                            <option value="Perpajakan & Sengketa">
                            <option value="Layanan & Pembukuan">
                            <option value="Keamanan Data">
                        </datalist>
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="form-label">Nomor Urutan Tampil (1, 2, 3...)</label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            class="form-control" 
                            value="{{ old('sort_order', $faq->sort_order ?: 1) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="question" class="form-label">Pertanyaan yang Sering Diajukan <span style="color: var(--admin-ruby);">*</span></label>
                    <input 
                        type="text" 
                        id="question" 
                        name="question" 
                        class="form-control" 
                        value="{{ old('question', $faq->question) }}" 
                        required 
                        placeholder="Contoh: Apakah Akuntan Indonesia .ID memiliki izin resmi dari Kementerian Keuangan?"
                    >
                    @error('question')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="answer" class="form-label">Jawaban Informatif &amp; Terpercaya <span style="color: var(--admin-ruby);">*</span></label>
                    <textarea 
                        id="answer" 
                        name="answer" 
                        rows="5" 
                        class="form-control" 
                        required 
                        placeholder="Tuliskan jawaban yang ramah, profesional, dan meyakinkan calon klien..."
                    >{{ old('answer', $faq->answer) }}</textarea>
                    @error('answer')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px; border-top: 1px solid var(--admin-border); padding-top: 20px;">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Tambah FAQ' }}</span>
                    </button>
                    <a href="{{ route('admin.faqs.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
