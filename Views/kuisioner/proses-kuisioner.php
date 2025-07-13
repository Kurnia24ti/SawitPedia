<?php
require_once '../../Config/koneksi.php'; // path ke koneksi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1. Tangkap semua input
  $fields = [
    'nama_petani', 'lokasi', 'luas', 'umur_tanaman', 'varietas',
    'warna_daun', 'batang_busuk', 'buah_busuk', 'pelepah_rontok', 'jamur_akar',
    'drainase', 'jenis_tanah', 'banjir',
    'pemupukan', 'sanitasi', 'penggunaan_pestisida', 'jenis_pestisida',
    'riwayat_penyakit', 'nama_penyakit',
    'jumlah_terdampak', 'durasi_gejala'
  ];

  $data = [];
  foreach ($fields as $key) {
    $data[$key] = $_POST[$key] ?? '';
  }

  // 2. Insert ke database
  $stmt = $conn->prepare("INSERT INTO kuisioner (
    nama_petani, lokasi, luas, umur_tanaman, varietas,
    warna_daun, batang_busuk, buah_busuk, pelepah_rontok, jamur_akar,
    drainase, jenis_tanah, banjir,
    pemupukan, sanitasi, penggunaan_pestisida, jenis_pestisida,
    riwayat_penyakit, nama_penyakit,
    jumlah_terdampak, durasi_gejala
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  
  $stmt->bind_param(
    "sssssssssssssssssssss",
    $data['nama_petani'], $data['lokasi'], $data['luas'], $data['umur_tanaman'], $data['varietas'],
    $data['warna_daun'], $data['batang_busuk'], $data['buah_busuk'], $data['pelepah_rontok'], $data['jamur_akar'],
    $data['drainase'], $data['jenis_tanah'], $data['banjir'],
    $data['pemupukan'], $data['sanitasi'], $data['penggunaan_pestisida'], $data['jenis_pestisida'],
    $data['riwayat_penyakit'], $data['nama_penyakit'],
    $data['jumlah_terdampak'], $data['durasi_gejala']
  );
  
  $stmt->execute();
  $stmt->close();

  // 3. Kirim email (simple versi fungsi mail)
  $to      = "immanuel24ti@mahasiswa.pcr.ac.id";
  $subject = "🧪 Laporan Kuisioner SawitPedia";

  $message = "📄 Hasil Kuisioner Diagnosa:\n\n";
  foreach ($data as $label => $value) {
    $pretty = ucwords(str_replace("_", " ", $label));
    $message .= "$pretty: $value\n";
  }

  $headers = "From: kuisioner@sawitpedia.local"; // ganti kalau pakai SMTP

  // Kirim email
  mail($to, $subject, $message, $headers);

  echo "<script>alert('✅ Kuisioner berhasil dikirim dan disimpan!'); window.location.href='index.php';</script>";
  exit;
}
?>