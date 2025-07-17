<!-- navbar.php -->
<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="index.php">
      🍽️ Obat Lapar
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link <?= $current == 'index.php' ? 'active text-primary fw-bold' : '' ?>" href="index.php">
            <i class="bi bi-house-door me-1"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'produk.php' ? 'active text-primary fw-bold' : '' ?>" href="produk.php">
            <i class="bi bi-grid me-1"></i> Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'tentang.php' ? 'active text-primary fw-bold' : '' ?>" href="tentang.php">
            <i class="bi bi-info-circle me-1"></i> Lokasi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'kontak.php' ? 'active text-primary fw-bold' : '' ?>" href="kontak.php">
            <i class="bi bi-info-circle me-1"></i> Contact
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'keranjang.php' ? 'active text-primary fw-bold' : '' ?>" href="keranjang.php">
            <i class="bi bi-cart me-1"></i> Keranjang
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-primary ms-lg-3" href="login.php">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
