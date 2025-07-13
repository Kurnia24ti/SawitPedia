<?php
require_once '../../Config/koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $slug      = $_POST['slug'] ?? '';
  $judul     = $_POST['judul'] ?? '';
  $ringkasan = $_POST['ringkasan'] ?? '';
  $konten    = $_POST['konten'] ?? '';

  // 1. Update database
  $stmt = $conn->prepare("UPDATE artikel SET judul=?, ringkasan=?, konten=? WHERE slug=?");
  $stmt->bind_param("ssss", $judul, $ringkasan, $konten, $slug);
  $stmt->execute();
  $stmt->close();

  // 2. Regenerate file artikel
  $html = "<!DOCTYPE html>
<html lang='id'>
<head>
  <meta charset='UTF-8'>
  <title>$judul</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f0fdf4; padding: 40px; }
    article { background: white; padding: 30px; border-radius: 14px; box-shadow: 0 8px 20px rgba(0,0,0,0.06); }
    h1 { color: #047857; margin-bottom: 20px; }
    p { font-size: 15px; line-height: 1.6; color: #333; }
  </style>
</head>
<body>
  <article>
    <h1>" . htmlspecialchars($judul) . "</h1>
    $konten
  </article>
</body>
</html>";

  // 3. Save to file
  $target = "../../Ensiklopedia/Artikel/" . $slug . ".php";
  file_put_contents($target, $html);

  // 4. Redirect (bisa arahkan ke daftar artikel atau show notif)
  header("Location: daftar-artikel.php?edit=success");
  exit;
}
?>