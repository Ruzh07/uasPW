<?php
session_start();            // Aktifkan session
session_unset();            // Bersihkan semua variabel session
session_destroy();          // Hapus session sepenuhnya

// Redirect ke halaman login atau beranda
header("Location: index.php?logout=success");
exit;
?>
