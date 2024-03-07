<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../stock/icon.png">
  <link rel="stylesheet" href="../style.css">
  <title>Digital Library</title>

</head>

<body class="print">
  <h1>Laporan Data Pengguna</h1>
  <h3>Digital Library</h3>
  <table id="report-print">
    <tr>
      <th>No</th>
      <th>Role</th>
      <th>Nama Lengkap</th>
      <th>Username</th>
      <th>Email</th>
      <th>Domisili</th>
    </tr>
    <?php
    include "../koneksi.php";
    $query = mysqli_query($conn, "SELECT*FROM tb_user");
    $user = mysqli_num_rows($query);

    $no = 1;
    $sql = mysqli_query($conn, "SELECT * FROM tb_user");
    while ($data = mysqli_fetch_array($sql)) {
    echo "
    <tr>
      <td>$no</td>
      <td>$data[role]</td>
      <td>$data[nama_lengkap]</td>
      <td>$data[username]</td>
      <td>$data[email]</td>
      <td>$data[domisili]</td>
    </tr>"; 
    $no++;}
    ?>
    <tr>
      <td id='unik' colspan='6'><b>Jumlah Pengguna:</b> <?= $user ?> Pengguna</td>
    </tr>
  </table>
</body>

</html>

<script>window.print();</script>