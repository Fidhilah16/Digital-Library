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
    <h2 id="title-txt">Koleksi Buku</h2>

    <div class="koleksi-wrap">
      <?php
      $sql = mysqli_query($conn, "SELECT * FROM tb_buku");
      while ($data = mysqli_fetch_array($sql)) {
        echo "
      <fieldset id='buku'>
        <img src='../uploaded/$data[file]'>

        <div class='tb-info'>
          <table id='tb-info'>
            <tr>
              <td id='label'><b>Judul</b></td>
              <td>: $data[judul]</td>
            </tr>
            <tr>
              <td id='label'><b>Kategori</b></td>
              <td>: $data[kategori]</td>
            </tr>
            <tr>
              <td id='label'><b>Penulis</b></td>
              <td>: $data[penulis]</td>
            </tr>
            <tr>
              <td id='label'><b>Penerbit</b></td>
              <td>: $data[penerbit]</td>
            </tr>
            <tr>
              <td colspan='2'>
                <a href='pinjam.php?pinjam=$data[bukuID]'>Pinjam</a>
                <a href='detail.php?detail=$data[bukuID]'>Detail</a></td>
              </td>
            </tr>
            </table>
           
      </fieldset>
      ";

      }
      ?>
    </div>

  </div>


</body>

</html>

<?php
    if(isset($_GET['del'])){
    $del = $_GET['del'];
    mysqli_query($conn, "DELETE FROM tb_buku WHERE bukuID = '$del'");
  }
?>