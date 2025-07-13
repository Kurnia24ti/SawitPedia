<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SawitPedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        min-height: 100vh;
        background: linear-gradient(120deg, #ecfdf5 70%, #d1fae5 100%) fixed;
        background-image: url('https://www.transparenttextures.com/patterns/leaf.png');
    }

    header {
        background: rgba(6, 95, 70, 0.95);
        color: white;
        padding: 28px 0 22px 0;
        box-shadow: 0 8px 32px rgba(6, 95, 70, 0.15);
        border-bottom: 2px solid #047857;
        position: sticky;
        top: 0;
        z-index: 20;
        animation: fadeDown 1s;
    }

    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-40px);}
        to { opacity: 1; transform: translateY(0);}
    }

    .header-container {
        max-width: 1200px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 32px;
    }

    .logo-group svg {
        transition: transform 0.4s cubic-bezier(.68,-0.55,.27,1.55);
        filter: drop-shadow(0 2px 6px #04785755);
    }
    .logo-group:hover svg {
        transform: rotate(-8deg) scale(1.1);
    }

    .logo-text {
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
        text-shadow: 0 2px 8px rgba(6,95,70,0.12);
        transition: color 0.3s;
    }
    .logo-group:hover .logo-text {
        color: #ffe066;
    }

    nav a {
        margin-left: 24px;
        color: white;
        text-decoration: none;
        font-size: 1rem;
        position: relative;
        transition: color 0.2s;
    }
    nav a::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #ffe066;
        transition: width .3s;
        position: absolute;
        left: 0;
        bottom: -4px;
    }
    nav a:hover {
        color: #ffe066;
    }
    nav a:hover::after {
        width: 100%;
    }

    .btn-login {
        background: linear-gradient(90deg, #fff 60%, #ffe066 100%);
        color: #065f46;
        padding: 8px 22px;
        border-radius: 100px;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(6,95,70,0.08);
        border: 1px solid #047857;
        transition: background 0.3s, color 0.3s;
    }
    .btn-login:hover {
        background: linear-gradient(90deg, #ffe066 60%, #fff 100%);
        color: #047857;
    }

    main {
        background: linear-gradient(120deg, #ecfdf5cc 70%, #d1fae5cc 100%);
        border-radius: 32px;
        box-shadow: 0 8px 32px rgba(6,95,70,0.07);
        margin-top: 32px;
        padding-top: 48px;
        padding-bottom: 48px;
        position: relative;
        overflow: hidden;
        animation: fadeUp 1.1s;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: translateY(0);}
    }
    main::before {
        content: '';
        position: absolute;
        top: -60px; left: -60px;
        width: 180px; height: 180px;
        background: radial-gradient(circle, #04785733 60%, transparent 100%);
        z-index: 0;
    }
    main::after {
        content: '';
        position: absolute;
        bottom: -60px; right: -60px;
        width: 180px; height: 180px;
        background: radial-gradient(circle, #ffe06633 60%, transparent 100%);
        z-index: 0;
    }
    main > * { position: relative; z-index: 1; }

    .text-center h2 {
        font-size: 2.4rem;
        font-weight: 800;
        color: #065f46;
        margin-bottom: 8px;
        letter-spacing: 1px;
        text-shadow: 0 2px 8px #d1fae5;
        animation: fadeIn 1.2s;
    }
    @keyframes fadeIn {
        from { opacity: 0;}
        to { opacity: 1;}
    }
    .text-center p {
        font-size: 1.15rem;
        color: #374151;
        margin-bottom: 8px;
        animation: fadeIn 1.5s;
    }

    .grid {
        margin-top: 2rem;
    }
    .feature-card {
        position: relative;
        overflow: hidden;
        background: rgba(255,255,255,0.95);
        box-shadow: 0 8px 32px rgba(6,95,70,0.10);
        border-radius: 2rem;
        border-left: 5px solid #047857;
        transition: box-shadow 0.3s, transform 0.3s, border-color 0.3s;
        animation: cardPop 1.2s;
    }
    .feature-card:last-child {
        border-left: 5px solid #ffe066;
    }
    @keyframes cardPop {
        from { opacity: 0; transform: scale(0.95);}
        to { opacity: 1; transform: scale(1);}
    }
    .feature-card:hover {
        box-shadow: 0 16px 48px rgba(6,95,70,0.18);
        transform: translateY(-4px) scale(1.03);
        border-left-width: 10px;
    }
    .feature-icon {
        font-size: 2.5rem;
        margin-right: 1rem;
        filter: drop-shadow(0 2px 6px #04785733);
        transition: transform 0.3s;
    }
    .feature-card:hover .feature-icon {
        transform: scale(1.15) rotate(-8deg);
    }
    .feature-title {
        font-size: 1.5rem;
        font-weight: 700;
    }
    .feature-card:last-child .feature-title {
        color: #b7791f;
    }
    .feature-card .feature-title {
        color: #047857;
    }
    .feature-card:last-child .feature-title {
        color: #b7791f;
    }
    .feature-card a {
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(6,95,70,0.08);
        transition: background 0.2s, color 0.2s, transform 0.2s;
    }

    footer {
        background: linear-gradient(90deg, #065f46 80%, #047857 100%);
        color: white;
        text-align: center;
        padding: 24px 0 10px 0;
        margin-top: 80px;
        font-size: 15px;
        letter-spacing: 0.5px;
        box-shadow: 0 -2px 12px rgba(6,95,70,0.08);
        position: relative;
    }
    .social-icons {
        margin-top: 8px;
    }
    .social-icons a {
        display: inline-block;
        margin: 0 8px;
        color: #ffe066;
        font-size: 20px;
        transition: color 0.2s;
    }
    .social-icons a:hover {
        color: #fff;
    }
    @media (max-width: 768px) {
        .header-container { flex-direction: column; gap: 12px;}
        main { border-radius: 0; }
        .grid { grid-template-columns: 1fr !important; }
    }
    </style>
</head>

<body class="bg-green-50 font-sans">

    <!-- Header -->
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
                <a href="http://localhost/SawitPedia/Tentang.php">Tentang</a>
                <a href="http://localhost/SawitPedia/Kontak.php">Kontak</a>
                <a href="http://localhost/SawitPedia/Views/Auth/Login.php" class="btn-login">Login Admin</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="max-w-6xl mx-auto py-12 px-4">
        <div class="text-center mb-10">
            <h2 class="text-4xl font-bold text-green-900 mb-2">Selamat Datang di SawitPedia 🌴</h2>
            <p class="text-gray-700 text-lg">Temukan informasi seputar penyakit kelapa sawit dan bantu diagnosa lebih
                dini untuk penanganan terbaik.</p>
        </div>

        <!-- Feature Cards -->
        <div class="grid md:grid-cols-2 gap-10">
            <!-- Card Ensiklopedia -->
            <div class="feature-card p-6 hover:shadow-2xl transition duration-300">
                <div class="flex items-center mb-4">
                    <span class="feature-icon">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="#38bdf8"><rect x="4" y="4" width="16" height="16" rx="4"/><rect x="7" y="7" width="10" height="2" rx="1" fill="#fff"/></svg>
                    </span>
                    <h3 class="feature-title">Ensiklopedia Penyakit Sawit</h3>
                </div>
                <p class="text-gray-700 mb-5 leading-relaxed">
                    Jelajahi kumpulan penyakit sawit lengkap disertai gambar, jurnal ilmiah, dan studi kasus nyata dari
                    lapangan.
                </p>
                <a href="Views\ensiklopedia\index.php"
                    class="inline-block bg-green-700 text-white px-6 py-2 rounded-full hover:bg-green-800 transition-all">Lihat
                    Ensiklopedia</a>
            </div>

            <!-- Card Kuisioner -->
            <div class="feature-card p-6 hover:shadow-2xl transition duration-300">
                <div class="flex items-center mb-4">
                    <span class="feature-icon">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="#facc15"><rect x="6" y="6" width="12" height="12" rx="6"/><rect x="10" y="10" width="4" height="2" rx="1" fill="#fff"/></svg>
                    </span>
                    <h3 class="feature-title" style="color:#b7791f">Kuisioner Diagnosis</h3>
                </div>
                <p class="text-gray-700 mb-5 leading-relaxed">
                    Jawab pertanyaan interaktif untuk mendiagnosis penyakit sawit berdasarkan gejala dan lokasi tanaman
                    Anda.
                </p>
                <a href="Views/kuisioner/index.php"
                    class="inline-block bg-yellow-500 text-white px-6 py-2 rounded-full hover:bg-yellow-600 transition-all">Mulai
                    Diagnosis</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
        <div class="social-icons">
            <a href="#"><svg width="20" height="20" fill="currentColor"><circle cx="10" cy="10" r="8"/></svg></a>
            <a href="#"><svg width="20" height="20" fill="currentColor"><rect x="4" y="4" width="12" height="12" rx="3"/></svg></a>
            <a href="#"><svg width="20" height="20" fill="currentColor"><polygon points="10,3 17,17 3,17"/></svg></a>
        </div>
    </footer>

</body>
</html>