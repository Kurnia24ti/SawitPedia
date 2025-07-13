<?php
require_once '../../Config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: ../../Auth/Login.php');
  exit;
}

// Ambil data artikel termasuk nama_file
$result = $conn->query("SELECT judul, ringkasan, slug, nama_file FROM artikel ORDER BY created_at DESC");
$artikel = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Artikel - Admin</title>
    <style>
    h2 {
        text-align: center;
        color: #047857;
        margin-bottom: 30px;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        max-width: 1000px;
        margin: auto;
    }

    .card {
        background: white;
        padding: 20px;
        border-left: 6px solid #10b981;
        border-radius: 12px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
    }

    .card h3 {
        margin: 0 0 10px;
        color: #065f46;
        font-size: 18px;
    }

    .card p {
        font-size: 14px;
        color: #333;
        margin-bottom: 14px;
    }

    .card a {
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 13px;
        display: inline-block;
        color: white;
        margin-right: 8px;
        margin-top: 6px;
    }

    .btn-view {
        background: #047857;
    }

    .btn-view:hover {
        background-color: #065f46;
    }

    .btn-edit {
        background: #3b82f6;
    }

    .btn-edit:hover {
        background-color: #2563eb;
    }

    .btn-delete {
        background: #dc2626;
    }

    .btn-delete:hover {
        background-color: #b91c1c;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background: #ecfdf5 url('https://www.transparenttextures.com/patterns/leaf.png');
        min-height: 100vh;
    }

    header {
        background: linear-gradient(to right, #065f46, #047857);
        color: white;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .header-container {
        max-width: 1100px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-group {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .logo-text {
        font-size: 26px;
        font-weight: bold;
    }

    footer {
        background: #065f46;
        color: white;
        text-align: center;
        padding: 20px 0;
        margin-top: 80px;
        font-size: 14px;
    }

    nav a {
        margin-left: 18px;
        color: white;
        text-decoration: none;
        font-size: 14px;
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
    </style>
</head>

<body>


    <header>
        <div class="header-container">
            <div class="logo-group">
                <!-- Logo SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                    <path
                        d="M12 2c-.6 0-1 .4-1 1v1.1c-.3.1-.6.2-.9.4L8.8 3.3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.2 1.2c-.2.3-.3.6-.4.9H7c-.6 0-1 .4-1 1s.4 1 1 1h1.1c.1.3.2.6.4.9L6.3 10.8c-.4.4-.4 1 0 1.4s1 .4 1.4 0l1.2-1.2c.3.2.6.3.9.4V13c0 .6.4 1 1 1s1-.4 1-1v-1.1c.3-.1.6-.2.9-.4l1.2 1.2c.4.4 1 .4 1.4 0s.4-1 0-1.4l-1.2-1.2c.2-.3.3-.6.4-.9H17c.6 0 1-.4 1-1s-.4-1-1-1h-1.1c-.1-.3-.2-.6-.4-.9l1.2-1.2c.4-.4.4-1 0-1.4s-1-.4-1.4 0l-1.2 1.2c-.3-.2-.6-.3-.9-.4V3c0-.6-.4-1-1-1zm-1 9a1 1 0 012 0v7a1 1 0 01-2 0v-7zm0 9h2v2h-2v-2z" />
                </svg>
                <span class="logo-text">SawitPedia</span>
            </div>
            <nav>
                <a href="http://localhost/SawitPedia/Views/Admin/dashboard.php" class="btn-login">Dashboard</a>
            </nav>
        </div>
    </header>

    <br>

    <h2>📋 Daftar Artikel Admin</h2>

    <div class="grid">
        <?php if (!empty($artikel)): ?>
        <?php foreach ($artikel as $item): ?>
        <div class="card">
            <h3><?= htmlspecialchars($item['judul']) ?></h3>
            <p><?= htmlspecialchars($item['ringkasan']) ?></p>
            <a href="../../Ensiklopedia/Artikel/<?= htmlspecialchars($item['nama_file']) ?>" target="_blank"
                class="btn-view">
                👁️ Baca Artikel
            </a>
            <a href="edit-artikel.php?slug=<?= htmlspecialchars($item['slug']) ?>" class="btn-edit">
                ✏️ Edit
            </a>
            <a href="hapus-artikel.php?slug=<?= htmlspecialchars($item['slug']) ?>" class="btn-delete"
                onclick="return confirm('Yakin mau hapus artikel ini?')">
                🗑️ Hapus
            </a>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p style="text-align: center;">Tidak ada artikel yang tersimpan.</p>
        <?php endif; ?>
    </div>

    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>

</body>

</html>