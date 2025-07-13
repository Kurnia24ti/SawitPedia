<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: ../../Auth/Login.php');
  exit;
}

$success = $_GET['success'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel Baru - SawitPedia</title>
    <style>
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

    .container {
        max-width: 700px;
        margin: 50px auto;
        background: white;
        border-left: 8px solid #047857;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
    }

    h2 {
        margin-bottom: 20px;
        color: #065f46;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #065f46;
    }

    input,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    button {
        background-color: #047857;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #065f46;
    }

    .ah {
        background-color: #047857;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .ah:hover {
        background-color: #065f46;
    }

    .success-box {
        background: #dcfce7;
        color: #065f46;
        padding: 10px;
        margin-bottom: 18px;
        border-radius: 6px;
        text-align: center;
        font-size: 13px;
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
                <path d="M12 2c...z" />
            </svg>
            <span class="logo-text">SawitPedia</span>
        </div>
    </header>

    <div class="container">
        <h2>Tambah Artikel Baru 📝</h2>

        <?php if (!empty($success)): ?>
        <div class="success-box"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST" action="proses-tambah.php" onsubmit="this.querySelector('button').disabled=true;">
            <label>Judul Artikel</label>
            <input type="text" name="judul" required>

            <label>Slug / Nama File</label>
            <input type="text" name="slug" placeholder="contoh: busuk-akar" required>

            <label>Ringkasan Artikel</label>
            <textarea name="ringkasan" rows="4" required></textarea>

            <label>Konten Lengkap Artikel</label>
            <textarea name="konten" rows="10" placeholder="Isi artikel panjang di sini..." required></textarea>

            <label>Link PDF Jurnal (opsional)</label>
            <input type="url" name="pdf_link" placeholder="https://contoh.com/jurnal.pdf">

            <button type="submit">💾 Simpan Artikel</button>
        </form>
        <br>
        <a href="dashboard.php" class="ah">Kembali ke Dashboard</a>
    </div>

    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>

</body>

</html>