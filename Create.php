<?php
require 'koneksi.php';

$query = "SELECT id, nama_prodi FROM prodi";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>

<body>

    <h1>Tambah Data Mahasiswa</h1>

    <form action="proses_create.php" method="POST">

        <label>Nama</label>
        <br>
        <input type="text" name="nama" required>

        <br><br>

        <label>NIM</label>
        <br>
        <input type="text" name="nim" required>

        <br><br>

        <label>Prodi</label>
        <br>
        <select name="id_prodi" required>
            <option value="">-- Pilih Prodi --</option>

            <?php while ($prodi = $result->fetch_assoc()) { ?>
                <option value="<?= $prodi['id']; ?>">
                    <?= htmlspecialchars($prodi['nama_prodi']); ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <button type="submit">Simpan</button>

    </form>

    <br>

    <a href="index.php">Kembali ke Data Mahasiswa</a>

</body>
</html>