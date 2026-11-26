<?php
$host = "localhost";
$dbname = "db_venue";
$username = "root";
$password = ""; 

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $level = $_POST['level'];

    if (!empty($nama) && !empty($email) && !empty($nohp) && !empty($level)) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO tabel_data (nama, email, nohp, level_member) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nama, $email, $nohp, $level]);

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $pesan = "Gagal menyimpan data: " . $e->getMessage();
        }
    } else {
        $pesan = "Semua form wajib diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Member Venue</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <h1>Pendaftaran Member Baru</h1>
    <p>Silakan isi form di bawah ini untuk mendaftarkan pelanggan baru.</p>

    <nav>
        <a href="index.php" class="btn-link">&laquo; Kembali ke Daftar Pelanggan</a>
    </nav>
    <hr>

    <?php if (!empty($pesan)): ?>
        <p style="color: red;"><?= $pesan; ?></p>
    <?php endif; ?>

    <h2>Form Pendaftaran Member Baru</h2>
    <form action="form.php" method="post">
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="nohp">No HP:</label><br>
        <input type="text" id="nohp" name="nohp" required><br><br>

        <label for="level">Level Member:</label><br>
        <select id="level" name="level" required>
            <option value="Basic">Basic</option>
            <option value="Gold">Gold</option>
            <option value="VIP">VIP</option>
        </select><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>