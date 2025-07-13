<?php
require_once '../../Config/koneksi.php';

$keyword = $_GET['q'] ?? '';
if (!empty($keyword)) {
  $stmt = $conn->prepare("SELECT judul, ringkasan, nama_file, pdf_link FROM artikel WHERE judul LIKE ? OR ringkasan LIKE ? ORDER BY created_at DESC");
  $param = '%' . $keyword . '%';
  $stmt->bind_param("ss", $param, $param);
  $stmt->execute();
  $result = $stmt->get_result();
  $artikel = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
  $stmt->close();
} else {
  $result = $conn->query("SELECT judul, ringkasan, nama_file, pdf_link FROM artikel ORDER BY created_at DESC");
  $artikel = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SawitPedia</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background-image: url('https://www.transparenttextures.com/patterns/leaf.png');
        background-color: #f0fdf4;
    }

    header {
        background: linear-gradient(to right, #065f46, #047857);
        color: white;
        padding: 20px 0;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .header-container {
        max-width: 1200px;
        margin: auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-group {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    h1.site-title {
        font-size: 28px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    nav a {
        margin-left: 20px;
        color: white;
        font-size: 14px;
        text-decoration: none;
    }

    nav a:hover {
        text-decoration: underline;
    }

    .btn-login {
        background: white;
        color: #065f46;
        padding: 6px 16px;
        border-radius: 100px;
        font-weight: 500;
    }

    main {
        max-width: 1100px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .hero {
        text-align: center;
        margin-bottom: 40px;
    }

    .hero h2 {
        font-size: 36px;
        color: #065f46;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .hero p {
        color: #374151;
        font-size: 16px;
    }

    /* Search Bar */
    form.search-bar {
        text-align: center;
        margin: 0 auto 50px;
    }

    form.search-bar input {
        width: 60%;
        max-width: 600px;
        padding: 12px 18px;
        border: 2px solid #047857;
        border-radius: 100px 0 0 100px;
        font-size: 14px;
    }

    form.search-bar button {
        background: #047857;
        color: white;
        padding: 12px 24px;
        border: none;
        font-size: 14px;
        border-radius: 0 100px 100px 0;
        cursor: pointer;
    }

    .card-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }

    .card-artikel {
        width: 100%;
        min-height: 150px;
        margin: 24px auto;
        padding: 28px;
        background-color: white;
        border-left: 6px solid #047857;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        font-family: Arial, sans-serif;
    }

    .card-artikel:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
    }

    .card-header .icon {
        font-size: 30px;
        margin-right: 12px;
    }

    .card-header h3 {
        font-size: 20px;
        color: #065f46;
    }

    .card-content {
        font-size: 14px;
        color: #374151;
        margin-bottom: 16px;
        line-height: 1.6;
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-primary {
        background-color: #047857;
        color: white;
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 999px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #065f46;
    }

    .pdf-link {
        color: #047857;
        font-size: 14px;
        text-decoration: underline;
    }

    footer {
        background-color: #065f46;
        color: white;
        text-align: center;
        padding: 24px 0;
        margin-top: 80px;
        font-size: 14px;
    }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo-group">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2c-.6 0-1 .4-1 1v1.1c..." />
                </svg>
                <h1 class="site-title">SawitPedia</h1>
            </div>
            <nav>
                <a href="tentang.php">Tentang</a>
                <a href="kontak.php">Kontak</a>
                <a href="http://localhost/SawitPedia/" class="btn-login">Back</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main>
        <section class="hero">
            <h2>Selamat Datang di SawitPedia 🌴</h2>
            <p>Daftar artikel yang kami sediakan untuk dibaca</p>
        </section>

        <!-- Search Form -->
        <form method="GET" class="search-bar">
            <input type="text" name="q" value="<?= htmlspecialchars($keyword) ?>"
                placeholder="Cari artikel sawit berdasarkan gejala, nama, ringkasan..." />
            <button type="submit">🔍 Cari</button>
        </form>

        <!-- Cards -->
        <section class="card-list">
            <?php if (count($artikel) > 0): ?>
            <?php foreach ($artikel as $item): ?>
            <div class="card-artikel">
                <div class="card-header">
                    <div class="icon">📘</div>
                    <h3><?= htmlspecialchars($item['judul']) ?></h3>
                </div>
                <div class="card-content">
                    <?= htmlspecialchars($item['ringkasan']) ?>
                </div>
                <div class="card-footer">
                    <a href="../../Ensiklopedia/Artikel/<?= htmlspecialchars($item['nama_file']) ?>" class="btn-primary"
                        target="_blank">Baca Selengkapnya</a>
                    <?php if (!empty($item['pdf_link'])): ?>
                    <a href="<?= htmlspecialchars($item['pdf_link']) ?>" class="pdf-link" target="_blank">Lihat PDF</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p style="text-align:center;">Artikel tidak ditemukan untuk kata kunci
                <strong>"<?= htmlspecialchars($keyword) ?>"</strong></p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>

</body>

</html>