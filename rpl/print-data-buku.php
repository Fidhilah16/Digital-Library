<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="stock/login-icon.png">
  <link rel="stylesheet" href="../style.css">
  <title>Digital Library</title>

</head>

<body class="print">
  <h1>Laporan Data Buku</h1>
  <h3>Digital Library</h3>
  <table id="report-print">
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Kategori Buku</th>
      <th>Penulis Buku</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
    </tr>
  <?php
    include "../koneksi.php";
    $query = mysqli_query($conn, "SELECT*FROM tb_buku");
    $buku = mysqli_num_rows($query);

    $no = 1;
    $sql = mysqli_query($conn, "SELECT * FROM tb_buku");
    while ($data = mysqli_fetch_array($sql)) {
    echo "
    <tr>
      <td>$no</td>
      <td>$data[judul]</td>
      <td>$data[kategori]</td>
      <td>$data[penulis]</td>
      <td>$data[penerbit]</td>
      <td>$data[tahun_terbit]</td>
    </tr>"; 
    $no++;}
    ?>
    <tr>
      <td id='unik' colspan='6'><b>Jumlah Buku:</b> <?= $buku ?> Buku</td>
    </tr>
  </table>
</body>

</html>

<script>window.print();</script>