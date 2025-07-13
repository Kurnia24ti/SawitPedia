<?php
require_once '../../Config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: ../../Auth/Login.php');
  exit;
}

$slug = $_GET['slug'] ?? '';
$stmt = $conn->prepare("SELECT * FROM artikel WHERE slug=?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$artikel = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Artikel - <?= htmlspecialchars($slug) ?></title>
    <style>
    body {
        font-family: Arial;
        background: #f0fdf4;
        padding: 40px;
    }

    form {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    }

    h2 {
        color: #065f46;
        text-align: center;
        margin-bottom: 24px;
    }

    input,
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 18px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    button {
        background: #047857;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #065f46;
    }
    </style>
</head>

<body>

    <h2>Edit Artikel: <em><?= htmlspecialchars($slug) ?></em></h2>

    <form method="POST" action="proses-edit.php">
        <input type="hidden" name="slug" value="<?= htmlspecialchars($slug) ?>">
        <input type="text" name="judul" value="<?= htmlspecialchars($artikel['judul']) ?>" required>
        <input type="text" name="ringkasan" value="<?= htmlspecialchars($artikel['ringkasan']) ?>" required>
        <textarea name="konten" rows="10" required><?= htmlspecialchars($artikel['konten']) ?></textarea>
        <button type="submit">Simpan Perubahan</button>
    </form>

</body>

</html>