<?php
include '../config/db.php';
session_start();
if ($_SESSION['role'] != 'admin') {
  header("Location: ../login.php");
  exit;
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
header("Location: produk.php");
