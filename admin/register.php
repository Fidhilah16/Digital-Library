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
    <h1 id="title-txt">Tambah User</h1>
    <h2 id="title-txt">Form Tambah User</h2>

    <form action="" method="post" enctype="multipart/form-data">
      <table id="tb-form-buku">
        <tr>
          <td id="label">Nama Lengkap</td>
          <td><input type="text" name="nama_lengkap" required>
        </tr>
        <tr>
          <td id="label">Username</td>
          <td><input type="text" name="username" required></td>
        </tr>
        <tr>
          <td id="label">Password</td>
          <td><input type="password" name="password" required></td>
        </tr>
        <tr>
          <td id="label">email</td>
          <td><input type="email" name="email" required></td>
        </tr>
        <tr>
          <td id="label">Domisisli</td>
          <td><input type="text" name="domisili" required></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="daftar" value="Daftarkan">
          </td>
        </tr>
      </table>
    </form>

  </div>

</body>

</html>

<?php
include "../koneksi.php";

if (isset($_POST["daftar"])) {
  $user = $_POST["username"];
  $pass = md5("$_POST[password]");
  $nama = $_POST["nama_lengkap"];
  $email = $_POST["email"];
  $domisili = $_POST["domisili"];
  $role = "Guru RPL";
  mysqli_query($conn, "INSERT INTO tb_user (nama_lengkap, username, password, email, domisili, role)
  VALUES ('$nama','$user','$pass','$email','$domisili','$role')");
  echo"<script>alert('Berhasil Mendaftar');</script>";
}

?>