<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

// Cek apakah ppdb dibuka atau tidak
$query = mysqli_query($koneksi, "SELECT * FROM ppdb");
$cek_ppdb = mysqli_fetch_assoc($query);
if ($cek_ppdb["status"] == 0) {
    header("Location: index.php");
}

$getId = mysqli_query($koneksi, "SELECT id_pendaftaran FROM pendaftaran ORDER BY id_pendaftaran DESC LIMIT 1");
$id = mysqli_fetch_assoc($getId);
$id_terakhir = $id["id_pendaftaran"];

$data = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id_terakhir'");
$data_terakhir = mysqli_fetch_assoc($data);

$akunSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_pendaftaran = '$id_terakhir'");
$siswa = mysqli_fetch_assoc($akunSiswa);

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
    <title>Pendaftaran Berhasil | PPDB SMP Al-Qolam</title>
    <link rel="icon" href="../asset/img/logosmp-1.png">
</head>

<body style="background-color:#F5FAFF;">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-1 fixed-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" href="index.php">
                <img src="../asset/img/logosmp.jpg" width="50" height="50" class="d-inline-block" alt="logo">
                PPDB SMP AL-QOLAM
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-1">
                        <a href="index.php" class="fs-15 ln-30 fw-500 btn btn-gray">
                            KEMBALI KE HOME
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="home">
        <div class="container mt-5 mb-3 pt-4">
            <div class="row justify-content-center mb-4">
                <div class="col-md-6 text-center">
                    <h2 class="fw-bold mt-5 mb-4">Selamat, Anda Telah Berhasil Mendaftar!</h2>
                    <img src="../asset/img/buktipendaftaran.svg" class="w-50" alt="icon">
                    <p class="my-2">
                        Selanjutnya Anda login menggunakan akun berikut ini.
                    </p>
                    <b>Username : </b> <?= $siswa["username"] ?>
                    <br>
                    <b>Password : </b> <?= $siswa["password"] ?>
                    <p class="my-2">Anda harus melakukan Daftar Ulang dengan membawa <b>Bukti Pendaftaran</b> yang bisa didapatkan dengan mengklik tombol dibawah.</p>
                    <a href="cetak_pendaftaran.php" class="btn btn-green fw-bold py-2 shadow" target="_blank">Lihat Bukti Pendaftaran</a>
                </div>
            </div>

        </div>
    </main>

    <section class="border-top mt-5">
        <div class="container mt-3 py-2">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <p>&copy; 2023 - SMP AL-QOLAM TASIKMALAYA</p>
                </div>
            </div>
        </div>
    </section>
    <script src="../asset/js/bootstrap.js"></script>

</body>

</html>