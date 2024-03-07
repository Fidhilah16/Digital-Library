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

    <a id="logout-link" href="../logout.php">LogOut</a>

  </div>

  <div class="display">
    <h1 id="title-txt">Buku</h1>
    <h2 id="title-txt">Form Tambah Buku</h2>

    <form action="" method="post" enctype="multipart/form-data">
      <table id="tb-form-buku">
        <tr>
          <td id="label">Judul Buku</td>
          <td><input type="text" name="judul" required></td>
        </tr>
        <tr>
          <td id="label">Kategori Buku</td>
          <td><select name="kategori">
            <?php
              $sql = mysqli_query($conn, "SELECT * FROM tb_kategori");
              while ($data = mysqli_fetch_array($sql)) {
            ?>  

            <option><?=$data['nama_kategori']?></option>
            <?php } ?>  
            </select></td>

        </tr>
        <tr>
          <td id="label">Upload Cover</td>
          <td><input type="file" name="file" required>
        </tr>
        <tr>
          <td id="label">Penulis Buku</td>
          <td><input type="text" name="penulis" required></td>
        </tr>
        <tr>
          <td id="label">Penerbit Buku</td>
          <td><input type="text" name="penerbit" required></td>
        </tr>
        <tr>
          <td id="label">Tahun Terbit Buku</td>
          <td><input type="text" name="tahun_terbit" required></td>
        </tr>
        <tr>
          <td id="label">Sinopsis</td>
          <td><textarea name="sinopsis"></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="tambah" value="Tambah Buku">
            <a href="koleksi.php">Lihat Koleksi</a>
          </td>
        </tr>
      </table>
    </form>

  </div>

</body>

</html>

<?php
if (isset($_POST["tambah"])) {
  $judul = $_POST["judul"];
  $kategori = $_POST["kategori"];
  $penulis = $_POST["penulis"];
  $penerbit = $_POST["penerbit"];
  $t_terbit = $_POST["tahun_terbit"];
  $sinopsis = $_POST["sinopsis"];

  $nama_file = $_FILES["file"]["name"];
  $tmp_name = $_FILES["file"]["tmp_name"];
  $direktori = "../uploaded/" . $nama_file;
  mysqli_query($conn, "INSERT INTO tb_buku (judul, kategori, file, penulis, penerbit, tahun_terbit, sinopsis)
  VALUES('$judul','$kategori','$nama_file','$penulis','$penerbit','$t_terbit','$sinopsis')");

  move_uploaded_file($tmp_name, $direktori);
  header("location:koleksi.php");
}
?>