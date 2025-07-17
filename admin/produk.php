<?php 
include 'include/header.php'; 
include '../config/db.php'; ?>

<h3>Kelola Produk</h3>
<a href="tambah.php" class="btn btn-success mb-4">+ Tambah Produk</a>

<div class="row">
  <?php
  $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
  while ($row = mysqli_fetch_assoc($produk)) {
  ?>
  <div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
      <img src="../assets/img/<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($row['nama_produk']) ?></h5>
        <p class="card-text"><?= htmlspecialchars($row['deskripsi']) ?></p>
        <p class="fw-bold text-success">Rp <?= number_format($row['harga']) ?></p>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

</div>
</body>
</html>
