<?php
session_start();
include '../config/db.php';

// Proteksi halaman: hanya bisa diakses admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
  exit;
}

// Ambil data produk
$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <h2 class="mb-4">Dashboard Admin - Daftar Produk</h2>

  <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Produk</a>
  <a href="../logout.php" class="btn btn-outline-danger mb-3 float-end">Logout</a>

  <?php if (mysqli_num_rows($produk) > 0): ?>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($produk)): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="../img/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama_produk']; ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama_produk']; ?></h5>
              <p class="card-text"><?= $row['deskripsi']; ?></p>
              <p class="fw-bold text-success">Rp <?= number_format($row['harga']); ?></p>
              <a href="edit_produk.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="hapus_produk.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">Belum ada produk.</div>
  <?php endif; ?>
</div>

</body>
</html>
