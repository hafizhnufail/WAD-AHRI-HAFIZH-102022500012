<?php
$host = "localhost";
$dbname = "db_venue";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM tabel_data WHERE id = :id");
$stmt->execute([':id' => $id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$member) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="design.css">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="card p-4 shadow-sm" style="max-width: 600px; margin: auto;">
            <h1>Edit Data Member</h1>
            <p>Perbarui informasi pelanggan di bawah ini.</p>
            <nav class="mb-3">
                <a href="index.php" class="btn btn-secondary btn-sm">&laquo; Batal & Kembali</a>
            </nav>
            <hr>

            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $member['id']; ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($member['nama']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($member['email']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP:</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= htmlspecialchars($member['nohp']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="level" class="form-label">Level Member:</label>
                    <select class="form-select" id="level" name="level" required>
                        <option value="Basic" <?= $member['level_member'] === 'Basic' ? 'selected' : ''; ?>>Basic</option>
                        <option value="Gold" <?= $member['level_member'] === 'Gold' ? 'selected' : ''; ?>>Gold</option>
                        <option value="VIP" <?= $member['level_member'] === 'VIP' ? 'selected' : ''; ?>>VIP</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>
</html>