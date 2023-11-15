<?php
session_start(); // Memulai atau melanjutkan sesi

// Hancurkan sesi yang aktif
session_destroy();

// Redirect pengguna ke halaman masuk (ganti "login.php" dengan halaman yang sesuai)
header("Location: login.php");
exit();
?>
