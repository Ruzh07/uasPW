<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Keranjang - Obat Lapar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
session_start();
include 'config/db.php';
include 'navbar.php';

// Hapus item tertentu
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  if (isset($_SESSION['keranjang'][$id])) {
    unset($_SESSION['keranjang'][$id]);
  }
  header("Location: keranjang.php");
  exit;
}

// Kosongkan keranjang
if (isset($_GET['kosongkan'])) {
  unset($_SESSION['keranjang']);
  header("Location: keranjang.php");
  exit;
}

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
?>

<div class="container mt-5">
  <h2 class="mb-4">Keranjang Belanja</h2>

  <?php if (empty($keranjang)) { ?>
    <div class="alert alert-info">Keranjang kamu masih kosong.</div>
  <?php } else { ?>

    <div class="row">
      <?php
      $grand_total = 0;

      foreach ($keranjang as $id_produk => $qty) {
        $id_produk = (int)$id_produk;
        $qty = (int)$qty;

        if ($qty < 1) continue;

        $query = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id_produk");
        $p = mysqli_fetch_assoc($query);

        if (!$p) continue;

        $harga = isset($p['harga']) ? (int)$p['harga'] : 0;
        $total = $harga * $qty;
        $grand_total += $total;
      ?>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/<?= htmlspecialchars($p['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['nama_produk']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($p['nama_produk']) ?></h5>
            <p class="card-text">Harga Satuan: Rp <?= number_format($harga) ?></p>
            <p class="card-text">Jumlah: <?= $qty ?></p>
            <p class="card-text"><strong>Subtotal: Rp <?= number_format($total) ?></strong></p>
            <a href="keranjang.php?hapus=<?= $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
          </div>
        </div>
      </div>

      <?php } ?>
    </div>

    <?php if ($grand_total > 0) { ?>
    <div class="card mt-3">
      <div class="card-body">
        <h5>Total Belanja: Rp <?= number_format($grand_total) ?></h5>
        <?php
        $pesan = "Halo Admin, saya mau pesan:\n";
        foreach ($keranjang as $id_produk => $qty) {
          $query = mysqli_query($conn, "SELECT * FROM produk WHERE id=" . (int)$id_produk);
          $p = mysqli_fetch_assoc($query);
          if (!$p) continue;
          $pesan .= "- " . $p['nama_produk'] . " x " . (int)$qty . "\n";
        }
        $pesan .= "Total: Rp " . number_format($grand_total);
        $link_wa = "https://wa.me/62xxxxxxxxxxx?text=" . urlencode($pesan);
        ?>
        <a href="<?= $link_wa ?>" class="btn btn-success mt-2">Selesaikan Pesanan via WhatsApp</a>
        <a href="keranjang.php?kosongkan=true" class="btn btn-warning mt-2">Kosongkan Keranjang</a>
      </div>
    </div>
    <?php } ?>

  <?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
