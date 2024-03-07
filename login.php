<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="stock/login-icon.png">
  <link rel="stylesheet" href="style.css">
  <title>Masuk Digital Library</title>
</head>

<body class="logreg">
  <form action="" method="POST" target="_blank">
    <fieldset>
      <h2>Masuk</h2>
      <h3>Digital Library</h3>
      <input type="text" name="username" placeholder="Masukkan Username Anda" required>
      <input type="password" name="password" placeholder="Masukkan Password Anda" required>

      <button type="submit" name="masuk">Masuk</button>
      <span id="link">Belum memiliki akun? <a href="register.php">Daftar</a></span>
    </fieldset>
  </form>

</body>

</html>

<?php
include "koneksi.php";
session_start();

if (isset($_POST['masuk'])) {
  $username = $_POST["username"];
  $pass = md5("$_POST[password]");
  $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$pass'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $level = mysqli_fetch_assoc($query);

    if ($level['role'] == "Administrator") {
      $_SESSION['role'] = "Administrator";
      $_SESSION['username'] = "$username";
      header("location:admin/homepage.php");

    } else if ($level['role'] == "Guru RPL") {
      $_SESSION['role'] = "Guru RPL";
      $_SESSION['username'] = "$username";
      header("location:rpl/homepage.php");

    } else if ($level['role'] == "Siswa") {
      $_SESSION['role'] = "Siswa";
      $_SESSION['username'] = "$username";
      header("location:bidstud/homepage.php");

    } else {
    echo "<script>alert('Gagal Login')</script>";
    }
  }
}
?>