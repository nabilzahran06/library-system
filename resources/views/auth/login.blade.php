
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            color: #222;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 36px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        }

        .login-card h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            display: block;
            width: 100%;
            padding: 12px 14px;
            font-size: 14px;
            color: #222;
            background-color: #fff;
            border: 1px solid #d5d5d5;
            border-radius: 7px;
            outline: none;
            transition: border-color 0.2s;
        }

        input::placeholder {
            color: #aaa;
        }

        input:focus {
            border-color: #888;
        }

        .error-box {
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 1px solid #e8baba;
            border-radius: 7px;
            background-color: #fff5f5;
            color: #a52a2a;
            font-size: 13px;
            line-height: 1.5;
        }

        .btn-login {
            display: block;
            width: 100%;
            padding: 13px;
            margin-top: 8px;
            background-color: #e5e5e5;
            color: #222;
            border: 1px solid #d5d5d5;
            border-radius: 7px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-login:hover {
            background-color: #d5d5d5;
        }

        .footer {
            text-align: center;
            margin-top: 26px;
            font-size: 12px;
            color: #888;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 26px 22px;
            }

            .login-card h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>
    <main class="login-card">
        <h1>Perpustakaan</h1>
        <p class="subtitle">Silakan masuk ke akun Anda</p>

        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    autocomplete="email"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>

        <p class="footer">
            Sistem Informasi Perpustakaan
        </p>
    </main>
</body>
</html>
