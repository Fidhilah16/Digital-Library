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
    <!-- <h2 id="title-txt">Form T</h2> -->

    <form action="" method="post">
      <table id="tb-form-kategori">
        <tr>
          <td>
            <b>Kategori Baru</b>
          </td>
          <td><input type="text" name="kategori" required></td>
          <td><input type="submit" name="tambah" value="Tambah Kategori Baru"></td>
        </tr>
      </table>
    </form>

    <div class="wrap-table">
      <table id="tb-display-kategori">
        <tr>
          <th>No</th>
          <th>Kategori Buku</th>
          <th>Action</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($conn, "SELECT * FROM tb_kategori");
        while ($data = mysqli_fetch_array($sql)) {
          echo "
        <tr>
          <td>$no</td>
          <td>$data[nama_kategori]</td>
          <td><a href='?del=$data[kategoriID]'>Hapus</a></td>
        </tr>";
        $no++;
        }
          ?>
      </table>
    </div>

  </div>

</body>

</html>

<?php
if (isset($_POST["tambah"])) {
  $kategori = $_POST["kategori"];
  mysqli_query($conn, "INSERT INTO tb_kategori (nama_kategori) VALUES ('$kategori')");
  echo "<script>alert('Berhasil Menambahkan Kategori'></script>";
}

    if(isset($_GET['del'])){
    $del = $_GET['del'];
    mysqli_query($conn, "DELETE FROM tb_kategori WHERE kategoriID = '$del'");
  }
?>