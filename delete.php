<?php

require 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: data.php");
exit;

?>