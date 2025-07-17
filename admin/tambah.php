<?php 
include 'include/header.php'; 
include '../config/db.php';

if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];

  move_uploaded_file($tmp, "../assets/img/" . $gambar);
  mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, deskripsi, gambar) VALUES ('$nama','$harga','$deskripsi','$gambar')");
  header("Location: produk.php");
}
?>

<h3>Tambah Produk</h3>

<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required></textarea>
  </div>
  <div class="mb-3">
    <label>Gambar Produk</label>
    <input type="file" name="gambar" class="form-control" required>
  </div>
  <button name="simpan" class="btn btn-primary">Simpan</button>
  <a href="produk.php" class="btn btn-secondary">Kembali</a>
</form>

</div>
</body>
</html>
