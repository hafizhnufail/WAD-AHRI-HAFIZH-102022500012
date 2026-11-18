<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
<div class="container" style="max-width: 420px;">
    <div class="card border-0 shadow-sm p-4">
        <h3 class="fw-bold text-center mb-3">Login Admin</h3>
        <p class="text-muted text-center small mb-4">Masuk untuk mengelola sistem venue</p>

        @if(session('success'))
            <div class="alert alert-success py-2 small">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Masuk</button>
        </form>
        <p class="text-center small text-muted mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </div>
</div>
</body>
</html>