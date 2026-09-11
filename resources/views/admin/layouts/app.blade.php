<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Dashboard') | Admin Portal Akuntan.ID</title>
    
    <!-- Favicon & Device Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/favicon-48x48.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Palette (Bright & Clean) */
            --admin-navy-950: #070B14;
            --admin-navy-900: #0F172A;
            --admin-navy-800: #1E293B;
            --admin-navy-700: #334155;
            --admin-navy-600: #475569;
            --admin-navy-400: #94A3B8;
            --admin-navy-200: #E2E8F0;
            --admin-navy-100: #F1F5F9;
            --admin-navy-50:  #F8FAFC;

            --admin-blue: #2563EB;
            --admin-blue-hover: #1D4ED8;
            --admin-blue-light: #EFF6FF;
            --admin-blue-border: #DBEAFE;

            --admin-ruby: #E11D48;
            --admin-ruby-dark: #BE123C;
            --admin-ruby-light: #FFF1F2;
            --admin-ruby-border: #FFE4E6;

            --admin-emerald: #059669;
            --admin-emerald-light: #ECFDF5;
            --admin-emerald-border: #A7F3D0;

            --admin-gold: #D97706;
            --admin-gold-light: #FFFBEB;
            --admin-gold-border: #FDE68A;

            --admin-cyan: #0891B2;
            --admin-cyan-light: #ECFEFF;

            --admin-border: #E2E8F0;
            --admin-sidebar-width: 245px;

            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 18px;
            --radius-full: 9999px;

            --transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #F8FAFC;
            color: var(--admin-navy-900);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            font-size: 0.88rem;
        }

        /* =========================================================================
           SIDEBAR STYLING (COMPACT & CLEAN)
           ========================================================================= */
        .admin-sidebar {
            width: var(--admin-sidebar-width);
            background: #FFFFFF;
            color: var(--admin-navy-800);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid var(--admin-border);
            box-shadow: 2px 0 12px rgba(15, 23, 42, 0.02);
        }

        .sidebar-brand {
            padding: 16px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid var(--admin-border);
            text-decoration: none;
            background: #FFFFFF;
        }

        .brand-logo-frame {
            width: 34px;
            height: 34px;
            border-radius: var(--radius-md);
            background: #FFFFFF;
            border: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
        }

        .brand-logo-frame img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .brand-title {
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--admin-navy-950);
            display: flex;
            align-items: center;
            gap: 2px;
            line-height: 1.2;
        }

        .brand-tld {
            color: var(--admin-ruby);
            font-weight: 900;
        }

        .brand-subtitle-badge {
            display: inline-block;
            font-size: 0.62rem;
            font-weight: 800;
            color: var(--admin-ruby);
            background: var(--admin-ruby-light);
            border: 1px solid var(--admin-ruby-border);
            padding: 1px 6px;
            border-radius: var(--radius-full);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 1px;
        }

        /* Navigation List */
        .sidebar-nav {
            padding: 12px 10px;
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #E2E8F0;
            border-radius: 4px;
        }

        .nav-section-title {
            font-size: 0.64rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--admin-navy-400);
            padding: 10px 10px 4px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-md);
            color: var(--admin-navy-700);
            text-decoration: none;
            font-size: 0.84rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .nav-item:hover {
            color: var(--admin-blue-hover);
            background: var(--admin-blue-light);
            transform: translateX(2px);
        }

        .nav-item.active {
            color: var(--admin-blue);
            background: var(--admin-blue-light);
            border-left: 3px solid var(--admin-blue);
            font-weight: 800;
        }

        .nav-item-icon-box {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            background: rgba(15, 23, 42, 0.03);
            transition: var(--transition);
        }

        .nav-item:hover .nav-item-icon-box,
        .nav-item.active .nav-item-icon-box {
            background: #FFFFFF;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }

        .nav-badge {
            margin-left: auto;
            background: var(--admin-ruby);
            color: #FFFFFF;
            font-size: 0.65rem;
            font-weight: 800;
            padding: 2px 7px;
            border-radius: var(--radius-full);
        }

        /* Sidebar Footer / User Profile */
        .sidebar-footer {
            padding: 12px 14px;
            border-top: 1px solid var(--admin-border);
            background: var(--admin-navy-50);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar-badge {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--admin-blue) 0%, #1D4ED8 100%);
            border: 2px solid #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #FFFFFF;
            font-size: 0.85rem;
            position: relative;
            flex-shrink: 0;
        }

        .online-dot {
            position: absolute;
            bottom: -1px;
            right: -1px;
            width: 8px;
            height: 8px;
            background-color: var(--admin-emerald);
            border: 1.5px solid #FFFFFF;
            border-radius: 50%;
        }

        .user-info {
            flex: 1;
            overflow: hidden;
        }

        .user-name {
            font-size: 0.78rem;
            font-weight: 800;
            color: var(--admin-navy-950);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 0.68rem;
            color: var(--admin-navy-400);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* =========================================================================
           MAIN CONTENT WRAPPER
           ========================================================================= */
        .admin-main {
            margin-left: var(--admin-sidebar-width);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--admin-sidebar-width));
        }

        /* Topbar Header (Compact White Glass) */
        .admin-topbar {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--admin-border);
            padding: 10px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 1px 4px rgba(15, 23, 42, 0.02);
            min-height: 54px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mobile-sidebar-toggle {
            display: none;
            background: var(--admin-navy-50);
            border: 1px solid var(--admin-border);
            border-radius: var(--radius-sm);
            width: 32px;
            height: 32px;
            font-size: 1.1rem;
            cursor: pointer;
            color: var(--admin-navy-800);
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .mobile-sidebar-toggle:hover {
            background: #FFFFFF;
            border-color: var(--admin-blue);
        }

        .topbar-breadcrumb-wrap {
            display: flex;
            flex-direction: column;
        }

        .topbar-breadcrumb {
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--admin-navy-400);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .topbar-page-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--admin-navy-950);
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-time-pill {
            display: flex;
            align-items: center;
            gap: 5px;
            background: var(--admin-navy-50);
            border: 1px solid var(--admin-border);
            padding: 5px 10px;
            border-radius: var(--radius-full);
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--admin-navy-700);
        }

        .btn-view-site {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--admin-blue);
            background: var(--admin-blue-light);
            border: 1px solid var(--admin-blue-border);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-view-site:hover {
            background: var(--admin-blue);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--admin-ruby);
            background: var(--admin-ruby-light);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--admin-ruby-border);
            cursor: pointer;
            transition: var(--transition);
            font-family: inherit;
        }

        .btn-logout:hover {
            background: var(--admin-ruby);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        /* Content Canvas */
        .admin-content {
            padding: 20px 24px;
            flex: 1;
        }

        /* =========================================================================
           GLOBAL UI COMPONENTS (COMPACT & MODERN)
           ========================================================================= */
        /* Flash Alerts */
        .admin-alert {
            padding: 10px 14px;
            border-radius: var(--radius-md);
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.82rem;
            font-weight: 600;
            animation: fadeIn 0.2s ease;
        }

        .alert-success {
            background: var(--admin-emerald-light);
            color: #065F46;
            border: 1px solid var(--admin-emerald-border);
        }

        .alert-error {
            background: var(--admin-ruby-light);
            color: #9F1239;
            border: 1px solid var(--admin-ruby-border);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Compact Admin Card */
        .admin-card {
            background: #FFFFFF;
            border-radius: var(--radius-lg);
            border: 1px solid var(--admin-border);
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.02);
            overflow: hidden;
            margin-bottom: 18px;
        }

        .admin-card-header {
            padding: 14px 18px;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #FFFFFF;
            flex-wrap: wrap;
            gap: 10px;
        }

        .admin-card-title {
            font-size: 0.98rem;
            font-weight: 800;
            color: var(--admin-navy-950);
            letter-spacing: -0.015em;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .admin-card-body {
            padding: 18px;
        }

        /* Buttons */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, var(--admin-blue) 0%, #1D4ED8 100%);
            color: #FFFFFF;
            font-size: 0.8rem;
            font-weight: 800;
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
            font-family: inherit;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFFFFF;
            color: var(--admin-navy-700);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 7px 12px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            border: 1px solid var(--admin-border);
            cursor: pointer;
            transition: var(--transition);
            font-family: inherit;
        }

        .btn-secondary:hover {
            background: var(--admin-navy-50);
            color: var(--admin-navy-950);
            border-color: #CBD5E1;
            transform: translateY(-1px);
        }

        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: var(--admin-ruby-light);
            color: var(--admin-ruby);
            font-size: 0.76rem;
            font-weight: 700;
            padding: 5px 10px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--admin-ruby-border);
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            font-family: inherit;
        }

        .btn-danger:hover {
            background: var(--admin-ruby);
            color: #FFFFFF;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.75rem;
            border-radius: var(--radius-sm);
        }

        /* Compact Table Styling */
        .admin-table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .admin-table-responsive::-webkit-scrollbar {
            height: 5px;
        }

        .admin-table-responsive::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.84rem;
        }

        .admin-table th {
            background: var(--admin-navy-50);
            padding: 10px 14px;
            font-weight: 800;
            color: var(--admin-navy-700);
            border-bottom: 1.5px solid var(--admin-border);
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .admin-table td {
            padding: 10px 14px;
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
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 800;
        }

        .status-baru {
            background: var(--admin-blue-light);
            color: #1D4ED8;
            border: 1px solid var(--admin-blue-border);
        }

        .status-dihubungi {
            background: var(--admin-gold-light);
            color: #B45309;
            border: 1px solid var(--admin-gold-border);
        }

        .status-selesai {
            background: var(--admin-emerald-light);
            color: #047857;
            border: 1px solid var(--admin-emerald-border);
        }

        .status-dibatalkan {
            background: var(--admin-navy-100);
            color: var(--admin-navy-600);
            border: 1px solid var(--admin-navy-200);
        }

        /* Forms (Compact) */
        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--admin-navy-800);
            margin-bottom: 5px;
        }

        .form-control, .form-select, .form-textarea {
            width: 100%;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--admin-border);
            font-family: inherit;
            font-size: 0.86rem;
            color: var(--admin-navy-900);
            background: #FFFFFF;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--admin-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-hint {
            font-size: 0.72rem;
            color: var(--admin-navy-400);
            margin-top: 4px;
        }

        .form-error {
            font-size: 0.74rem;
            color: var(--admin-ruby);
            margin-top: 4px;
            font-weight: 600;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .form-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        /* Mobile Backdrop Overlay */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: 90;
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .sidebar-backdrop.active {
            display: block;
            opacity: 1;
        }

        /* =========================================================================
           RESPONSIVE BREAKPOINTS
           ========================================================================= */
        @media (max-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.open {
                transform: translateX(0);
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.12);
            }

            .admin-main {
                margin-left: 0;
                width: 100%;
            }

            .mobile-sidebar-toggle {
                display: inline-flex;
            }

            .admin-topbar {
                padding: 8px 16px;
            }

            .topbar-time-pill {
                display: none;
            }

            .admin-content {
                padding: 14px 12px;
            }

            .form-grid-2, .form-grid-3 {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Mobile Backdrop Overlay -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar" id="adminSidebar">
        <!-- Brand Header -->
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <div class="brand-logo-frame">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Akuntan.ID">
            </div>
            <div>
                <span class="brand-title">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                <span class="brand-subtitle-badge">Admin Backoffice</span>
            </div>
        </a>

        <!-- Nav Items -->
        <nav class="sidebar-nav">
            <div class="nav-section-title">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-item-icon-box">📊</span>
                <span>Dashboard</span>
            </a>

            <div class="nav-section-title">Konten &amp; Klien</div>
            <a href="{{ route('admin.consultations.index') }}" class="nav-item {{ request()->routeIs('admin.consultations.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">📥</span>
                <span>Konsultasi</span>
                @php
                    $pendingLeads = \App\Models\Consultation::where('status', 'baru')->count();
                @endphp
                @if($pendingLeads > 0)
                    <span class="nav-badge">{{ $pendingLeads }} Baru</span>
                @endif
            </a>

            <a href="{{ route('admin.articles.index') }}" class="nav-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">📰</span>
                <span>Artikel</span>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">🏷️</span>
                <span>Kategori Artikel</span>
            </a>

            <a href="{{ route('admin.authors.index') }}" class="nav-item {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">👤</span>
                <span>Penulis &amp; Ahli</span>
            </a>

            <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">💼</span>
                <span>Paket Layanan</span>
            </a>

            <div class="nav-section-title">Interaksi &amp; Review</div>
            <a href="{{ route('admin.faqs.index') }}" class="nav-item {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">❓</span>
                <span>Kelola FAQ</span>
            </a>

            <a href="{{ route('admin.testimonials.index') }}" class="nav-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <span class="nav-item-icon-box">⭐</span>
                <span>Testimoni Klien</span>
            </a>
        </nav>

        <!-- Sidebar User Footer -->
        <div class="sidebar-footer">
            <div class="user-avatar-badge">
                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                <span class="online-dot" title="Status Online"></span>
            </div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                <div class="user-role">{{ Auth::user()->email ?? 'admin@akuntanindonesia.id' }}</div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-main">
        <!-- Topbar Header -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <button type="button" class="mobile-sidebar-toggle" id="toggleSidebarBtn" aria-label="Buka Menu Navigasi">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
                <h1 class="topbar-page-title">@yield('page_title', 'Dashboard')</h1>
            </div>

            <div class="topbar-actions">
                <div class="topbar-time-pill" id="liveClock" title="Waktu Server">
                    <span>🗓️</span>
                    <span>{{ date('d M Y') }}</span>
                </div>

                <a href="{{ route('home') }}" target="_blank" class="btn-view-site" title="Buka website publik di tab baru">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    <span>Lihat Web</span>
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout" title="Keluar dari sesi administrator">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="admin-content">
            <!-- Flash Message Alerts -->
            @if(session('success'))
                <div class="admin-alert alert-success" role="alert">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="admin-alert alert-error" role="alert">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="admin-alert alert-error" role="alert">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <div>
                        <strong>Terjadi beberapa kesalahan:</strong>
                        <ul style="margin-top: 3px; padding-left: 16px;">
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

    <!-- Mobile Drawer & Interactive Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggleSidebarBtn');
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');

            function openSidebar() {
                if (sidebar) sidebar.classList.add('open');
                if (backdrop) backdrop.classList.add('active');
            }

            function closeSidebar() {
                if (sidebar) sidebar.classList.remove('open');
                if (backdrop) backdrop.classList.remove('active');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    if (sidebar.classList.contains('open')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            if (backdrop) {
                backdrop.addEventListener('click', closeSidebar);
            }

            // Live Time Update
            const liveClock = document.getElementById('liveClock');
            if (liveClock) {
                function updateClock() {
                    const now = new Date();
                    const options = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };
                    liveClock.innerHTML = '<span>🗓️</span> <span>' + now.toLocaleDateString('id-ID', options) + ' WIB</span>';
                }
                updateClock();
                setInterval(updateClock, 60000);
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
