@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Kategori' : 'Tambah Kategori Baru')
@section('breadcrumb', 'Kategori')
@section('page_title', $isEdit ? 'Edit Kategori Artikel' : 'Tambah Kategori Artikel Baru')

@section('content')
<div style="max-width: 650px;">
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">
                <span>🏷️</span>
                <span>{{ $isEdit ? 'Edit Data Kategori' : 'Form Kategori Baru' }}</span>
            </h2>
            <a href="{{ route('admin.categories.index') }}" class="btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <form method="POST" action="{{ $isEdit ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="admin-card-body">
                <div class="form-group">
                    <label for="name" class="form-label">
                        <span>Nama Kategori <span style="color: var(--admin-ruby);">*</span></span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control" 
                        value="{{ old('name', $category->name) }}" 
                        required 
                        placeholder="Contoh: Regulasi Pajak, Tips Akuntansi, dll"
                        autofocus
                    >
                    @error('name')
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
                        value="{{ old('slug', $category->slug) }}" 
                        placeholder="regulasi-pajak"
                    >
                    <div class="form-hint">Biarkan kosong untuk membuat slug otomatis dari nama kategori.</div>
                    @error('slug')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">
                        <span>Deskripsi Singkat (Opsional)</span>
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="3" 
                        class="form-control" 
                        placeholder="Uraian singkat fokus topik kategori ini..."
                    >{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="padding: 14px 18px; background: var(--admin-navy-50); border-top: 1px solid var(--admin-border); display: flex; gap: 10px; justify-content: flex-end;">
                <a href="{{ route('admin.categories.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <span>💾</span>
                    <span>{{ $isEdit ? 'Simpan Perubahan' : 'Simpan Kategori' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
