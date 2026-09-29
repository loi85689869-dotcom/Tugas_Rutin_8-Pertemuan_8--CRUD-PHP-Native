<?php

require 'koneksi.php';

$query = "SELECT id, nama_prodi FROM prodi";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f2f2;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
        }

        .login-box {
            width: 380px;
            background: white;

            padding: 35px;

            border-radius: 10px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            font-size: 25px;

            margin-bottom: 30px;
        }

        label {
            display: block;

            margin-bottom: 7px;

            font-weight: bold;
        }

        input,
        select {
            width: 100%;

            padding: 11px;

            margin-bottom: 18px;

            border: 1px solid #ccc;

            border-radius: 5px;

            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;

            border-color: #666;
        }

        button {
            width: 100%;

            padding: 11px;

            background: #333;

            color: white;

            border: none;

            border-radius: 5px;

            font-size: 15px;

            cursor: pointer;
        }

        button:hover {
            background: #222;
        }

        .lihat-data {
            display: block;

            text-align: center;

            margin-top: 20px;

            color: #333;

            text-decoration: none;

            font-size: 14px;
        }

        .lihat-data:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <h1>Data Mahasiswa</h1>

        <form action="proses_create.php" method="POST">

            <label for="nama">
                Nama
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                placeholder="Masukkan nama"
                required
            >


            <label for="nim">
                NIM
            </label>

            <input
                type="text"
                id="nim"
                name="nim"
                placeholder="Masukkan NIM"
                required
            >


            <label for="prodi">
                Prodi
            </label>

            <select
                id="prodi"
                name="id_prodi"
                required
            >

                <option value="">
                    -- Pilih Prodi --
                </option>

                <?php while ($row = $result->fetch_assoc()) { ?>

                    <option value="<?= $row['id']; ?>">
                        <?= htmlspecialchars($row['nama_prodi']); ?>
                    </option>

                <?php } ?>

            </select>


            <button type="submit">
                Simpan
            </button>

        </form>


        <a
            href="data.php"
            class="lihat-data"
        >
            Lihat Data Mahasiswa
        </a>

    </div>

</body>

</html>