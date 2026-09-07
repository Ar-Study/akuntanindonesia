@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit FAQ' : 'Tambah FAQ')
@section('page_title', $isEdit ? 'Edit Pertanyaan (FAQ)' : 'Tambah FAQ Baru')

@section('content')
    <div class="admin-card" style="max-width: 800px;">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">{{ $isEdit ? 'Edit Tanya Jawab' : 'Form FAQ Baru' }}</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">Tanya jawab ini akan muncul di accordion FAQ landing page.</p>
            </div>
            <a href="{{ route('admin.faqs.index') }}" class="btn-secondary btn-sm">
                ← Kembali
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
                        <label for="category" class="form-label">Kategori FAQ</label>
                        <input 
                            type="text" 
                            id="category" 
                            name="category" 
                            class="form-control" 
                            value="{{ old('category', $faq->category) }}" 
                            required 
                            placeholder="Legalitas, Jangkauan, Perpajakan, Layanan"
                        >
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="form-label">Nomor Urutan</label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            class="form-control" 
                            value="{{ old('sort_order', $faq->sort_order) }}" 
                            min="0"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="question" class="form-label">Pertanyaan <span style="color: var(--admin-ruby);">*</span></label>
                    <input 
                        type="text" 
                        id="question" 
                        name="question" 
                        class="form-control" 
                        value="{{ old('question', $faq->question) }}" 
                        required 
                        placeholder="Contoh: Apakah Akuntan Indonesia .ID memiliki izin resmi Kemenkeu?"
                    >
                </div>

                <div class="form-group">
                    <label for="answer" class="form-label">Jawaban Lengkap &amp; Jelas <span style="color: var(--admin-ruby);">*</span></label>
                    <textarea 
                        id="answer" 
                        name="answer" 
                        rows="5" 
                        class="form-control" 
                        required 
                        placeholder="Tuliskan jawaban informatif yang menenangkan dan meyakinkan calon klien..."
                    >{{ old('answer', $faq->answer) }}</textarea>
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
