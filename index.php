<?php include 'navbar.php'; ?>
<?php include 'config/db.php'; ?>

<?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
  <div class="alert alert-success text-center">Anda berhasil logout.</div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Obat Lapar - Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- HERO SLIDER -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/p1.jpg" class="d-block w-100" style="height:480px; object-fit:cover;" alt="Promo 1">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
        <h2 class="text-warning">Makan Kenyang!</h2>
        <p>Menu yang menarik hingga akhir bulan ini.</p>
        <a href="produk.php" class="btn btn-warning">Lihat Menu</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/p2.jpg" class="d-block w-100" style="height:480px; object-fit:cover;" alt="Promo 2">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
        <h2 class="text-warning">Menu Favorit </h2>
        <p>Cepat, murah, dan bikin kenyang!</p>
        <a href="produk.php" class="btn btn-outline-light">Lihat Menu</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- KENAPA PILIH KAMI -->
<section class="py-5 bg-white text-center">
  <div class="container">
    <h2 class="mb-4">Kenapa Pilih Kami?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="text-warning fs-1"><i class="bi bi-lightning-charge"></i></div>
        <h5>Cepat & Praktis</h5>
        <p>Makanan disiapkan cepat tanpa nunggu lama.</p>
      </div>
      <div class="col-md-4">
        <div class="text-warning fs-1"><i class="bi bi-wallet2"></i></div>
        <h5>Harga Terjangkau!</h5>
        <p>Harga cocok di akhir bulan.</p>
      </div>
      <div class="col-md-4">
        <div class="text-warning fs-1"><i class="bi bi-emoji-smile"></i></div>
        <h5>Rasa Dijamin</h5>
        <p>Enak, bergizi, dan bikin balik lagi!</p>
      </div>
    </div>
  </div>
</section>

<!-- PRODUK UNGGULAN -->
<div class="container my-5">
  <h2 class="text-center mb-5">Produk Unggulan</h2>

  <?php
  $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 3");
  $index = 0;
  while ($row = mysqli_fetch_assoc($produk)):
    $index++;
    $reverse = ($index % 2 == 0);
  ?>
  <div class="row align-items-center mb-5 <?= $reverse ? 'flex-md-row-reverse' : '' ?>">
    <div class="col-md-6">
      <img src="assets/img/<?= htmlspecialchars($row['gambar']); ?>" class="img-fluid rounded-4 shadow w-100" style="height:300px; object-fit:cover;" alt="<?= htmlspecialchars($row['nama_produk']); ?>">
    </div>
    <div class="col-md-6">
      <h3><?= htmlspecialchars($row['nama_produk']); ?></h3>
      <p><?= htmlspecialchars($row['deskripsi']); ?></p>
      <p class="fw-bold text-success">Rp <?= number_format($row['harga']); ?></p>

      <blockquote class="blockquote bg-light p-3 rounded shadow-sm">
        <p class="mb-0">
          <?= $index == 2 ? '"Murah, cepat, dan bikin kenyang!"' : '"Rasanya enak banget, cocok buat anak kos!"'; ?>
        </p>
        <footer class="blockquote-footer mt-1">
          <?= $index == 2 ? 'Rizki, Teknik Informatika' : 'Dina, Mahasiswa Akuntansi'; ?>
        </footer>
      </blockquote>
      <div class="text-warning mt-2">
        <?= $index == 2 ? '★★★★★' : '★★★★☆'; ?>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
</div>

<!-- CTA -->
<div class="text-center py-5 bg-light">
  <h4>Siap untuk kenyang dengan harga hemat?</h4>
  <a href="produk.php" class="btn btn-dark btn-lg mt-2">Lihat Menu Sekarang</a>
</div>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
