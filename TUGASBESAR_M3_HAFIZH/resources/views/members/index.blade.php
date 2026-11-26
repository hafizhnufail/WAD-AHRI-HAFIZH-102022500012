<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
    <h1 class="fw-bold">Sistem Pelanggan Venue</h1>
    <p class="text-muted">Halaman ini digunakan untuk database pelanggan, level member, dan data pengguna.</p>
    
    <div class="d-flex justify-content-between mb-4">
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('members.create') }}" class="btn btn-primary">+ Tambah Member Baru</a>
        @else
             <div></div>
         @endif
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4 mb-4">
        <h5 class="fw-bold mb-3">Level Member</h5>
        <ul class="list-group list-group-flush mb-2">
            <li class="list-group-item px-0">Basic - Standar</li>
            <li class="list-group-item px-0">Gold - Diskon 15%</li>
            <li class="list-group-item px-0">VIP - Diskon 20% & Prioritas</li>
        </ul>
    </div>

    <div class="card border-0 shadow-sm p-4">
        <h5 class="fw-bold mb-3">Data Pelanggan</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Level Member</th>
                    @if(auth()->user()->role === 'admin')
                        <th style="width: 150px;">Aksi</th>
                    @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->nohp }}</td>
                            <td><span class="badge bg-info text-dark">{{ $row->level_member }}</span></td>
                            @if(auth()->user()->role === 'admin')
                                <td>
                                    <a href="{{ route('members.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('members.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? '6' : '5' }}" class="text-center text-muted">Belum ada data pelanggan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>