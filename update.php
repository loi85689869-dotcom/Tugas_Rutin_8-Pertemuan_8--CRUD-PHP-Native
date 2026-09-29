<?php

require 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$mahasiswa = $result->fetch_assoc();

$stmt->close();

$query = "SELECT id, nama_prodi FROM prodi";
$prodi = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>

<body>

    <h1>Edit Data Mahasiswa</h1>

    <form action="proses_update.php" method="POST">

        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">

        <label>Nama</label>
        <br>
        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($mahasiswa['nama']); ?>"
            required
        >

        <br><br>

        <label>NIM</label>
        <br>
        <input
            type="text"
            name="nim"
            value="<?= htmlspecialchars($mahasiswa['nim']); ?>"
            required
        >

        <br><br>

        <label>Prodi</label>
        <br>

        <select name="id_prodi" required>

            <?php while ($row = $prodi->fetch_assoc()) { ?>

                <option
                    value="<?= $row['id']; ?>"
                    <?= ($row['id'] == $mahasiswa['id_prodi']) ? 'selected' : ''; ?>
                >
                    <?= htmlspecialchars($row['nama_prodi']); ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <button type="submit">Simpan Perubahan</button>

    </form>

    <br>

    <a href="index.php">Kembali</a>

</body>
</html>