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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id    = $_POST['id'] ?? null;
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $nohp  = trim($_POST['nohp'] ?? '');
    $level = trim($_POST['level'] ?? 'Basic');

    if ($id && !empty($nama) && !empty($email) && !empty($nohp)) {
        $stmt = $pdo->prepare("UPDATE tabel_data SET nama = :nama, email = :email, nohp = :nohp, level_member = :level WHERE id = :id");
        $stmt->execute([
            ':nama'  => $nama,
            ':email' => $email,
            ':nohp'  => $nohp,
            ':level' => $level,
            ':id'    => $id
        ]);
    }
}

header("Location: index.php");
exit;