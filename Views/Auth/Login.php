<?php
session_start();

$error = '';

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $path = __DIR__ . '/../../database.json'; // Path ke file JSON

    // Cek apakah file JSON tersedia
    if (!file_exists($path)) {
        $error = 'File database.json tidak ditemukan.';
    } else {
        $data = file_get_contents($path);
        $users = json_decode($data, true);

        if (!$users) {
            $error = 'Format JSON tidak valid.';
        } else {
            foreach ($users as $user) {
                if ($user['email'] === $email && $user['password'] === $password) {
                    // Simpan session login dan email admin
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_email'] = $email;

                    header('Location: ../../Views/Admin/dashboard.php');
                    exit;
                }
            }
            $error = 'Email atau Password salah!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin - SawitPedia</title>
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

    .login-box {
        max-width: 400px;
        margin: 60px auto;
        background: white;
        border-left: 8px solid #047857;
        padding: 32px;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .login-box h1 {
        color: #065f46;
        font-size: 22px;
        margin-bottom: 24px;
        text-align: center;
    }

    label {
        font-size: 14px;
        color: #374151;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    button {
        background-color: #047857;
        color: white;
        border: none;
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #065f46;
    }

    .alert {
        background-color: #fee2e2;
        color: #b91c1c;
        padding: 10px;
        margin-bottom: 16px;
        border-radius: 6px;
        font-size: 13px;
        text-align: center;
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
                <a href="#">Tentang</a>
                <a href="#">Kontak</a>
                <a href="#" class="btn-login">Login</a>
            </nav>
        </div>
    </header>

    <div class="login-box">
        <h1>Login Admin</h1>

        <?php if ($error): ?>
        <div class="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <footer>
        &copy; 2025 <strong>SawitPedia</strong> – Referensi Digital Penyakit Sawit Indonesia.
    </footer>

</body>

</html>