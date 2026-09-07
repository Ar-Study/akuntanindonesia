<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login Administrator | Akuntan.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --admin-navy-950: #060B18;
            --admin-navy-900: #0F172A;
            --admin-ruby: #E11D48;
            --admin-blue: #2563EB;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.12) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(225, 29, 72, 0.12) 0%, transparent 40%),
                        var(--admin-navy-950);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: #F8FAFC;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-badge-icon {
            width: 54px;
            height: 54px;
            background: linear-gradient(135deg, var(--admin-ruby) 0%, #9F1239 100%);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 16px;
            box-shadow: 0 10px 20px rgba(225, 29, 72, 0.35);
        }

        .login-title {
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #FFFFFF;
            margin-bottom: 6px;
        }

        .login-subtitle {
            font-size: 0.85rem;
            color: #94A3B8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: #E2E8F0;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            background: rgba(30, 41, 59, 0.8);
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            color: #FFFFFF;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--admin-blue);
            background: rgba(30, 41, 59, 1);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            font-size: 0.84rem;
            color: #CBD5E1;
            cursor: pointer;
        }

        .form-check input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--admin-blue);
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--admin-blue) 0%, #1D4ED8 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
        }

        .login-alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .alert-error {
            background: rgba(225, 29, 72, 0.15);
            border: 1px solid rgba(225, 29, 72, 0.4);
            color: #FECDD3;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.4);
            color: #A7F3D0;
        }

        .login-footer {
            margin-top: 28px;
            text-align: center;
            font-size: 0.76rem;
            color: #64748B;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="login-badge-icon">🏛️</div>
            <h1 class="login-title">Portal Administrator</h1>
            <p class="login-subtitle">Akses Khusus Pengelolaan Akuntan.ID</p>
        </div>

        @if(session('success'))
            <div class="login-alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="login-alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email Administrator</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    placeholder="admin@akuntanindonesia.id"
                >
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control" 
                    required 
                    placeholder="••••••••"
                >
            </div>

            <label class="form-check">
                <input type="checkbox" name="remember" value="1">
                <span>Ingat saya di perangkat ini</span>
            </label>

            <button type="submit" class="btn-submit">
                Masuk ke Backoffice
            </button>
        </form>

        <div class="login-footer">
            Sistem Keamanan Terenkripsi &bull; Hak Cipta Akuntan Indonesia .ID
        </div>
    </div>
</body>
</html>
