<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mini Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4CAF50;
            --primary-dark: #388E3C;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
        }

        .login-header i {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .login-header h3 {
            font-weight: 700;
            margin: 0;
        }

        .login-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            padding: 0.85rem 1.2rem;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.15);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.85rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.4);
            color: white;
        }

        .btn-google {
            background: white;
            color: #444;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.85rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-google:hover {
            background: #f8f9fa;
            border-color: #ddd;
        }

        .btn-google img {
            width: 20px;
            height: 20px;
        }

        .btn-guest {
            background: #f0f2f5;
            color: #555;
            border: none;
            border-radius: 12px;
            padding: 0.85rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .btn-guest:hover {
            background: #e4e6e9;
            color: #333;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: #aaa;
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider span {
            padding: 0 1rem;
        }

        .alert-modern {
            border-radius: 12px;
            border: none;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <i class="bi bi-book-half"></i>
            <h3>Mini Library</h3>
            <small>Sistem Perpustakaan Digital</small>
        </div>

        <div class="login-body">
            @if(session('success'))
                <div class="alert alert-success alert-modern">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-modern">{{ session('error') }}</div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email address" required>
                </div>
                
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-login mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                </button>
            </form>

            <div class="divider"><span>atau</span></div>

            <!-- Google Login -->
            <a href="{{ route('google.login') }}" class="btn-google mb-3">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                Masuk dengan Google
            </a>

            <!-- Guest Mode -->
            <a href="{{ route('guest.login') }}" class="btn-guest">
                <i class="bi bi-person-walking me-2"></i> Masuk sebagai Guest
            </a>
        </div>
    </div>

</body>
</html>