<?php
include "koneksi.php";

$sql = "SELECT * FROM hewan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">📋 Data Hewan</h2>

    <!-- Tombol tambah -->
    <div class="mb-3 text-end">
        <a href="tambah_data.php" class="btn btn-success">➕ Tambah Hewan</a>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Hewan</th>
                <th>Jenis Hewan</th>
                <th>Asal</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id_hewan"]."</td>
                            <td>".$row["nama_hewan"]."</td>
                            <td>".$row["jenis_hewan"]."</td>
                            <td>".$row["asal"]."</td>
                            <td>".$row["jumlah"]."</td>
                            <td>
                                <a href='edit_hewan.php?id=".$row["id_hewan"]."' class='btn btn-warning btn-sm'>✏ Edit</a>
                                <a href='hapus.php?id=".$row["id_hewan"]."' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>🗑 Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>