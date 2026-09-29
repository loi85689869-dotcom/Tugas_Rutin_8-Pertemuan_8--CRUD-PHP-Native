<?php

require 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$id_prodi = $_POST['id_prodi'];

$stmt = $conn->prepare(
    "UPDATE mahasiswa 
     SET nama = ?, nim = ?, id_prodi = ?
     WHERE id = ?"
);

$stmt->bind_param("ssii", $nama, $nim, $id_prodi, $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: data.php");
exit;

?>