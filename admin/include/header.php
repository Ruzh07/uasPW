<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header('Location: ../login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Admin Obat Lapar</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="produk.php" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="produk.php" class="nav-link">Kelola Produk</a></li>
        <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">
