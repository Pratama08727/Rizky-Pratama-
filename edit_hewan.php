<?php
include "koneksi.php"; // koneksi ke database


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM hewan WHERE id_hewan = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}


if (isset($_POST['update'])) {
    $id     = $_POST['id_hewan'];
    $nama   = $_POST['nama_hewan'];
    $jenis  = $_POST['jenis_hewan'];
    $asal   = $_POST['asal'];
    $jumlah = $_POST['jumlah'];

    $sql = "UPDATE hewan 
            SET nama_hewan='$nama', jenis_hewan='$jenis', asal='$asal', jumlah='$jumlah' 
            WHERE id_hewan=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui. <a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Hewan</title>
</head>
<body>
    <h2>Edit Data Hewan</h2>
    <form method="post">
        <input type="hidden" name="id_hewan" value="<?php echo $row['id_hewan']; ?>">

        <label>Nama Hewan:</label><br>
        <input type="text" name="nama_hewan" value="<?php echo $row['nama_hewan']; ?>"><br><br>

        <label>Jenis Hewan:</label><br>
        <input type="text" name="jenis_hewan" value="<?php echo $row['jenis_hewan']; ?>"><br><br>

        <label>Asal:</label><br>
        <textarea name="asal"><?php echo $row['asal']; ?></textarea><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>"><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>