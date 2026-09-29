<?php

require 'koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$id_prodi = $_POST['id_prodi'];

$stmt = $conn->prepare(
    "INSERT INTO mahasiswa (nama, nim, id_prodi) VALUES (?, ?, ?)"
);

$stmt->bind_param("ssi", $nama, $nim, $id_prodi);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: data.php");
exit;

?>