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
    <h3><?= $_SESSION['role'] ?></h3>

    <a href="homepage.php">Beranda</a>
    <a href="buku.php">Buku</a>
    <a href="kategori.php">Kategori</a>
    <a href="report.php">Laporan</a>



    <a id="logout-link" href="logout.php">LogOut</a>

  </div>

  <div class="display">
    <h1 id="title-txt">Generate Laporan</h1>
    <!-- <h2 id="title-txt">Lapor</h2> -->

    <table id="print">
      <tr>
        <th>Laporan</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>Laporan Data Buku</td>
        <td><a href="print-data-buku.php">Generate</a></td>
      </tr>
      <tr>
        <td>Laporan Data Kategori</td>
        <td><a href="print-data-kategori.php">Generate</a></td>
      </tr>
      <tr>
        <td>Laporan Data Pengguna</td>
        <td><a href="print-data-user.php">Generate</a></td>
      </tr>
    </table>

</body>

</html>