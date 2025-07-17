<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Produk - Obat Lapar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
session_start();
include 'config/db.php';
include 'navbar.php';

// Handle Tambah ke Keranjang
if (isset($_POST['add_to_cart'])) {
  $id_produk = $_POST['id_produk'];

  if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
  }

  if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] = (int)$_SESSION['keranjang'][$id_produk] + 1;
  } else {
    $_SESSION['keranjang'][$id_produk] = 1;
  }

  echo '<div class="alert alert-success text-center">Produk berhasil ditambahkan ke keranjang!</div>';
}
?>

<div class="container mt-5">
  <h2 class="mb-4">Daftar Produk</h2>
  <div class="row">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM produk");
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nama_produk']) ?>" height="450">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['nama_produk']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($row['deskripsi']) ?></p>
            <p class="card-text"><strong>Rp <?= number_format($row['harga']) ?></strong></p>
            <form method="POST">
              <input type="hidden" name="id_produk" value="<?= $row['id'] ?>">
              <button type="submit" name="add_to_cart" class="btn btn-success">Tambah ke Keranjang</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
