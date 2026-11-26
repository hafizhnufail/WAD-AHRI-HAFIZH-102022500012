<?php
$host = "localhost";
$dbname = "db_venue";
$username = "root";
$password = ""; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

$stmt = $pdo->query("SELECT * FROM tabel_data ORDER BY id DESC");
$members = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan dan Member Venue</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <h1>Sistem Pelanggan Venue</h1>
    <p>Halaman ini digunakan untuk database pelanggan, level member, dan data pengguna.</p>
    
    <nav>
        <a href="form.php" class="btn-link">+ Tambah Member Baru</a>
    </nav>
    <hr>

    <h2>Level Member</h2>
    <ul> 
        <li>Basic - Standar</li>
        <li>Gold - Diskon 15%</li>
        <li>VIP - Diskon 20% & Prioritas</li>
    </ul>

    <h2>Data Pelanggan</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Level Member</th>
                <th>Aksi</th>
            </tr>

        </thead>
        <tbody>
            <?php if (empty($members)): ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data pelanggan.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach ($members as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['nohp']); ?></td>
                        <td><?= htmlspecialchars($row['level_member']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>