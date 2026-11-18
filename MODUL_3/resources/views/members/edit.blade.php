<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5" style="max-width: 600px;">
    <div class="card border-0 shadow-sm p-4">
        <h3 class="fw-bold mb-3">Edit Data Member</h3>
        <a href="{{ route('members.index') }}" class="text-decoration-none mb-3 d-inline-block">&larr; Batal</a>

        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $member->nama) }}" required>
                @error('nama') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}" required>
                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="nohp" class="form-control" value="{{ old('nohp', $member->nohp) }}" required>
                @error('nohp') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Level Member</label>
                <select name="level" class="form-select" required>
                    <option value="Basic" {{ $member->level_member === 'Basic' ? 'selected' : '' }}>Basic</option>
                    <option value="Gold" {{ $member->level_member === 'Gold' ? 'selected' : '' }}>Gold</option>
                    <option value="VIP" {{ $member->level_member === 'VIP' ? 'selected' : '' }}>VIP</option>
                </select>
                @error('level') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-warning w-100">Perbarui Data</button>
        </form>
    </div>
</div>
</body>
</html>