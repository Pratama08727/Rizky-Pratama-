<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_hewan'];
    $jenis  = $_POST['jenis_hewan'];
    $asal   = $_POST['asal'];
    $jumlah = $_POST['jumlah'];

    $sql = "INSERT INTO hewan (nama_hewan, jenis_hewan, asal, jumlah) 
            VALUES ('$nama', '$jenis', '$asal', '$jumlah')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Hewan</title>
</head>
<body>
  <h2>Tambah Data Hewan</h2>
  <form method="post">
    <label>Nama Hewan:</label><br>
    <input type="text" name="nama_hewan" required><br><br>

    <label>Jenis Hewan:</label><br>
    <input type="text" name="jenis_hewan" required><br><br>

    <label>Asal:</label><br>
    <textarea name="asal"></textarea><br><br>

    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
  </form>
</body>
</html>