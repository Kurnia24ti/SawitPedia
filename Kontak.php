<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontak - SawitPedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #ecfdf5 url('https://www.transparenttextures.com/patterns/leaf.png');
        min-height: 100vh;
    }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-gradient-to-r from-emerald-900 to-emerald-700 text-white py-5 shadow-md">
        <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2c-.6 0-1 .4-1 1v1.1c..." />
                </svg>
                <span class="text-2xl font-bold">SawitPedia</span>
            </div>
            <nav class="space-x-6">
                <a href="Tentang.php" class="text-sm hover:underline">Tentang</a>
                <a href="Kontak.php" class="text-sm underline font-semibold">Kontak</a>
                <a href="index.php"
                    class="bg-white text-emerald-700 px-4 py-1.5 rounded-full font-semibold text-sm">Beranda</a>
            </nav>
        </div>
    </header>

    <br>

    <!-- Konten Utama -->
    <main class="max-w-3xl mx-auto py-16 px-6 bg-white border-l-4 border-yellow-500 rounded-3xl shadow-xl">
        <h1 class="text-3xl font-bold text-yellow-700 mb-4 text-center">📮 Kontak SawitPedia</h1>
        <p class="text-gray-700 text-lg leading-relaxed mb-6 text-center">
            Punya pertanyaan, saran, atau mau kirim data lapangan? Jangan ragu hubungi kami.
        </p>

        <div class="space-y-6 text-gray-700 text-base">
            <div>
                <strong>📧 Email:</strong> <a href="mailto:sawitpedia@gmail.com"
                    class="text-emerald-700 underline">sawitpedia@gmail.com</a>
            </div>
            <div>
                <strong>📱 WhatsApp:</strong> <a href="https://wa.me/6281234567890"
                    class="text-emerald-700 underline">+62 812-3456-7890</a>
            </div>
            <div>
                <strong>🏢 Lokasi Kantor (simulasi):</strong> Jl. Kelapa Sawit No.12, Riau, Indonesia
            </div>
        </div>

        <div class="mt-10 text-sm text-center text-gray-500">
            Kami akan membalas dalam waktu 1x24 jam selama hari kerja. Untuk informasi cepat, gunakan WhatsApp atau
            email.
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-emerald-800 text-white text-center py-4 mt-16 text-sm">
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>

</body>

</html>