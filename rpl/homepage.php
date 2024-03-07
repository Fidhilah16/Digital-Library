<?php
include "../koneksi.php";
session_start();

if (!isset($_SESSION["username"])) {
  header("location:../login.php");
}

//HITUNG TOTAL BUKU
$query = mysqli_query($conn, "SELECT*FROM tb_buku");
$buku = mysqli_num_rows($query);
//HITUNG TOTAL KATEGORI
$query = mysqli_query($conn, "SELECT*FROM tb_kategori");
$kat = mysqli_num_rows($query);
//HITUNG TOTAL ULASAN
$query = mysqli_query($conn, "SELECT*FROM tb_ulasan");
$ula = mysqli_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../stock/icon.png">
  <link rel="stylesheet" href="../style.css">

</head>

<body class="admin-petugas">

  <div class="sidebar">
    <h1>Digital Library</h1>
    <h3><?= $_SESSION['role'] ?></h3>

    <a href="homepage.php">Beranda</a>
    <a href="buku.php">Buku</a>
    <a href="kategori.php">Kategori</a>
    <a href="report.php">Laporan</a>

    <a id="logout-link" href="../logout.php">LogOut</a>

  </div>

  <div class="display">
    <h1 id="title-txt">Homepage</h1>

    <div class="big-container">
      <div class="mini-container">
        <span>Jumlah Buku</span>
        <hr>
        <span id="info"><?=$buku?> Buku</span>
      </div>
      <div class="mini-container1">
        <span>Jumlah Kategori</span>
        <hr>
        <span id="info"><?=$kat?> Kategori</span>
      </div>
      <div class="mini-container2">
        <span>Jumlah Ulasan</span>
        <hr>
        <span id="info"><?=$ula?> ulasan</span>
      </div>
    </div>

    <h2 id="title-txt">Data User</h2>
    <table id="tb-info-user">
      <tr>
        <td><b>Username</b></td>
        <td>
          <?= $_SESSION['username'] ?>
        </td>
      </tr>
      <tr>
        <td><b>Role</b></td>
        <td>
          <?= $_SESSION['role'] ?>
        </td>
      </tr>
      <tr>
        <td><b>Waktu Login</b></td>
        <td>
          <?= date('d / M / Y') ?>
        </td>
      </tr>
    </table>

  </div>


</body>

</html>