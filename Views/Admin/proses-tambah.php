<?php
require_once '../../Config/koneksi.php';
session_start();

function slugify($text) {
  $text = strtolower($text);
  $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
  $text = preg_replace('/[\s-]+/', '-', trim($text));
  return $text;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul     = $_POST['judul'] ?? '';
  $slug      = $_POST['slug'] ?? '';
  $ringkasan = $_POST['ringkasan'] ?? '';
  $konten    = $_POST['konten'] ?? '';

  // 0. Cek apakah artikel sudah ada berdasarkan slug atau judul
  $cek = $conn->prepare("SELECT COUNT(*) FROM artikel WHERE slug = ? OR judul = ?");
  $cek->bind_param("ss", $slug, $judul);
  $cek->execute();
  $cek->bind_result($jumlah);
  $cek->fetch();
  $cek->close();

  if ($jumlah > 0) {
    echo "<script>alert('⚠️ Artikel dengan judul atau slug ini sudah ada!'); window.location.href='tambah-artikel.php';</script>";
    exit;
  }

  // 1. Simpan ke database
  $stmt = $conn->prepare("INSERT INTO artikel (judul, slug, ringkasan, konten) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $judul, $slug, $ringkasan, $konten);
  $stmt->execute();
  $id = $stmt->insert_id;
  $stmt->close();

  // 2. Generate nama file: [slug]-[judul-slug]-[id].php
  $judulSlug = slugify($judul);
  $namaFile  = $slug . "-" . $judulSlug . "-" . $id . ".php";
  $filename  = "../../Ensiklopedia/Artikel/" . $namaFile;

  // 3. Format konten HTML with layout (header + footer + CSS)
  $html = "<!DOCTYPE html>
<html lang='id'>
<head>
  <meta charset='UTF-8'>
  <title>" . htmlspecialchars($judul) . "</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0fdf4 url('https://www.transparenttextures.com/patterns/leaf.png');
      margin: 0; padding: 0;
    }
    header {
      background: linear-gradient(to right, #065f46, #047857);
      color: white;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .logo-group {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .logo-text {
      font-size: 24px;
      font-weight: bold;
    }
    .logout-btn {
      background: white;
      color: #065f46;
      padding: 6px 14px;
      border-radius: 100px;
      text-decoration: none;
      font-size: 14px;
      font-weight: bold;
    }
    article {
      background: white;
      padding: 30px;
      border-radius: 14px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.06);
      max-width: 800px;
      margin: 60px auto 40px;
    }
    h1 {
      color: #047857;
      margin-bottom: 20px;
    }
    p {
      font-size: 15px;
      line-height: 1.6;
      color: #333;
    }
    footer {
      background: #065f46;
      color: white;
      text-align: center;
      padding: 20px 0;
      font-size: 14px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <div class='logo-group'>
      <svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' fill='white' viewBox='0 0 24 24'>
        <path d='M12 2c-.6 0-1 .4-1 1v1.1c...'/>
      </svg>
      <span class='logo-text'>SawitPedia</span>
    </div>
    <a href='http://localhost/SawitPedia/' class='logout-btn'>Back</a>
  </header>

  <article>
    <h1>" . htmlspecialchars($judul) . "</h1>
    $konten
  </article>

  <footer>
    &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
  </footer>

</body>
</html>";

  // 4. Tulis ke file .php
  file_put_contents($filename, $html);

  // 5. Simpan nama file ke database
  $update = $conn->prepare("UPDATE artikel SET nama_file=? WHERE id=?");
  $update->bind_param("si", $namaFile, $id);
  $update->execute();
  $update->close();

  // 6. Redirect atau notif
  echo "<script>alert('✅ Artikel berhasil disimpan dan file .php sudah dibuat!'); window.location.href='daftar-artikel.php';</script>";
  exit;
}
?>