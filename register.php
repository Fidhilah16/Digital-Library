<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="stock/icon-register.png">
  <link rel="stylesheet" href="style.css">
  <title>Daftar Digital Library</title>
</head>

<body class="logreg">
  <form action="" method="POST">
    <fieldset>
      <h2>Daftar</h2>
      <h3>Digital Library</h3>
      <input type="text" name="nama_lengkap" placeholder="Daftarkan Nama Anda" required>
      <input type="text" name="username" placeholder="Daftarkan Username Anda" required>
      <input type="password" name="password" placeholder="Daftarkan Password Anda" required>
      <input type="email" name="email" placeholder="Masukkan Email Anda" required>
      <input type="text" name="domisili" placeholder="Masukkan Domisili Anda" required>

      <button type="submit" name="daftar">Daftar</button>
      <span id="link">Sudah memiliki akun? <a href="login.php">Masuk</a></span>
    </fieldset>
  </form>

</body>

</html>

<?php
include "koneksi.php";

if (isset($_POST["daftar"])) {
  $user = $_POST["username"];
  $pass = md5("$_POST[password]");
  $nama = $_POST["nama_lengkap"];
  $email = $_POST["email"];
  $domisili = $_POST["domisili"];
  $role = "Siswa";
  mysqli_query($conn, "INSERT INTO tb_user (nama_lengkap, username, password, email, domisili, role)
  VALUES ('$nama','$user','$pass','$email','$domisili','$role')");
  echo"<script>alert('Berhasil Daftar Sebagai Siswa');</script>";
  header("location:login.php");
  
}

?>