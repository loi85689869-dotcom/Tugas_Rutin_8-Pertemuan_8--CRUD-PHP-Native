<?php

require 'koneksi.php';

$query = "SELECT mahasiswa.id, mahasiswa.nama, mahasiswa.nim, prodi.nama_prodi
          FROM mahasiswa
          JOIN prodi
          ON mahasiswa.id_prodi = prodi.id";

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>

<body>

    <h1>Data Mahasiswa</h1>

    <a href="index.php">+ Tambah Data</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><?= $no++; ?></td>

            <td>
                <?= htmlspecialchars($row['nama']); ?>
            </td>

            <td>
                <?= htmlspecialchars($row['nim']); ?>
            </td>

            <td>
                <?= htmlspecialchars($row['nama_prodi']); ?>
            </td>

            <td>
                <a href="update.php?id=<?= $row['id']; ?>">
                    Edit
                </a>

                <a href="delete.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?');">
                    Hapus
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</body>
</html>