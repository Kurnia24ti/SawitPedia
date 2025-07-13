<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: /SawitPedia/Views/Auth/Login.php');
  exit;
}

$adminEmail = $_SESSION['admin_email'] ?? 'Admin';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SawitPedia</title>
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
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

    .dashboard-container {
        max-width: 1000px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px;
    }

    .card {
        background: white;
        border-left: 6px solid #047857;
        padding: 24px;
        border-radius: 14px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
    }

    .card h3 {
        margin-bottom: 12px;
        color: #065f46;
        font-size: 18px;
    }

    .card a {
        display: inline-block;
        margin-top: 8px;
        background: #047857;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
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

    footer {
        background: #065f46;
        color: white;
        text-align: center;
        padding: 20px 0;
        margin-top: 80px;
        font-size: 14px;
    }
    </style>
</head>

<body>

    <header>
        <div class="logo-group">
            <!-- Logo SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                <path
                    d="M12 2c-.6 0-1 .4-1 1v1.1c-.3.1-.6.2-.9.4L8.8 3.3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.2 1.2c-.2.3-.3.6-.4.9H7c-.6 0-1 .4-1 1s.4 1 1 1h1.1c.1.3.2.6.4.9L6.3 10.8c-.4.4-.4 1 0 1.4s1 .4 1.4 0l1.2-1.2c.3.2.6.3.9.4V13c0 .6.4 1 1 1s1-.4 1-1v-1.1c.3-.1.6-.2.9-.4l1.2 1.2c.4.4 1 .4 1.4 0s.4-1 0-1.4l-1.2-1.2c.2-.3.3-.6.4-.9H17c.6 0 1-.4 1-1s-.4-1-1-1h-1.1c-.1-.3-.2-.6-.4-.9l1.2-1.2c.4-.4.4-1 0-1.4s-1-.4-1.4 0l-1.2 1.2c-.3-.2-.6-.3-.9-.4V3c0-.6-.4-1-1-1zm-1 9a1 1 0 012 0v7a1 1 0 01-2 0v-7zm0 9h2v2h-2v-2z" />
            </svg>
            <span class="logo-text">SawitPedia</span>
        </div>
        <a href="/SawitPedia/Views/Auth/Logout.php" class="logout-btn">Logout</a>
    </header>

    <div class="dashboard-container">
        <center>
            <h2>Selamat datang, <?= htmlspecialchars($adminEmail) ?> 👋</h2>
        </center>
        <br>
        <div class="menu-grid">
            <div class="card">
                <h3>Tambah Artikel Baru</h3>
                <a href="/SawitPedia/Views/Admin/tambah-artikel.php">+ Buat Artikel</a>
            </div>

            <div class="card">
                <h3>Kelola Artikel</h3>
                <a href="/SawitPedia/Views/Admin/daftar-artikel.php">📋 Lihat Daftar</a>
            </div>

            <div class="card">
                <h3>Kelola Kuisioner</h3>
                <a href="/SawitPedia/Views/Admin/kuisioner.php">🧪 Kuisioner</a>
            </div>

            <div class="card">
                <h3>Logout</h3>
                <a href="/SawitPedia/Views/Auth/Logout.php">🚪 Keluar</a>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>

</body>

</html>