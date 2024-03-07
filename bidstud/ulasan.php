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
    <h1 id="title-txt">Ulasan Buku</h1>
    <!-- <h2 id="title-txt">Form T</h2> -->

    <form action="" method="post">
      <table id="tb-form-kategori">
        <tr>
            <td id="label"><b>Judul Buku</b></td>
            <td id="input"><select name="judul">
            <?php
              $sql = mysqli_query($conn, "SELECT * FROM tb_buku");
              while ($data = mysqli_fetch_array($sql)) {
            ?>  
                <option><?=$data['judul']?></option>
            <?php } ?>  
            </select></td>

            </tr>
            <tr>
          <td id="label"><b>Rating</b></td>
          <td id="input"><select name="rating">
            <option>1/5</option>
            <option>2/5</option>
            <option>3/5</option>
            <option>4/5</option>
            <option>5/5</option>
           
          </select></td>
          <tr>
            <td id="label"><b>Ulasan</b></td>
            <td id="input"  ><textarea name="ulasan"></textarea></td>
          <!-- <td><input type="submit" name="tambah" value="Tambah Kategori Baru"></td> -->
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="ulas" value="Beri Ulasan"></td>
      </table>
    </form>

    <div class="wrap-table">
        <table id="tb-rating">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Judul</th>
                <th>Rating</th>
                <th>Ulasan</th>
            </tr>
            <?php
            $no=1;
            $sql = mysqli_query($conn, "SELECT * FROM tb_ulasan");
            while ($data = mysqli_fetch_array($sql)) {
            echo "<tr>
                <td>$no<?\/td>
                <td>$data[username]</td>
                <td>$data[judul]</td>
                <td>$data[rating]</td>
                <td>$data[ulasan]</td>
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
if (isset($_POST["ulas"])) {
    
    $user = $_SESSION['username'];
    $buku = $_POST['judul'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];
  
    // mysqli_query($conn, "SELECT * FROM tb_ulasan LEFT JOIN tb_user ON tb_ulasan.ulasanID = userID");
    mysqli_query($conn, "INSERT INTO tb_ulasan (username, judul, ulasan, rating) 
    VALUES ('$user','$buku','$ulasan','$rating')");
    echo "<script>alert('Berhasil Mengulas Buku');</script>";
}
?>