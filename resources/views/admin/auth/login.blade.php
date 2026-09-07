<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login Administrator | Akuntan Indonesia .ID</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Brand Primary & Accents */
            --color-navy-950: #070B14;
            --color-navy-900: #0F172A;
            --color-navy-800: #1E293B;
            --color-navy-700: #334155;
            --color-navy-600: #475569;
            --color-navy-400: #94A3B8;
            --color-navy-200: #E2E8F0;
            --color-navy-100: #F1F5F9;
            --color-navy-50:  #F8FAFC;

            --color-ruby-600: #E11D48;
            --color-ruby-500: #F43F5E;
            --color-ruby-700: #BE123C;
            --color-ruby-900: #881337;
            --color-ruby-100: #FFE4E6;
            --color-ruby-50:  #FFF1F2;

            --color-blue-600: #2563EB;
            --color-blue-500: #3B82F6;
            --color-blue-700: #1D4ED8;
            --color-blue-100: #DBEAFE;
            --color-blue-50:  #EFF6FF;
            
            --color-cyan-600: #0891B2;
            --color-cyan-500: #06B6D4;
            --color-cyan-100: #CFFAFE;
            --color-cyan-50:  #ECFEFF;
            
            --color-emerald-600: #059669;
            --color-emerald-500: #10B981;
            --color-emerald-50:  #ECFDF5;
            
            --color-amber-500: #F59E0B;
            --color-amber-50:  #FFFBEB;

            /* Surface & Borders (Bright Theme) */
            --bg-body: #F8FAFC;
            --bg-card: #FFFFFF;
            --border-light: #E2E8F0;
            --border-subtle: rgba(226, 232, 240, 0.9);

            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --radius-xl: 26px;
            --radius-full: 9999px;

            --transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-body);
            background-image: 
                radial-gradient(circle at 10% 15%, rgba(37, 99, 235, 0.09) 0%, transparent 45%),
                radial-gradient(circle at 90% 85%, rgba(225, 29, 72, 0.08) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(6, 182, 212, 0.05) 0%, transparent 60%);
            color: var(--color-navy-900);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px 16px;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient Light Grid Pattern */
        .bg-grid-overlay {
            position: fixed;
            inset: 0;
            background-image: 
                linear-gradient(rgba(15, 23, 42, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15, 23, 42, 0.035) 1px, transparent 1px);
            background-size: 32px 32px;
            background-position: center center;
            mask-image: radial-gradient(circle at center, rgba(0, 0, 0, 1) 50%, transparent 90%);
            -webkit-mask-image: radial-gradient(circle at center, rgba(0, 0, 0, 1) 50%, transparent 90%);
            pointer-events: none;
            z-index: 0;
        }

        /* Ambient Animated Vibrant Mesh Gradient Orbs (Soft Light Mode) */
        .mesh-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
            opacity: 0.6;
            z-index: 0;
            animation: orbFloat 14s infinite alternate ease-in-out;
        }

        .orb-ruby {
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(244, 63, 94, 0.22) 0%, transparent 70%);
            top: -120px;
            left: -100px;
            animation-duration: 16s;
        }

        .orb-blue {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.22) 0%, transparent 70%);
            bottom: -140px;
            right: -120px;
            animation-duration: 18s;
            animation-delay: -4s;
        }

        .orb-cyan {
            width: 360px;
            height: 360px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.18) 0%, transparent 70%);
            top: 40%;
            left: 20%;
            animation-duration: 20s;
            animation-delay: -8s;
        }

        .orb-amber {
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
            top: 15%;
            right: 18%;
            animation-duration: 15s;
            animation-delay: -6s;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -25px) scale(1.06); }
            100% { transform: translate(-25px, 35px) scale(0.96); }
        }

        /* Main Container */
        .login-wrapper {
            width: 100%;
            max-width: 1020px;
            position: relative;
            z-index: 1;
        }

        /* Panoramic Card (Bright Theme) */
        .login-card-panoramic {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1.5px solid rgba(255, 255, 255, 0.8);
            border-radius: var(--radius-xl);
            box-shadow: 
                0 25px 60px -15px rgba(15, 23, 42, 0.12),
                0 0 35px rgba(37, 99, 235, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.05);
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            overflow: hidden;
            position: relative;
        }

        /* Card Top Rainbow Accent Strip */
        .login-card-panoramic::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, 
                var(--color-ruby-600) 0%, 
                var(--color-blue-600) 50%, 
                var(--color-cyan-500) 100%
            );
            z-index: 2;
        }

        /* =========================================================================
           LEFT COLUMN: MASCOT & BRAND PRESTIGE STAGE (BRIGHT)
           ========================================================================= */
        .mascot-stage-col {
            background: linear-gradient(155deg, #F0F6FF 0%, #FFF5F7 60%, #F8FAFC 100%);
            border-right: 1px solid var(--border-light);
            padding: 38px 34px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        /* Radial Glow Behind Mascot */
        .mascot-stage-col::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 320px;
            height: 200px;
            background: radial-gradient(ellipse, rgba(37, 99, 235, 0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* Brand Header */
        .brand-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .brand-logo-frame {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: #FFFFFF;
            border: 1px solid rgba(226, 232, 240, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.08);
        }

        .brand-logo-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .brand-info {
            display: flex;
            flex-direction: column;
        }

        .brand-title-wrap {
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--color-navy-900);
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .brand-tld {
            color: var(--color-ruby-600);
            font-weight: 900;
        }

        .brand-tagline {
            font-size: 0.75rem;
            color: var(--color-navy-600);
            font-weight: 600;
            letter-spacing: 0.01em;
        }

        /* 3D Mascot Pedestal Area */
        .mascot-pedestal-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto 0;
            position: relative;
            z-index: 1;
            padding: 8px 0 14px;
        }

        .mascot-avatar-container {
            position: relative;
            width: 180px;
            height: 215px;
            margin-bottom: 18px;
            cursor: pointer;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .mascot-avatar-container:hover {
            transform: translateY(-4px) scale(1.03);
        }

        /* Ring Light Around Mascot */
        .mascot-ring-glow {
            position: absolute;
            inset: -6px;
            border-radius: 24px;
            background: linear-gradient(135deg, var(--color-ruby-500), var(--color-blue-500), var(--color-cyan-500));
            opacity: 0.55;
            filter: blur(8px);
        }

        .mascot-img-wrap {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
            background: radial-gradient(circle at 50% 30%, #EFF6FF 0%, #DBEAFE 100%);
            border: 3px solid #FFFFFF;
            box-shadow: 
                0 14px 30px rgba(15, 23, 42, 0.1),
                inset 0 0 15px rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px;
        }

        .mascot-display-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center bottom;
            transition: all 0.35s ease;
            filter: drop-shadow(0 6px 12px rgba(15, 23, 42, 0.12));
        }

        /* Mascot Active Badge Pill */
        .mascot-badge-pill {
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--color-ruby-600) 0%, #BE123C 100%);
            color: #FFFFFF;
            font-size: 0.68rem;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            white-space: nowrap;
            box-shadow: 0 4px 14px rgba(225, 29, 72, 0.35);
            border: 1.5px solid rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .badge-sparkle {
            animation: sparklePulse 1.5s infinite alternate ease-in-out;
        }

        @keyframes sparklePulse {
            0% { transform: scale(0.9); opacity: 0.7; }
            100% { transform: scale(1.2); opacity: 1; }
        }

        /* Interactive Speech Bubble (Bright) */
        .mascot-speech-bubble {
            background: #FFFFFF;
            color: var(--color-navy-900);
            border-radius: var(--radius-md);
            padding: 12px 16px;
            position: relative;
            width: 100%;
            max-width: 370px;
            box-shadow: 0 10px 25px -4px rgba(15, 23, 42, 0.08), 0 2px 6px rgba(0,0,0,0.04);
            border: 1.5px solid var(--color-ruby-100);
            display: flex;
            align-items: flex-start;
            gap: 10px;
            transition: var(--transition);
        }

        .mascot-speech-bubble::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            border-width: 0 8px 8px 8px;
            border-style: solid;
            border-color: transparent transparent #FFFFFF transparent;
        }

        .bubble-wave-icon {
            font-size: 1.25rem;
            line-height: 1;
            animation: waveMotion 2.2s infinite ease-in-out;
        }

        @keyframes waveMotion {
            0%, 100% { transform: rotate(0deg); }
            20%, 60% { transform: rotate(16deg); }
            40%, 80% { transform: rotate(-14deg); }
        }

        .bubble-content {
            flex: 1;
        }

        .bubble-speaker {
            display: block;
            font-size: 0.72rem;
            font-weight: 800;
            color: var(--color-ruby-700);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 2px;
        }

        .bubble-message-text {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--color-navy-800);
            line-height: 1.35;
            transition: opacity 0.2s ease;
        }

        /* Mascot Mood Selector Chips */
        .mascot-pose-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 14px;
        }

        .pose-btn {
            background: #FFFFFF;
            border: 1px solid var(--border-light);
            color: var(--color-navy-700);
            font-size: 0.68rem;
            font-weight: 700;
            padding: 5px 11px;
            border-radius: var(--radius-full);
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .pose-btn:hover {
            background: var(--color-blue-50);
            border-color: var(--color-blue-500);
            color: var(--color-blue-700);
            transform: translateY(-1px);
        }

        .pose-btn.active {
            background: var(--color-blue-600);
            border-color: var(--color-blue-600);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transform: translateY(-1px);
        }

        /* Stage Bottom Trust Badges */
        .stage-footer-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-top: 18px;
            position: relative;
            z-index: 1;
        }

        .trust-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--color-navy-800);
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid var(--border-light);
            padding: 5px 10px;
            border-radius: var(--radius-sm);
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
        }

        /* Live Status Pill */
        .status-live-pill {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--color-emerald-600);
            margin-top: 12px;
            text-align: center;
        }

        .status-dot-pulse {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: var(--color-emerald-500);
            box-shadow: 0 0 8px var(--color-emerald-500);
            animation: pulseStatus 2s infinite ease-in-out;
        }

        @keyframes pulseStatus {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.6; }
        }

        /* =========================================================================
           RIGHT COLUMN: AUTHENTICATION FORM PANEL (BRIGHT)
           ========================================================================= */
        .auth-form-col {
            background: #FFFFFF;
            padding: 38px 36px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .form-header {
            margin-bottom: 22px;
        }

        .portal-tag-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--color-ruby-50);
            border: 1px solid var(--color-ruby-100);
            color: var(--color-ruby-700);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            margin-bottom: 12px;
        }

        .pulse-dot-ruby {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--color-ruby-600);
            box-shadow: 0 0 6px var(--color-ruby-500);
        }

        .portal-title {
            font-size: 1.55rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: var(--color-navy-950);
            margin-bottom: 6px;
        }

        .portal-subtitle {
            font-size: 0.84rem;
            color: var(--color-navy-600);
            line-height: 1.45;
        }

        /* Alerts */
        .login-alert {
            padding: 12px 16px;
            border-radius: var(--radius-md);
            margin-bottom: 18px;
            font-size: 0.82rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: alertSlide 0.3s ease-out;
        }

        @keyframes alertSlide {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-error {
            background: var(--color-ruby-50);
            border: 1.5px solid var(--color-ruby-100);
            color: var(--color-ruby-900);
        }

        .alert-success {
            background: var(--color-emerald-50);
            border: 1.5px solid #A7F3D0;
            color: #065F46;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--color-navy-800);
            margin-bottom: 7px;
        }

        .input-icon-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-leading-icon {
            position: absolute;
            left: 14px;
            width: 18px;
            height: 18px;
            color: var(--color-navy-400);
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border-radius: var(--radius-md);
            background: var(--color-navy-50);
            border: 1.5px solid var(--border-light);
            color: var(--color-navy-900);
            font-size: 0.92rem;
            font-family: inherit;
            font-weight: 500;
            transition: var(--transition);
        }

        .form-control::placeholder {
            color: var(--color-navy-400);
            font-weight: 400;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-blue-600);
            background: #FFFFFF;
            box-shadow: 
                0 0 0 4px rgba(37, 99, 235, 0.12),
                0 2px 8px rgba(37, 99, 235, 0.06);
        }

        .input-icon-wrap:focus-within .input-leading-icon {
            color: var(--color-blue-600);
        }

        /* Password Toggle Button */
        .password-toggle-btn {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            color: var(--color-navy-400);
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: color 0.2s ease;
        }

        .password-toggle-btn:hover {
            color: var(--color-navy-800);
        }

        .password-toggle-btn svg {
            width: 18px;
            height: 18px;
        }

        /* Checkbox & Options */
        .form-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 18px 0 22px;
            font-size: 0.8rem;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--color-navy-700);
            font-weight: 600;
            cursor: pointer;
            user-select: none;
        }

        .custom-checkbox input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 1.5px solid var(--border-light);
            border-radius: 5px;
            background: var(--color-navy-50);
            cursor: pointer;
            position: relative;
            transition: var(--transition);
        }

        .custom-checkbox input[type="checkbox"]:checked {
            background-color: var(--color-blue-600);
            border-color: var(--color-blue-600);
        }

        .custom-checkbox input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 2px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .security-badge-note {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--color-navy-400);
            font-size: 0.72rem;
            font-weight: 600;
        }

        /* Submit Button with Shimmer & Glow */
        .btn-submit-glow {
            width: 100%;
            padding: 13px 20px;
            background: linear-gradient(135deg, var(--color-blue-600) 0%, #1D4ED8 50%, var(--color-ruby-600) 100%);
            background-size: 200% 200%;
            color: #FFFFFF;
            border: none;
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 8px 22px rgba(37, 99, 235, 0.32);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit-glow::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.75s ease;
        }

        .btn-submit-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(37, 99, 235, 0.42);
            background-position: 100% 0%;
        }

        .btn-submit-glow:hover::before {
            left: 100%;
        }

        .btn-submit-glow:active {
            transform: translateY(0);
        }

        .btn-submit-glow:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        /* Back to Home & Footer */
        .portal-nav-footer {
            margin-top: 24px;
            padding-top: 18px;
            border-top: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }

        .back-home-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: var(--color-blue-600);
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition);
        }

        .back-home-link:hover {
            color: var(--color-blue-700);
            transform: translateX(-2px);
        }

        .security-copy-text {
            font-size: 0.72rem;
            color: var(--color-navy-400);
            font-weight: 500;
        }

        /* Spinner for Loading State */
        .btn-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.35);
            border-top-color: #FFFFFF;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .is-loading .btn-text-content {
            display: none;
        }

        .is-loading .btn-spinner {
            display: inline-block;
        }

        /* =========================================================================
           RESPONSIVE BREAKPOINTS
           ========================================================================= */
        @media (max-width: 960px) {
            .login-card-panoramic {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .mascot-stage-col {
                padding: 30px 24px 22px;
                border-right: none;
                border-bottom: 1px solid var(--border-light);
            }

            .mascot-avatar-container {
                width: 130px;
                height: 130px;
                margin-bottom: 14px;
            }

            .auth-form-col {
                padding: 30px 24px;
            }

            .portal-title {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 16px 12px;
            }

            .mascot-stage-col, .auth-form-col {
                padding: 24px 18px;
            }

            .mascot-avatar-container {
                width: 110px;
                height: 110px;
            }

            .form-meta-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Ambient Mesh Gradient Orbs (Soft Light Theme) -->
    <div class="mesh-orb orb-ruby"></div>
    <div class="mesh-orb orb-blue"></div>
    <div class="mesh-orb orb-cyan"></div>
    <div class="mesh-orb orb-amber"></div>

    <!-- Light Grid Background Pattern Overlay -->
    <div class="bg-grid-overlay"></div>

    <!-- Main Container Card -->
    <main class="login-wrapper">
        <div class="login-card-panoramic">
            
            <!-- ============================================================= -->
            <!-- LEFT: 3D MASCOT & BRAND PRESTIGE STAGE (BRIGHT & VIBRANT) -->
            <!-- ============================================================= -->
            <section class="mascot-stage-col" aria-label="Informasi Portal dan Maskot">
                <!-- Brand Info Header -->
                <div class="brand-header">
                    <div class="brand-logo-frame">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Akuntan Indonesia .ID" class="brand-logo-img">
                    </div>
                    <div class="brand-info">
                        <span class="brand-title-wrap">Akuntan Indonesia<span class="brand-tld">.ID</span></span>
                        <span class="brand-tagline">Finance &amp; Tax Partner</span>
                    </div>
                </div>

                <!-- 3D Mascot Pedestal Showcase Area -->
                <div class="mascot-pedestal-area">
                    <div class="mascot-avatar-container" id="mascotContainer" title="Klik maskot untuk sapaan lainnya!">
                        <div class="mascot-ring-glow"></div>
                        <div class="mascot-img-wrap">
                            <img src="{{ asset('images/mascot-standing.png') }}" alt="Si Akuntan - Maskot Resmi 3D" class="mascot-display-img" id="mascotImg">
                        </div>
                        <span class="mascot-badge-pill">
                            <span class="badge-sparkle">✨</span>
                            <span>Si Akuntan 3D</span>
                        </span>
                    </div>

                    <!-- Interactive Mascot Speech Bubble -->
                    <div class="mascot-speech-bubble" id="mascotSpeechBubble">
                        <span class="bubble-wave-icon" id="bubbleIcon">👋</span>
                        <div class="bubble-content">
                            <strong class="bubble-speaker">Si Akuntan</strong>
                            <p class="bubble-message-text" id="mascotMessage">
                                Halo Administrator! Siap kelola pembukuan dan perpajakan klien hari ini?
                            </p>
                        </div>
                    </div>

                    <!-- Mascot Mood Switcher Buttons -->
                    <div class="mascot-pose-bar">
                        <button type="button" class="pose-btn active" onclick="switchMascotPose('standing', 'Halo Administrator! Siap kelola pembukuan dan perpajakan klien hari ini?', '👋', this)">
                            👋 Sambut
                        </button>
                        <button type="button" class="pose-btn" onclick="switchMascotPose('optimis', 'Semua pelaporan keuangan & audit tertata rapi tanpa hambatan!', '🚀', this)">
                            🚀 Optimis
                        </button>
                        <button type="button" class="pose-btn" onclick="switchMascotPose('pajak', 'Kepatuhan perpajakan & Coretax DJP terjamin 100% akurat.', '⚖️', this)">
                            ⚖️ Pajak
                        </button>
                    </div>
                </div>

                <!-- Stage Footer: Trust Badges & System Status -->
                <div>
                    <div class="stage-footer-badges">
                        <span class="trust-chip">🏛️ KJA Resmi Kemenkeu</span>
                        <span class="trust-chip">⚖️ Kuasa Hukum Pajak</span>
                        <span class="trust-chip">⚡ Coretax DJP Ready</span>
                    </div>
                    <div class="status-live-pill">
                        <span class="status-dot-pulse"></span>
                        <span>Sistem Operasional &bull; Enkripsi TLS 256-Bit</span>
                    </div>
                </div>
            </section>

            <!-- ============================================================= -->
            <!-- RIGHT: AUTHENTICATION FORM PANEL (CLEAN WHITE) -->
            <!-- ============================================================= -->
            <section class="auth-form-col" aria-label="Formulir Login Administrator">
                <div>
                    <div class="form-header">
                        <div class="portal-tag-pill">
                            <span class="pulse-dot-ruby"></span>
                            <span>Next-Gen Backoffice</span>
                        </div>
                        <h1 class="portal-title">Portal Administrator</h1>
                        <p class="portal-subtitle">Akses khusus pengelolaan backoffice dan data klien Akuntan Indonesia .ID</p>
                    </div>

                    <!-- Flash Message Alerts -->
                    @if(session('success'))
                        <div class="login-alert alert-success" role="alert">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="login-alert alert-error" role="alert">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('admin.login.submit') }}" id="adminLoginForm">
                        @csrf

                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <span>Email Administrator</span>
                            </label>
                            <div class="input-icon-wrap">
                                <svg class="input-leading-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-control" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus 
                                    placeholder="admin@akuntanindonesia.id"
                                    autocomplete="email"
                                >
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="form-group">
                            <label for="password" class="form-label">
                                <span>Kata Sandi</span>
                            </label>
                            <div class="input-icon-wrap">
                                <svg class="input-leading-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="form-control" 
                                    required 
                                    placeholder="••••••••"
                                    autocomplete="current-password"
                                >
                                <button type="button" class="password-toggle-btn" id="togglePasswordBtn" aria-label="Lihat atau sembunyikan kata sandi">
                                    <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <svg id="eyeOffIcon" style="display: none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                        <line x1="1" y1="1" x2="23" y2="23"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me & Security Meta -->
                        <div class="form-meta-row">
                            <label class="custom-checkbox">
                                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                                <span>Ingat di perangkat ini</span>
                            </label>
                            <span class="security-badge-note">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                Sesi Terproteksi
                            </span>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-submit-glow" id="submitBtn">
                            <span class="btn-text-content">
                                <span>Masuk ke Backoffice</span>
                                <span>→</span>
                            </span>
                            <span class="btn-spinner"></span>
                        </button>
                    </form>
                </div>

                <!-- Footer Navigation -->
                <div class="portal-nav-footer">
                    <a href="{{ route('home') }}" class="back-home-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        <span>Kembali ke Beranda Akuntan.ID</span>
                    </a>
                    <p class="security-copy-text">
                        &copy; {{ date('Y') }} Akuntan Indonesia .ID &bull; Backoffice Management System
                    </p>
                </div>
            </section>

        </div>
    </main>

    <!-- Interactive Scripting -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Password Show/Hide Toggle
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');

            if (togglePasswordBtn && passwordInput) {
                togglePasswordBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    eyeIcon.style.display = isPassword ? 'none' : 'block';
                    eyeOffIcon.style.display = isPassword ? 'block' : 'none';
                });
            }

            // Mascot Dynamic Reactions
            const emailInput = document.getElementById('email');
            const mascotMessage = document.getElementById('mascotMessage');
            const bubbleIcon = document.getElementById('bubbleIcon');
            const submitBtn = document.getElementById('submitBtn');
            const adminLoginForm = document.getElementById('adminLoginForm');
            const mascotImg = document.getElementById('mascotImg');
            const mascotContainer = document.getElementById('mascotContainer');

            const mascotAssetPaths = {
                'standing': "{{ asset('images/mascot-standing.png') }}",
                'optimis': "{{ asset('images/mascot-optimis.jpg') }}",
                'pajak': "{{ asset('images/mascot-pajak.jpg') }}",
                'solusi': "{{ asset('images/mascot-solusi.jpg') }}",
                'profesional': "{{ asset('images/mascot-profesional.jpg') }}"
            };

            function updateMascotSpeech(text, icon = '💬') {
                if (!mascotMessage) return;
                mascotMessage.style.opacity = '0';
                setTimeout(() => {
                    mascotMessage.textContent = text;
                    if (bubbleIcon) bubbleIcon.textContent = icon;
                    mascotMessage.style.opacity = '1';
                }, 150);
            }

            if (emailInput) {
                emailInput.addEventListener('focus', function () {
                    updateMascotSpeech('Masukkan email resmi administrator yang terdaftar ya!', '✉️');
                    if (mascotImg) mascotImg.src = mascotAssetPaths['standing'];
                });
            }

            if (passwordInput) {
                passwordInput.addEventListener('focus', function () {
                    updateMascotSpeech('Pastikan kata sandi Anda rahasia dan aman dengan TLS 256-Bit.', '🔒');
                    if (mascotImg) mascotImg.src = mascotAssetPaths['solusi'] || mascotAssetPaths['standing'];
                });
            }

            // Form Submit Animation & Mascot Reaction
            if (adminLoginForm && submitBtn) {
                adminLoginForm.addEventListener('submit', function () {
                    submitBtn.classList.add('is-loading');
                    submitBtn.disabled = true;
                    updateMascotSpeech('Memvalidasi kredensial administrator... Mohon tunggu sebentar!', '⚡');
                    if (mascotImg) mascotImg.src = mascotAssetPaths['optimis'];
                });
            }

            // Click Mascot Container for Fun Tips
            const funTips = [
                { text: 'Tips: Selalu pastikan sinkronisasi faktur Coretax DJP berjalan lancar!', icon: '💡', pose: 'pajak' },
                { text: 'Semangat! Laporan keuangan yang rapi adalah kunci bisnis berkembang!', icon: '✨', pose: 'optimis' },
                { text: 'Jangan lupa memeriksa kotak masuk konsultasi klien hari ini!', icon: '📬', pose: 'standing' },
                { text: 'Partner sat-set keuangan & perpajakan terpercaya di Indonesia!', icon: '🇮🇩', pose: 'profesional' }
            ];
            let currentTipIndex = 0;

            if (mascotContainer) {
                mascotContainer.addEventListener('click', function () {
                    const tip = funTips[currentTipIndex % funTips.length];
                    currentTipIndex++;
                    updateMascotSpeech(tip.text, tip.icon);
                    if (mascotImg && mascotAssetPaths[tip.pose]) {
                        mascotImg.src = mascotAssetPaths[tip.pose];
                    }
                });
            }

            // Pose switcher helper function
            window.switchMascotPose = function (poseName, speechText, icon, btnElement) {
                if (mascotImg && mascotAssetPaths[poseName]) {
                    mascotImg.src = mascotAssetPaths[poseName];
                }
                updateMascotSpeech(speechText, icon);

                document.querySelectorAll('.pose-btn').forEach(btn => btn.classList.remove('active'));
                if (btnElement) btnElement.classList.add('active');
            };
        });
    </script>
</body>
</html>
