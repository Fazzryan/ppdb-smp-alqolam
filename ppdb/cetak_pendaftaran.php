<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

// Cek apakah ppdb dibuka atau tidak
$query = mysqli_query($koneksi, "SELECT * FROM ppdb");
$cek_ppdb = mysqli_fetch_assoc($query);

if ($cek_ppdb["status"] == 0) {
    header('Location: index.php');
    exit();
}

$getId = mysqli_query($koneksi, "SELECT id_pendaftaran FROM pendaftaran ORDER BY id_pendaftaran DESC LIMIT 1");
$id = mysqli_fetch_assoc($getId);
$id_terakhir = $id["id_pendaftaran"];

$data = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id_terakhir'");
$data_terakhir = mysqli_fetch_assoc($data);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <!-- Bs Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Bukti Pendaftaran <?= $data_terakhir["nama_lengkap"] ?> | PPDB SMP Al-Qolam</title>
    <link rel="icon" href="../asset/img/logosmp-1.png">
</head>

<body>
    <main id="home">
        <div class="container mt-5 mb-3 pt-4">
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-4">BUKTI PENDAFTARAN</h2>
                    <dl class="row g-2 ps-1 mb-4 fs-20 mx-auto border border-3 rounded-3">
                        <dt class="col-5">ID Pendaftaran</dt>
                        <dd class="col-7 fw-bold"><?= $data_terakhir["id_pendaftaran"] ?></dd>

                        <dt class="col-5">Nama Lengkap</dt>
                        <dd class="col-7"><?= $data_terakhir["nama_lengkap"] ?></dd>

                        <dt class="col-5">NISN</dt>
                        <dd class="col-7"><?= $data_terakhir["nisn"] ?></dd>

                        <dt class="col-5">Sekolah Asal</dt>
                        <dd class="col-7"><?= $data_terakhir["sekolah_asal"] ?></dd>

                        <dt class="col-5">Jenis Kelamin</dt>
                        <dd class="col-7"><?= $data_terakhir["jenis_kelamin"] ?></dd>

                        <dt class="col-5">Tempat / Tgl Lahir</dt>
                        <dd class="col-7"><?= $data_terakhir["tempat_lahir"] ?>, <?= $data_terakhir["tanggal_lahir"] ?></dd>
                    </dl>
                    <h4>BAWA BUKTI PENDAFTARAN INI PADA SAAT PENYERAHAN PERSYARATAN. JANGAN SAMPAI RUSAK ATAUPUN HILANG.</h4>
                    <button type="button" id="cetak" class="btn btn-green fw-bold" onclick="cetak()">CETAK</button>
                </div>
            </div>

        </div>
    </main>
    <script src="../asset/js/bootstrap.js"></script>
    <script>
        function cetak() {
            window.print();
        }
    </script>
</body>

</html>