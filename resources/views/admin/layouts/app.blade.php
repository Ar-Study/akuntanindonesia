<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Dashboard') | Admin Portal Akuntan.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --admin-navy-950: #080D1A;
            --admin-navy-900: #0F172A;
            --admin-navy-800: #1E293B;
            --admin-navy-700: #334155;
            --admin-navy-600: #475569;
            --admin-navy-100: #F1F5F9;
            --admin-border: #E2E8F0;
            --admin-border-dark: #334155;
            --admin-ruby: #E11D48;
            --admin-ruby-dark: #BE123C;
            --admin-blue: #2563EB;
            --admin-blue-hover: #1D4ED8;
            --admin-emerald: #059669;
            --admin-gold: #D97706;
            --admin-sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #F8FAFC;
            color: #1E293B;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: var(--admin-sidebar-width);
            background: var(--admin-navy-950);
            color: #F8FAFC;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-logo-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--admin-ruby) 0%, #9F1239 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
        }

        .brand-title {
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #FFFFFF;
        }

        .brand-subtitle {
            display: block;
            font-size: 0.7rem;
            font-weight: 600;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .sidebar-nav {
            padding: 20px 12px;
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav-section-title {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748B;
            padding: 12px 12px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 8px;
            color: #94A3B8;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.06);
        }

        .nav-item.active {
            color: #FFFFFF;
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.2) 0%, rgba(37, 99, 235, 0.05) 100%);
            border-left: 3px solid var(--admin-blue);
            font-weight: 700;
        }

        .nav-item-icon {
            font-size: 1.15rem;
            width: 22px;
            text-align: center;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--admin-ruby);
            color: #FFFFFF;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 999px;
        }

        .sidebar-footer {
            padding: 16px 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar-badge {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--admin-navy-800);
            border: 2px solid var(--admin-ruby);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #FFFFFF;
            font-size: 0.95rem;
        }

        .user-info {
            flex: 1;
            overflow: hidden;
        }

        .user-name {
            font-size: 0.82rem;
            font-weight: 700;
            color: #F8FAFC;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 0.7rem;
            color: #94A3B8;
        }

        /* Main Content Wrapper */
        .admin-main {
            margin-left: var(--admin-sidebar-width);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--admin-sidebar-width));
        }

        .admin-topbar {
            background: #FFFFFF;
            border-bottom: 1px solid var(--admin-border);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .mobile-sidebar-toggle {
            display: none;
            background: transparent;
            border: none;
            font-size: 1.4rem;
            cursor: pointer;
            color: var(--admin-navy-800);
        }

        .topbar-page-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--admin-navy-950);
            letter-spacing: -0.02em;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .btn-view-site {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--admin-navy-700);
            background: var(--admin-navy-100);
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid var(--admin-border);
        }

        .btn-view-site:hover {
            background: #E2E8F0;
            color: var(--admin-navy-950);
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--admin-ruby);
            background: #FFF1F2;
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid #FFE4E6;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background: var(--admin-ruby);
            color: #FFFFFF;
        }

        .admin-content {
            padding: 32px;
            flex: 1;
        }

        /* Flash Alerts */
        .admin-alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            animation: fadeIn 0.3s ease;
        }

        .alert-success {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }

        .alert-error {
            background: #FFF1F2;
            color: #9F1239;
            border: 1px solid #FECDD3;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Common Admin Card */
        .admin-card {
            background: #FFFFFF;
            border-radius: 12px;
            border: 1px solid var(--admin-border);
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .admin-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #FFFFFF;
            flex-wrap: wrap;
            gap: 12px;
        }

        .admin-card-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--admin-navy-950);
        }

        .admin-card-body {
            padding: 24px;
        }

        /* Buttons */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--admin-blue);
            color: #FFFFFF;
            font-size: 0.875rem;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: var(--admin-blue-hover);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #FFFFFF;
            color: var(--admin-navy-700);
            font-size: 0.875rem;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid var(--admin-border);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: #F1F5F9;
            color: var(--admin-navy-950);
        }

        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF1F2;
            color: var(--admin-ruby);
            font-size: 0.82rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid #FFE4E6;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: var(--admin-ruby);
            color: #FFFFFF;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 6px;
        }

        /* Common Table Styling */
        .admin-table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.88rem;
        }

        .admin-table th {
            background: #F8FAFC;
            padding: 12px 18px;
            font-weight: 700;
            color: var(--admin-navy-700);
            border-bottom: 1px solid var(--admin-border);
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .admin-table td {
            padding: 14px 18px;
            border-bottom: 1px solid var(--admin-border);
            color: var(--admin-navy-900);
            vertical-align: middle;
        }

        .admin-table tr:last-child td {
            border-bottom: none;
        }

        .admin-table tr:hover td {
            background: #F8FAFC;
        }

        /* Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.74rem;
            font-weight: 700;
        }

        .status-baru {
            background: #EFF6FF;
            color: #1D4ED8;
            border: 1px solid #BFDBFE;
        }

        .status-dihubungi {
            background: #FFFBEB;
            color: #B45309;
            border: 1px solid #FDE68A;
        }

        .status-selesai {
            background: #ECFDF5;
            color: #047857;
            border: 1px solid #A7F3D0;
        }

        .status-dibatalkan {
            background: #F1F5F9;
            color: #64748B;
            border: 1px solid #CBD5E1;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.84rem;
            font-weight: 700;
            color: var(--admin-navy-900);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1.5px solid var(--admin-border);
            font-family: inherit;
            font-size: 0.9rem;
            color: var(--admin-navy-900);
            background: #FFFFFF;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--admin-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .form-hint {
            font-size: 0.75rem;
            color: #64748B;
            margin-top: 6px;
        }

        .form-error {
            font-size: 0.78rem;
            color: var(--admin-ruby);
            margin-top: 6px;
            font-weight: 600;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* Mobile Drawer */
        @media (max-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.open {
                transform: translateX(0);
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
            }

            .admin-main {
                margin-left: 0;
                width: 100%;
            }

            .mobile-sidebar-toggle {
                display: block;
            }

            .admin-content {
                padding: 20px 16px;
            }

            .form-grid-2, .form-grid-3 {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <div class="brand-logo-icon">⚖️</div>
            <div>
                <span class="brand-title">Akuntan.ID</span>
                <span class="brand-subtitle">Portal Administrator</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-title">Ringkasan</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-item-icon">📊</span>
                <span>Dashboard</span>
            </a>

            <div class="nav-section-title">Manajemen Konten</div>
            <a href="{{ route('admin.articles.index') }}" class="nav-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                <span class="nav-item-icon">📰</span>
                <span>Edukasi &amp; Berita</span>
            </a>

            <a href="{{ route('admin.consultations.index') }}" class="nav-item {{ request()->routeIs('admin.consultations.*') ? 'active' : '' }}">
                <span class="nav-item-icon">📥</span>
                <span>Inbox Konsultasi</span>
                @php
                    $pendingLeads = \App\Models\Consultation::where('status', 'baru')->count();
                @endphp
                @if($pendingLeads > 0)
                    <span class="nav-badge">{{ $pendingLeads }}</span>
                @endif
            </a>

            <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <span class="nav-item-icon">💼</span>
                <span>Paket Layanan</span>
            </a>

            <div class="nav-section-title">Interaksi &amp; Bukti</div>
            <a href="{{ route('admin.faqs.index') }}" class="nav-item {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <span class="nav-item-icon">❓</span>
                <span>Kelola FAQ</span>
            </a>

            <a href="{{ route('admin.testimonials.index') }}" class="nav-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <span class="nav-item-icon">⭐</span>
                <span>Testimoni Klien</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-avatar-badge">
                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                <div class="user-role">{{ Auth::user()->email ?? 'admin@akuntanindonesia.id' }}</div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-left">
                <button type="button" class="mobile-sidebar-toggle" id="toggleSidebarBtn" aria-label="Buka Menu">
                    ☰
                </button>
                <h1 class="topbar-page-title">@yield('page_title', 'Dashboard')</h1>
            </div>

            <div class="topbar-actions">
                <a href="{{ route('home') }}" target="_blank" class="btn-view-site" title="Buka website publik di tab baru">
                    <span>🌐</span>
                    <span>Lihat Web Publik</span>
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout" title="Keluar dari sesi administrator">
                        <span>🚪</span>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </header>

        <main class="admin-content">
            @if(session('success'))
                <div class="admin-alert alert-success">
                    <span>✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="admin-alert alert-error">
                    <span>⚠</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="admin-alert alert-error">
                    <span>⚠</span>
                    <div>
                        <strong>Terjadi beberapa kesalahan input:</strong>
                        <ul style="margin-top: 4px; padding-left: 20px;">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleSidebarBtn');
        const sidebar = document.getElementById('adminSidebar');
        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
