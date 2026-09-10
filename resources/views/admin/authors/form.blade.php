@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Penulis' : 'Tambah Penulis Baru')
@section('breadcrumb', 'Penulis')
@section('page_title', $isEdit ? 'Edit Data Penulis' : 'Tambah Penulis Baru')

@section('content')
<div style="max-width: 720px;">
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">
                <span>👤</span>
                <span>{{ $isEdit ? 'Edit Data Penulis' : 'Form Penulis Baru' }}</span>
            </h2>
            <a href="{{ route('admin.authors.index') }}" class="btn-secondary btn-sm">
                ← Kembali ke Daftar
            </a>
        </div>

        <form method="POST" action="{{ $isEdit ? route('admin.authors.update', $author) : route('admin.authors.store') }}" enctype="multipart/form-data">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="admin-card-body">
                <!-- Name & Role -->
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <span>Nama Lengkap &amp; Gelar <span style="color: var(--admin-ruby);">*</span></span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control" 
                            value="{{ old('name', $author->name) }}" 
                            required 
                            placeholder="Contoh: Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA"
                            autofocus
                        >
                        @error('name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">
                            <span>Jabatan / Keahlian</span>
                        </label>
                        <input 
                            type="text" 
                            id="role" 
                            name="role" 
                            class="form-control" 
                            value="{{ old('role', $author->role) }}" 
                            placeholder="Contoh: Akuntan Berpraktek & Konsultan Pajak Berizin Kemenkeu RI"
                        >
                        @error('role')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Avatar Upload & Preview -->
                <div class="form-group" style="background: var(--admin-navy-50); padding: 14px; border-radius: var(--radius-md); border: 1px solid var(--admin-border); margin-bottom: 16px;">
                    <label class="form-label" style="margin-bottom: 8px;">
                        <span>Foto Profil Penulis</span>
                        <span style="font-size: 0.72rem; color: var(--admin-navy-400);">PNG, JPG, JPEG, WEBP (Maks 2MB)</span>
                    </label>

                    <div style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
                        <div style="width: 64px; height: 64px; border-radius: 50%; overflow: hidden; border: 2px solid #FFFFFF; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background: #FFFFFF; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                            <img id="avatarPreviewImg" src="{{ $author->avatar_url }}" alt="Avatar Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <div style="flex: 1; min-width: 200px;">
                            <input 
                                type="file" 
                                id="avatar_file" 
                                name="avatar_file" 
                                class="form-control" 
                                accept="image/png, image/jpeg, image/jpg, image/webp"
                                onchange="previewAuthorAvatar(event)"
                            >
                            <div class="form-hint">
                                Jika belum ada foto yang diunggah, sistem otomatis menggunakan <strong>Maskot 3D Si Akuntan</strong> sebagai foto profil.
                            </div>
                        </div>

                        @if($isEdit && $author->avatar)
                            <div style="width: 100%; margin-top: 6px;">
                                <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.76rem; color: var(--admin-ruby); cursor: pointer;">
                                    <input type="checkbox" name="remove_avatar" value="1">
                                    <span>Hapus foto saat ini (kembali ke maskot default)</span>
                                </label>
                            </div>
                        @endif
                    </div>
                    @error('avatar_file')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bio / Deskripsi -->
                <div class="form-group">
                    <label for="bio" class="form-label">
                        <span>Biografi &amp; Kredensial Singkat</span>
                    </label>
                    <textarea 
                        id="bio" 
                        name="bio" 
                        rows="4" 
                        class="form-control" 
                        placeholder="Uraikan pengalaman profesional, izin register, dan spesialisasi penulis yang akan ditampilkan pada box profil di bawah setiap artikel..."
                    >{{ old('bio', $author->bio) }}</textarea>
                    <div class="form-hint">Biografi ini akan tampil di bagian bawah artikel bacaan (/berita/{slug}).</div>
                    @error('bio')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact & Status -->
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Kontak (Opsional)</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-control" 
                            value="{{ old('email', $author->email) }}" 
                            placeholder="penulis@akuntanindonesia.id"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">No. Telepon / WhatsApp (Opsional)</label>
                        <input 
                            type="text" 
                            id="phone" 
                            name="phone" 
                            class="form-control" 
                            value="{{ old('phone', $author->phone) }}" 
                            placeholder="0819..."
                        >
                    </div>
                </div>

                <!-- Active Checkbox -->
                <div style="margin-top: 10px;">
                    <label style="display: inline-flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.84rem; font-weight: 700; color: var(--admin-navy-900);">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $author->is_active) ? 'checked' : '' }} style="width: 16px; height: 16px;">
                        <span>Penulis Aktif (Dapat dipilih saat membuat artikel)</span>
                    </label>
                </div>
            </div>

            <div style="padding: 14px 18px; background: var(--admin-navy-50); border-top: 1px solid var(--admin-border); display: flex; gap: 10px; justify-content: flex-end;">
                <a href="{{ route('admin.authors.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <span>💾</span>
                    <span>{{ $isEdit ? 'Simpan Perubahan' : 'Simpan Penulis' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewAuthorAvatar(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreviewImg').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
