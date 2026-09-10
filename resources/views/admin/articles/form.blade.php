@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Artikel' : 'Tulis Artikel Baru')
@section('breadcrumb', 'Artikel')
@section('page_title', $isEdit ? 'Edit Artikel' : 'Tulis Artikel Baru')

@section('styles')
<!-- Quill.js WYSIWYG Editor Stylesheets -->
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
    /* Two-Column Form Layout (Main Content + Sidebar Settings) */
    .article-form-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 24px;
        align-items: start;
    }

    /* Quill WYSIWYG Custom Polish */
    .ql-toolbar.ql-snow {
        border: 1.5px solid var(--admin-border);
        border-top-left-radius: var(--radius-md);
        border-top-right-radius: var(--radius-md);
        background: var(--admin-navy-50);
        padding: 10px 12px;
        font-family: inherit;
    }

    .ql-container.ql-snow {
        border: 1.5px solid var(--admin-border);
        border-top: none;
        border-bottom-left-radius: var(--radius-md);
        border-bottom-right-radius: var(--radius-md);
        background: #FFFFFF;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.95rem;
        min-height: 380px;
    }

    .ql-editor {
        min-height: 380px;
        line-height: 1.7;
        color: var(--admin-navy-900);
        padding: 18px 20px;
    }

    .ql-editor h2 {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--admin-navy-950);
        margin: 20px 0 10px;
    }

    .ql-editor h3 {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--admin-navy-900);
        margin: 16px 0 8px;
    }

    .ql-editor blockquote {
        border-left: 4px solid var(--admin-ruby);
        padding-left: 14px;
        color: var(--admin-navy-700);
        font-style: italic;
        background: var(--admin-ruby-light);
        padding: 10px 14px;
        border-radius: 4px;
    }

    /* Quick Callout Inserter Button */
    .btn-quick-callout {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.76rem;
        font-weight: 700;
        color: var(--admin-ruby);
        background: var(--admin-ruby-light);
        border: 1px solid var(--admin-ruby-border);
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        margin-top: 6px;
    }

    .btn-quick-callout:hover {
        background: var(--admin-ruby);
        color: #FFFFFF;
    }

    /* Slug Preview Pill */
    .slug-preview-box {
        display: flex;
        align-items: center;
        gap: 6px;
        background: var(--admin-navy-50);
        border: 1px solid var(--admin-border);
        padding: 8px 12px;
        border-radius: var(--radius-sm);
        font-size: 0.78rem;
        color: var(--admin-navy-600);
        margin-top: 6px;
        word-break: break-all;
    }

    .slug-badge {
        font-weight: 800;
        color: var(--admin-blue);
    }

    /* Form Section Dividers & Cards */
    .sidebar-settings-card {
        background: #FFFFFF;
        border: 1.5px solid var(--admin-border);
        border-radius: var(--radius-lg);
        box-shadow: 0 4px 16px rgba(15, 23, 42, 0.03);
        padding: 20px;
        margin-bottom: 20px;
    }

    .sidebar-card-title {
        font-size: 0.92rem;
        font-weight: 800;
        color: var(--admin-navy-950);
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Publish Switch Toggle */
    .publish-switch-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 14px;
        background: var(--admin-navy-50);
        border: 1px solid var(--admin-border);
        border-radius: var(--radius-md);
        margin-bottom: 16px;
    }

    .switch-label-title {
        font-size: 0.84rem;
        font-weight: 800;
        color: var(--admin-navy-950);
        display: block;
    }

    .switch-label-sub {
        font-size: 0.72rem;
        color: var(--admin-navy-600);
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #CBD5E1;
        transition: .3s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .3s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: var(--admin-emerald);
    }

    input:checked + .slider:before {
        transform: translateX(20px);
    }

    @media (max-width: 1024px) {
        .article-form-layout {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
    <form method="POST" action="{{ $isEdit ? route('admin.articles.update', $article) : route('admin.articles.store') }}" id="articleForm">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="article-form-layout">
            
            <!-- ============================================================= -->
            <!-- LEFT COLUMN: MAIN CONTENT & WYSIWYG EDITOR -->
            <!-- ============================================================= -->
            <div>
                <!-- 1. Title & URL Slug Card -->
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h2 class="admin-card-title">
                            <span>✍️</span>
                            <span>{{ $isEdit ? 'Edit Konten Artikel' : 'Tulis Artikel Baru' }}</span>
                        </h2>
                        <a href="{{ route('admin.articles.index') }}" class="btn-secondary btn-sm">
                            ← Kembali ke Daftar
                        </a>
                    </div>

                    <div class="admin-card-body">
                        <!-- Article Title -->
                        <div class="form-group">
                            <label for="title" class="form-label">
                                <span>Judul Artikel Edukasi <span style="color: var(--admin-ruby);">*</span></span>
                            </label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                class="form-control" 
                                value="{{ old('title', $article->title) }}" 
                                required 
                                placeholder="Contoh: Panduan Coretax DJP Terbaru bagi Pelaku UMKM dan Perusahaan"
                                style="font-size: 1.05rem; font-weight: 700;"
                                autocomplete="off"
                            >
                            @error('title')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slug / URL Permalinks -->
                        <div class="form-group">
                            <label for="slug" class="form-label">
                                <span>URL Link (Slug Web)</span>
                                <button type="button" class="btn-secondary btn-sm" id="btnAutoSlug" style="padding: 2px 8px; font-size: 0.72rem;">
                                    ⚡ Buat Otomatis dari Judul
                                </button>
                            </label>
                            <input 
                                type="text" 
                                id="slug" 
                                name="slug" 
                                class="form-control" 
                                value="{{ old('slug', $article->slug) }}" 
                                placeholder="panduan-coretax-djp-terbaru"
                            >
                            <div class="slug-preview-box">
                                <span>🔗 Link Publik:</span>
                                <span class="slug-badge">{{ url('/berita') }}/<span id="slugPreview">{{ old('slug', $article->slug) ?: 'judul-artikel' }}</span></span>
                            </div>
                            @error('slug')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Short Excerpt / Ringkasan -->
                        <div class="form-group">
                            <label for="excerpt" class="form-label">
                                <span>Ringkasan Singkat (Tampil di kartu berita & Google Preview) <span style="color: var(--admin-ruby);">*</span></span>
                            </label>
                            <textarea 
                                id="excerpt" 
                                name="excerpt" 
                                rows="2" 
                                class="form-control" 
                                required 
                                placeholder="Tuliskan 1-2 kalimat ringkasan inti topik untuk menarik minat pembaca..."
                            >{{ old('excerpt', $article->excerpt) }}</textarea>
                            <div class="form-hint">Maksimal 600 karakter ringkas & jelas.</div>
                            @error('excerpt')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- 2. Full WYSIWYG Content Editor Card -->
                <div class="admin-card">
                    <div class="admin-card-header">
                        <div>
                            <h3 class="admin-card-title">
                                <span>📄</span>
                                <span>Isi Lengkap Artikel (WYSIWYG Editor) <span style="color: var(--admin-ruby);">*</span></span>
                            </h3>
                            <p style="font-size: 0.78rem; color: var(--admin-navy-600); margin-top: 2px;">
                                Ketik dan format artikel langsung seperti di Microsoft Word / Google Docs (Heading, Tebal, Miring, Poin, Kutipan).
                            </p>
                        </div>
                        <button type="button" class="btn-quick-callout" id="btnInsertCallout" title="Sisipkan kotak sorotan tips akuntan">
                            <span>💡</span>
                            <span>Sisipkan Kotak Tips</span>
                        </button>
                    </div>

                    <div class="admin-card-body" style="padding: 18px 24px;">
                        <!-- Hidden Real Textarea for Form Submit Sync -->
                        <textarea id="content" name="content" style="display: none;">{{ old('content', $article->content) }}</textarea>

                        <!-- Quill Visual Editor Mount Point -->
                        <div id="quillEditor">{!! old('content', $article->content) !!}</div>

                        @error('content')
                            <div class="form-error" style="margin-top: 8px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- 3. Key Highlights Box -->
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h3 class="admin-card-title">
                            <span>⭐</span>
                            <span>Poin-Poin Kunci Wawasan (Key Highlights)</span>
                        </h3>
                    </div>
                    <div class="admin-card-body">
                        @php
                            $highlightsVal = old('highlights_text', is_array($article->highlights) ? implode("\n", $article->highlights) : '');
                        @endphp
                        <textarea 
                            id="highlights_text" 
                            name="highlights_text" 
                            rows="4" 
                            class="form-control" 
                            placeholder="Tuliskan 1 poin per baris, contoh:&#10;Integrasi penuh 21 proses bisnis DJP ke satu portal&#10;NPWP 16 digit berbasis NIK wajib tervalidasi&#10;Rekonsiliasi mutasi bank harian sebelum pelaporan"
                        >{{ $highlightsVal }}</textarea>
                        <div class="form-hint">Poin-poin ini akan ditampilkan di kotak sorotan pada bagian atas artikel publik.</div>
                    </div>
                </div>
            </div>

            <!-- ============================================================= -->
            <!-- RIGHT COLUMN: SIDEBAR SETTINGS (EASY CONTROLS FOR BEGINNERS) -->
            <!-- ============================================================= -->
            <div>
                <!-- Save / Publish Action Box -->
                <div class="sidebar-settings-card">
                    <div class="sidebar-card-title">
                        <span>🚀</span>
                        <span>Publikasi &amp; Simpan</span>
                    </div>

                    <!-- Publish Toggle Switch -->
                    <div class="publish-switch-wrap">
                        <div>
                            <span class="switch-label-title">Status Tayang</span>
                            <span class="switch-label-sub" id="publishStatusLabel">
                                {{ old('is_published', $article->is_published) ? 'Langsung Tayang' : 'Disimpan sbg Draf' }}
                            </span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="is_published" id="isPublishedInput" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 12px; font-size: 0.95rem;">
                        <span>💾</span>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Terbitkan Artikel' }}</span>
                    </button>

                    <a href="{{ route('admin.articles.index') }}" class="btn-secondary" style="width: 100%; justify-content: center; margin-top: 8px;">
                        Batal
                    </a>
                </div>

                <!-- Category & Meta Info -->
                <div class="sidebar-settings-card">
                    <div class="sidebar-card-title">
                        <span>🏷️</span>
                        <span>Kategori &amp; Waktu</span>
                    </div>

                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                            <label for="category_id" class="form-label" style="margin-bottom: 0;">
                                Kategori <span style="color: var(--admin-ruby);">*</span>
                            </label>
                            <a href="{{ route('admin.categories.create') }}" target="_blank" style="font-size: 0.72rem; color: var(--admin-blue); text-decoration: none; font-weight: 700;">
                                + Tambah Kategori
                            </a>
                        </div>
                        <select name="category_id" id="category_id" class="form-control" onchange="syncCategoryName(this)">
                            @php
                                $selectedCategoryId = old('category_id', $article->category_id);
                                $selectedCategoryName = old('category', $article->category);
                            @endphp
                            @foreach($categories as $cat)
                                <option 
                                    value="{{ $cat->id }}" 
                                    data-name="{{ $cat->name }}"
                                    {{ ($selectedCategoryId == $cat->id || $selectedCategoryName == $cat->name) ? 'selected' : '' }}
                                >
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category" id="category_name_hidden" value="{{ old('category', $article->category ?: ($categories->first()?->name ?? 'Regulasi Pajak')) }}">
                        @error('category_id')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="read_time" class="form-label">Estimasi Waktu Baca <span style="color: var(--admin-ruby);">*</span></label>
                        <input 
                            type="text" 
                            id="read_time" 
                            name="read_time" 
                            class="form-control" 
                            value="{{ old('read_time', $article->read_time ?: '4 menit baca') }}" 
                            required 
                            placeholder="4 menit baca"
                        >
                    </div>

                    <div class="form-group">
                        <label for="date_formatted" class="form-label">Tanggal Tayang (Opsional)</label>
                        <input 
                            type="text" 
                            id="date_formatted" 
                            name="date_formatted" 
                            class="form-control" 
                            value="{{ old('date_formatted', $article->date_formatted ?: date('d F Y')) }}" 
                            placeholder="{{ date('d F Y') }}"
                        >
                    </div>
                </div>

                <!-- Author & Tags Box -->
                <div class="sidebar-settings-card">
                    <div class="sidebar-card-title">
                        <span>👤</span>
                        <span>Penulis &amp; Tag</span>
                    </div>

                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                            <label for="author_id" class="form-label" style="margin-bottom: 0;">
                                Pilih Penulis <span style="color: var(--admin-ruby);">*</span>
                            </label>
                            <a href="{{ route('admin.authors.create') }}" target="_blank" style="font-size: 0.72rem; color: var(--admin-blue); text-decoration: none; font-weight: 700;">
                                + Kelola Penulis
                            </a>
                        </div>
                        <select name="author_id" id="author_id" class="form-control" onchange="syncAuthorDetails(this)">
                            @php
                                $selectedAuthorId = old('author_id', $article->author_id);
                                $selectedAuthorName = old('author', $article->author);
                            @endphp
                            @foreach($authors as $auth)
                                <option 
                                    value="{{ $auth->id }}" 
                                    data-name="{{ $auth->name }}"
                                    data-role="{{ $auth->role }}"
                                    {{ ($selectedAuthorId == $auth->id || $selectedAuthorName == $auth->name) ? 'selected' : '' }}
                                >
                                    {{ $auth->name }} ({{ $auth->role ?: 'Penulis' }})
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="author" id="author_name_hidden" value="{{ old('author', $article->author ?: ($authors->first()?->name ?? 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA')) }}">
                        <input type="hidden" name="author_role" id="author_role_hidden" value="{{ old('author_role', $article->author_role ?: ($authors->first()?->role ?? 'Akuntan Berpraktek & Konsultan Pajak Berizin di Kementerian Keuangan')) }}">
                        @error('author_id')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tags_text" class="form-label">Tag / Kata Kunci (Pisahkan dg koma)</label>
                        @php
                            $tagsVal = old('tags_text', is_array($article->tags) ? implode(', ', $article->tags) : '');
                        @endphp
                        <input 
                            type="text" 
                            id="tags_text" 
                            name="tags_text" 
                            class="form-control" 
                            value="{{ $tagsVal }}" 
                            placeholder="Coretax, Pajak, Pembukuan, Batam"
                        >
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('scripts')
<!-- Quill.js WYSIWYG Editor Script -->
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Quill.js with Rich Formatting Toolbar
        const toolbarOptions = [
            [{ 'header': [2, 3, 4, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'align': [] }],
            ['blockquote', 'code-block'],
            ['link', 'image'],
            ['clean']
        ];

        const quill = new Quill('#quillEditor', {
            theme: 'snow',
            placeholder: 'Tuliskan pembahasan artikel Anda secara lengkap di sini. Gunakan heading, poin, atau penebalan untuk memudahkan pembaca...',
            modules: {
                toolbar: toolbarOptions
            }
        });

        const hiddenTextarea = document.getElementById('content');
        const articleForm = document.getElementById('articleForm');

        // Sync Quill HTML content to Hidden Textarea on change and on submit
        quill.on('text-change', function () {
            hiddenTextarea.value = quill.root.innerHTML;
        });

        if (articleForm) {
            articleForm.addEventListener('submit', function () {
                hiddenTextarea.value = quill.root.innerHTML;
            });
        }

        // Quick Insert Callout Box
        const btnInsertCallout = document.getElementById('btnInsertCallout');
        if (btnInsertCallout) {
            btnInsertCallout.addEventListener('click', function () {
                const range = quill.getSelection(true);
                const calloutHTML = `<blockquote><strong>💡 Catatan Penting Akuntan:</strong> Tuliskan wawasan atau tips penting regulasi di sini...</blockquote><p><br></p>`;
                quill.clipboard.dangerouslyPasteHTML(range.index, calloutHTML);
            });
        }

        // Auto Slug Generator Helper
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const slugPreview = document.getElementById('slugPreview');
        const btnAutoSlug = document.getElementById('btnAutoSlug');

        function generateSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/[\s\W-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        if (btnAutoSlug && titleInput && slugInput) {
            btnAutoSlug.addEventListener('click', function () {
                if (titleInput.value) {
                    slugInput.value = generateSlug(titleInput.value);
                    if (slugPreview) slugPreview.textContent = slugInput.value;
                }
            });
        }

        if (slugInput) {
            slugInput.addEventListener('input', function () {
                if (slugPreview) {
                    slugPreview.textContent = slugInput.value || 'judul-artikel';
                }
            });
        }

        // Toggle Switch Label Update
        const isPublishedInput = document.getElementById('isPublishedInput');
        const publishStatusLabel = document.getElementById('publishStatusLabel');
        if (isPublishedInput && publishStatusLabel) {
            isPublishedInput.addEventListener('change', function () {
                publishStatusLabel.textContent = isPublishedInput.checked ? 'Langsung Tayang' : 'Disimpan sbg Draf';
            });
        }
    });

    function syncCategoryName(select) {
        const selectedOption = select.options[select.selectedIndex];
        const categoryNameHidden = document.getElementById('category_name_hidden');
        if (selectedOption && categoryNameHidden) {
            categoryNameHidden.value = selectedOption.getAttribute('data-name') || selectedOption.text;
        }
    }

    function syncAuthorDetails(select) {
        const selectedOption = select.options[select.selectedIndex];
        const authorNameHidden = document.getElementById('author_name_hidden');
        const authorRoleHidden = document.getElementById('author_role_hidden');
        if (selectedOption) {
            if (authorNameHidden) authorNameHidden.value = selectedOption.getAttribute('data-name') || '';
            if (authorRoleHidden) authorRoleHidden.value = selectedOption.getAttribute('data-role') || '';
        }
    }
</script>
@endsection
