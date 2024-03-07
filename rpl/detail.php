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
    <h1 id="title-txt">Data Buku</h1>
    <h2 id="title-txt">Detail Buku</h2>

        <?php
        $id = $_GET['detail'];
        if(isset($_GET['detail]'])){
            $sql = mysqli_query($conn, "SELECT*FROM tb_buku WHERE bukuID = $id");
            $data = mysqli_fetch_array($sql);         
            echo "<fieldset id='detail'>
            <img src='../uploaded/$data[file]'>

            <div class='tb-detail'>
            <table id='tb-info'>
                <tr>
                    <td><b>Judul Buku</b></td>
                    <td>: $data[judul]</td>
                </tr>
                <tr>
                    <td><b>Kategori Buku</b></td>
                    <td>: $data[kategori]</td>
                </tr>
                <tr>
                    <td><b>Penulis Buku</b></td>
                    <td>: $data[penulis]</td>
                </tr>
                <tr>
                    <td><b>Penerbit Buku</b></td>
                    <td>: $data[penerbit]</td>
                </tr>
                <tr>
                    <td><b>Tahun Terbit</b></td>
                    <td>: $data[tahun_terbit]</td>
                </tr>
            </table>

                <table id='tb-sinopsis'>
                <tr>
                    <td><b>Sinopsis</b> </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan='2'>$data[sinopsis]</td>
                <tr>
                    <td colspan='2'><a href='?edit=$data[bukuID]'>Edit</a></td>
                </table>
            </tr>
            
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