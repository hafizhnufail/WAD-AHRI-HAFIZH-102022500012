<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
<div class="container" style="max-width: 450px;">
    <div class="card border-0 shadow-sm p-4">
        <h3 class="fw-bold text-center mb-3">Registrasi Akun</h3>
        <p class="text-muted text-center small mb-4">Daftar untuk mengelola sistem venue</p>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
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
            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Daftar Sebagai (Role)</label>
                <select name="role" id="role" class="form-select" required>
                <option value="member">Member (Hanya Melihat Data)</option>
                <option value="admin">Admin Venue (Akses Penuh CRUD)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Daftar</button>
        </form>
        <p class="text-center small text-muted mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div>
</body>
</html>