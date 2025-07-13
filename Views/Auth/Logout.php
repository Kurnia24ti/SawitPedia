<?php
session_start();

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke form login
header('Location: http://localhost/SawitPedia/'); // Pastikan path ini sesuai lokasi login kamu
exit;