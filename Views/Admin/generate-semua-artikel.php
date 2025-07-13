<?php
require_once '../../Config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: ../../Auth/Login.php");
  exit;
}

$result = $conn->query("SELECT id, slug, judul, konten FROM artikel");
$artikel = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

function slugify($text) {
  $text = strtolower($text);
  $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
  $text = preg_replace('/[\s-]+/', '-', trim($text));
  return $text;
}

foreach ($artikel as $item) {
  $id        = $item['id'];
  $slug      = $item['slug'];
  $judul     = $item['judul'];
  $konten    = $item['konten'];
  $judulSlug = slugify($judul);

  $html = "<!DOCTYPE html>
<html lang='id'>
<head>
  <meta charset='UTF-8'>
  <title>" . htmlspecialchars($judul) . "</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0fdf4 url('https://www.transparenttextures.com/patterns/leaf.png');
      margin: 0;
      padding: 0;
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
        <path d='M12 2c-.6 0-1 .4-1 1v1.1c-.3.1-.6.2-.9.4L8.8 3.3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.2 1.2c-.2.3-.3.6-.4.9H7c-.6 0-1 .4-1 1s.4 1 1 1h1.1c.1.3.2.6.4.9L6.3 10.8c-.4.4-.4 1 0 1.4s1 .4 1.4 0l1.2-1.2c.3.2.6.3.9.4V13c0 .6.4 1 1 1s1-.4 1-1v-1.1c.3-.1.6-.2.9-.4l1.2 1.2c.4.4 1 .4 1.4 0s.4-1 0-1.4l-1.2-1.2c.2-.3.3-.6.4-.9H17c.6 0 1-.4 1-1s-.4-1-1-1h-1.1c-.1-.3-.2-.6-.4-.9l1.2-1.2c.4-.4.4-1 0-1.4s-1-.4-1.4 0l-1.2 1.2c-.3-.2-.6-.3-.9-.4V3c0-.6-.4-1-1-1zm-1 9a1 1 0 012 0v7a1 1 0 01-2 0v-7zm0 9h2v2h-2v-2z'/>
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

  $filename = "../../Ensiklopedia/Artikel/" . $slug . "-" . $judulSlug . "-" . $id . ".php";
  file_put_contents($filename, $html);
}

echo "<script>alert('✅ Semua artikel berhasil diregenerate ulang dengan header & footer!'); window.location.href='daftar-artikel.php';</script>";