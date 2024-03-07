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

<body class="peminjam">

<div class="sidebar">
    <h1>Digital Library</h1>
    <h3><?= $_SESSION['role'] ?></h3>

    <a href="homepage.php">Beranda</a>
    <a href="koleksi.php">Data Buku</a>
    <a href="ulasan.php">Ulasan</a>

    <a id="logout-link" href="../logout.php">LogOut</a>

  </div>

  <div class="display">
    <h1 id="title-txt">Data Buku</h1>
    <h2 id="title-txt">Form Peminjaman Buku</h2>

    <?php
      $pinjam = $_GET['pinjam'];
      if(isset($_GET['pinjam'])){
        $query = mysqli_query($conn, "SELECT*FROM tb_buku");
        $data = mysqli_fetch_array($query);
      }
    ?>
    
    <form action="" method="post" enctype="multipart/form-data">
      <table id="tb-form-buku">
        <tr>
          <td id="label">Username</td>
          <td><input type="text" name="username" value="<?= $_SESSION['username'] ?>" readonly required></td>
        </tr>
        <tr>
          <td id="label">Judul Buku</td>
          <td><input type="text" name="judul" value="<?= $data['judul'] ?>" readonly required></td>
        </tr>
        <tr>
          <td id="label">Tanggal Pinjam</td>
          <td><input type="text" name="t_pinjam" value="<?= date('d / D / M / Y') ?>" readonly required></td>
        </tr>
        <tr>
          <td id="label">Tanggal Kembali</td>
          <td><input type="date" name="t_kembali" required></td>
        </tr>


        <tr>
          <td></td>
          <td>
            <input type="submit" name="tambah" value="Pinjam">
          </td>
        </tr>
      </table>
    </form>

  </div>

</body>

</html>

<?php
if (isset($_POST["tambah"])) {
  $username = $_POST["username"]; 
  $judul = $_POST["judul"];
  $t_pinjam = $_POST["t_pinjam"];
  $t_kembali = $_POST["t_kembali"];
  $status = "Dipinjam";

  mysqli_query($conn, "INSERT INTO tb_peminjaman (username, judul, tgl_peminjaman, tgl_pengembalian, status)
  VALUES('$username','$judul','$t_pinjam','$t_kembali','$status')");
  echo"<script>alert('Berhasil Meminjam Buku');</script>";
}
?>