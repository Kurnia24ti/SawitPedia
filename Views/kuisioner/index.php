<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuisioner Diagnosa SawitPedia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    label {
        font-size: 14px;
        color: #374151;
    }

    .section-title {
        font-weight: bold;
        font-size: 18px;
        color: #047857;
        margin-top: 36px;
        margin-bottom: 12px;
        border-left: 6px solid #047857;
        padding-left: 12px;
    }

    footer {
        background: #065f46;
        color: white;
        text-align: center;
        padding: 20px 0;
        margin-top: 80px;
        font-size: 14px;
    }

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
    </style>
</head>

<body>

    <header>
        <div class="header-container">
            <div class="logo-group">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2c-.6 0-1 .4-1 1v1.1c..." />
                </svg>
                <h1 class="site-title">SawitPedia</h1>
            </div>
            <nav>
                <a href="http://localhost/SawitPedia/" class="btn-login">Back</a>
            </nav>
        </div>
    </header>

    <main class="max-w-3xl mx-auto bg-white p-8 my-12 rounded-2xl shadow-xl border-l-8 border-green-600">
        <h1 class="text-3xl font-bold text-green-800 mb-6 text-center">🧪 Kuisioner Diagnosa Penyakit Sawit</h1>

        <form action="proses-kuisioner.php" method="POST">

            <!-- A. Identitas Responden -->
            <h2 class="section-title">A. Identitas Responden</h2>

            <label>1. Nama Petani/Perusahaan:</label>
            <input type="text" name="nama_petani" required>

            <label>2. Lokasi Perkebunan (Desa/Kecamatan/Kabupaten):</label>
            <input type="text" name="lokasi" required>

            <label>3. Luas Perkebunan (hektar):</label>
            <input type="text" name="luas" required>

            <label>4. Umur rata-rata tanaman sawit:</label>
            <input type="text" name="umur_tanaman" required>

            <label>5. Varietas sawit yang ditanam:</label>
            <input type="text" name="varietas" required>

            <!-- B. Gejala Fisik Tanaman -->
            <h2 class="section-title">B. Gejala Fisik Tanaman</h2>

            <label>6. Perubahan warna daun sawit:</label>
            <select name="warna_daun" required>
                <option value="">-- Pilih --</option>
                <option>Tidak</option>
                <option>Menguning</option>
                <option>Coklat/memucat</option>
                <option>Mengering pada ujungnya</option>
            </select>

            <label>7. Batang berlubang/membusuk:</label>
            <select name="batang_busuk" required>
                <option value="">-- Pilih --</option>
                <option>Ya</option>
                <option>Tidak</option>
            </select>

            <label>8. Buah sawit busuk saat muda:</label>
            <select name="buah_busuk" required>
                <option value="">-- Pilih --</option>
                <option>Ya</option>
                <option>Tidak</option>
            </select>

            <label>9. Pelepah mudah patah/rontok:</label>
            <select name="pelepah_rontok" required>
                <option value="">-- Pilih --</option>
                <option>Ya</option>
                <option>Tidak</option>
            </select>

            <label>10. Ada jamur/lendir di batang atau akar:</label>
            <select name="jamur_akar" required>
                <option value="">-- Pilih --</option>
                <option>Ya</option>
                <option>Tidak</option>
            </select>

            <!-- C. Kondisi Lingkungan -->
            <h2 class="section-title">C. Kondisi Lingkungan</h2>

            <label>11. Drainase saat hujan:</label>
            <select name="drainase" required>
                <option value="">-- Pilih --</option>
                <option>Baik (tidak tergenang)</option>
                <option>Sedikit tergenang</option>
                <option>Sering tergenang</option>
            </select>

            <label>12. Jenis tanah:</label>
            <select name="jenis_tanah" required>
                <option value="">-- Pilih --</option>
                <option>Gambut</option>
                <option>Lempung</option>
                <option>Berpasir</option>
                <option>Lainnya</option>
            </select>

            <label>13. Pernah banjir 1 tahun terakhir:</label>
            <select name="banjir" required>
                <option value="">-- Pilih --</option>
                <option>Ya</option>
                <option>Tidak</option>
            </select>

            <!-- D. Praktik Budidaya -->
            <h2 class="section-title">D. Praktik Budidaya</h2>

            <label>14. Frekuensi pemupukan:</label>
            <select name="pemupukan" required>
                <option value="">-- Pilih --</option>
                <option>Tidak pernah</option>
                <option>1x setahun</option>
                <option>2x setahun</option>
                <option>Lebih dari 2x</option>
            </select>

            <label>15. Sanitasi kebun rutin:</label>
            <select name="sanitasi" required>
                <option value="">-- Pilih --</option>
                <option>Ya</option>
                <option>Tidak</option>
            </select>

            <label>16. Penggunaan pestisida/fungisida:</label>
            <select name="penggunaan_pestisida" required>
                <option value="">-- Pilih --</option>
                <option>Tidak</option>
                <option>Kadang-kadang</option>
                <option>Rutin</option>
            </select>

            <label>17. Jenis pestisida/fungisida (opsional):</label>
            <input type="text" name="jenis_pestisida">

            <!-- E. Riwayat Penyakit -->
            <h2 class="section-title">E. Riwayat Penyakit</h2>

            <label>18. Riwayat penyakit sebelumnya:</label>
            <select name="riwayat_penyakit" required>
                <option value="">-- Pilih --</option>
                <option>Tidak</option>
                <option>Ya</option>
            </select>
            <input type="text" name="nama_penyakit" placeholder="Jika ya, sebutkan..." style="margin-top:4px;">

            <label>19. Jumlah tanaman terdampak:</label>
            <select name="jumlah_terdampak" required>
                <option value="">-- Pilih --</option>
                <option>1–10 pohon</option>
                <option>11–50 pohon</option>
                <option>>50 pohon</option>
            </select>

            <label>20. Sejak kapan gejala muncul:</label>
            <select name="durasi_gejala" required>
                <option value="">-- Pilih --</option>
                <option>
                    < 1 bulan</option>
                <option>1–3 bulan</option>
                <option>>3 bulan</option>
            </select>

            <button type="submit"
                class="mt-6 w-full bg-green-700 text-white py-2 rounded-full hover:bg-green-800 font-semibold transition-all">
                📩 Kirim Kuisioner
            </button>
        </form>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>



</body>

</html>