<?php
require_once '../../Config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: ../../Auth/Login.php');
  exit;
}

$slug = $_GET['slug'] ?? '';

$result = $conn->prepare("SELECT nama_file FROM artikel WHERE slug=?");
$result->bind_param("s", $slug);
$result->execute();
$result->store_result();

if ($result->num_rows > 0) {
  $result->bind_result($namaFile);
  $result->fetch();

  // Hapus data dari database
  $delete = $conn->prepare("DELETE FROM artikel WHERE slug=?");
  $delete->bind_param("s", $slug);
  $delete->execute();
  $delete->close();

  // Hapus file dari folder Ensiklopedia/Artikel
  $path = "../../Ensiklopedia/Artikel/" . $namaFile;
  if (file_exists($path)) {
    unlink($path);
  }

  echo "<script>alert('✅ Artikel dan file berhasil dihapus!'); window.location.href='daftar-artikel.php';</script>";
} else {
  echo "<script>alert('⚠️ Artikel tidak ditemukan!'); window.location.href='daftar-artikel.php';</script>";
}
?>