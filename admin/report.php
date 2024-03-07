<?php
include "../koneksi.php";
session_start();

if (!isset($_SESSION["username"])) {
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../stock/icon.png">
  <link rel="stylesheet" href="../style.css">
  <title>Digital Library</title>
</head>

<body class="admin-petugas">

  <div class="sidebar">
    <h1>Digital Library</h1>
    <h3>Administrator</h3>

    <a href="homepage.php">Beranda</a>
    <a href="buku.php">Buku</a>
    <a href="kategori.php">Kategori</a>
    <a href="report.php">Laporan</a>
    <a href="register.php">Tambah User</a>


    <a id="logout-link" href="../logout.php">LogOut</a>

  </div>

  <div class="display">
    <h1 id="title-txt">Kategori Buku</h1>
    <h2 id="title-txt">Cara Generate Laporan</h2>
    <fieldset id="generate">
      <ol>
        <li>Klik Tombol <a href="generate.php">Cetak</a></li>
        <li>Lalu silahkan pilih laporan yang akan di generate.</li>
        <li>Laporan akan masuk kedalam tampilan siap print.</li>
      </ol>
    </fieldset>
</body>

</html>