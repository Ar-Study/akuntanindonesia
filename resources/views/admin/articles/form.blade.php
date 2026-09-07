@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Artikel' : 'Tulis Artikel Baru')
@section('page_title', $isEdit ? 'Edit Artikel Edukasi' : 'Tulis Artikel Edukasi Baru')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h2 class="admin-card-title">{{ $isEdit ? 'Perbarui Data Artikel' : 'Formulir Penulisan Artikel' }}</h2>
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 2px;">
                    Pastikan informasi akurat dan mencantumkan wawasan regulasi yang bermanfaat bagi klien.
                </p>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="btn-secondary btn-sm">
                ← Kembali ke Daftar
            </a>
        </div>

        <div class="admin-card-body">
            <form method="POST" action="{{ $isEdit ? route('admin.articles.update', $article) : route('admin.articles.store') }}">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title" class="form-label">Judul Artikel <span style="color: var(--admin-ruby);">*</span></label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        class="form-control" 
                        value="{{ old('title', $article->title) }}" 
                        required 
                        placeholder="Contoh: Panduan Coretax DJP Terbaru bagi Pelaku Usaha"
                    >
                    @error('title')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="slug" class="form-label">URL Slug (Boleh dikosongkan untuk auto-generate)</label>
                        <input 
                            type="text" 
                            id="slug" 
                            name="slug" 
                            class="form-control" 
                            value="{{ old('slug', $article->slug) }}" 
                            placeholder="panduan-coretax-djp-terbaru"
                        >
                        <div class="form-hint">Akan menjadi: /berita/<strong>{slug}</strong></div>
                        @error('slug')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Kategori <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="category" 
                            name="category" 
                            class="form-control" 
                            value="{{ old('category', $article->category) }}" 
                            required 
                            list="categoriesList"
                            placeholder="Regulasi Pajak, Tips Akuntansi, dsb."
                        >
                        <datalist id="categoriesList">
                            <option value="Regulasi Pajak">
                            <option value="Tips Akuntansi">
                            <option value="Perpajakan UMKM">
                            <option value="Litigasi & Solusi">
                            <option value="Standar Keuangan">
                        </datalist>
                        @error('category')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="form-group">
                        <label for="author" class="form-label">Nama Penulis <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="author" 
                            name="author" 
                            class="form-control" 
                            value="{{ old('author', $article->author) }}" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="author_role" class="form-label">Peran / Jabatan Penulis</label>
                        <input 
                            type="text" 
                            id="author_role" 
                            name="author_role" 
                            class="form-control" 
                            value="{{ old('author_role', $article->author_role) }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="read_time" class="form-label">Estimasi Waktu Baca <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="read_time" 
                            name="read_time" 
                            class="form-control" 
                            value="{{ old('read_time', $article->read_time) }}" 
                            required 
                            placeholder="5 menit baca"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="excerpt" class="form-label">Ringkasan Singkat (Excerpt) <span style="color: var(--admin-ruby);">*</span></label>
                    <textarea 
                        id="excerpt" 
                        name="excerpt" 
                        rows="2" 
                        class="form-control" 
                        required 
                        placeholder="Ringkasan 1-2 kalimat yang tampil di kartu berita dan meta description..."
                    >{{ old('excerpt', $article->excerpt) }}</textarea>
                    @error('excerpt')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="highlights_text" class="form-label">Poin Kunci Wawasan (Tulis 1 poin per baris)</label>
                    @php
                        $highlightsVal = old('highlights_text', is_array($article->highlights) ? implode("\n", $article->highlights) : '');
                    @endphp
                    <textarea 
                        id="highlights_text" 
                        name="highlights_text" 
                        rows="4" 
                        class="form-control" 
                        placeholder="Integrasi penuh 21 proses bisnis DJP&#10;NPWP 16 digit berbasis NIK&#10;Pentingnya rekonsiliasi berkala"
                    >{{ $highlightsVal }}</textarea>
                    <div class="form-hint">Poin-poin ini akan muncul di kotak ringkasan atas halaman detail artikel.</div>
                </div>

                <div class="form-group">
                    <label for="content" class="form-label">Isi Lengkap Artikel (Mendukung Format HTML / Paragraf) <span style="color: var(--admin-ruby);">*</span></label>
                    <textarea 
                        id="content" 
                        name="content" 
                        rows="12" 
                        class="form-control" 
                        required 
                        style="font-family: 'JetBrains Mono', monospace; font-size: 0.85rem;"
                    >{{ old('content', $article->content) }}</textarea>
                    <div class="form-hint">Gunakan tag seperti &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt; untuk menstrukturkan artikel secara elegan.</div>
                    @error('content')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="tags_text" class="form-label">Tag / Kata Kunci (Pisahkan dengan koma)</label>
                        @php
                            $tagsVal = old('tags_text', is_array($article->tags) ? implode(', ', $article->tags) : '');
                        @endphp
                        <input 
                            type="text" 
                            id="tags_text" 
                            name="tags_text" 
                            class="form-control" 
                            value="{{ $tagsVal }}" 
                            placeholder="Coretax, Regulasi Pajak, UMKM, Pembukuan"
                        >
                    </div>

                    <div class="form-group">
                        <label for="date_formatted" class="form-label">Tanggal Tayang (Opsional)</label>
                        <input 
                            type="text" 
                            id="date_formatted" 
                            name="date_formatted" 
                            class="form-control" 
                            value="{{ old('date_formatted', $article->date_formatted) }}" 
                            placeholder="04 September 2026"
                        >
                    </div>
                </div>

                <div class="form-group" style="margin-top: 10px;">
                    <label class="form-check" style="color: var(--admin-navy-900); font-weight: 700; display: inline-flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }} style="width: 18px; height: 18px;">
                        <span>Publikasikan Artikel Ini (Langsung tayang di website publik)</span>
                    </label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 32px; border-top: 1px solid var(--admin-border); padding-top: 24px;">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Terbitkan Artikel' }}</span>
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
