<?php include 'include/header.php'; include '../config/db.php';

$id = $_GET['id'];
$produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id = $id"));

if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];

  if ($_FILES['gambar']['name'] != '') {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../assets/img/" . $gambar);
    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id");
  } else {
    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id=$id");
  }

  header("Location: produk.php");
}
?>

<h3>Edit Produk</h3>

<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="nama" class="form-control" value="<?= $produk['nama_produk'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required><?= $produk['deskripsi'] ?></textarea>
  </div>
  <div class="mb-3">
    <label>Gambar Baru (kosongkan jika tidak diubah)</label>
    <input type="file" name="gambar" class="form-control">
  </div>
  <button name="update" class="btn btn-primary">Update</button>
  <a href="produk.php" class="btn btn-secondary">Kembali</a>
</form>

</div>
</body>
</html>
