<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../ppdb/login.php");
    exit();
}
if (!empty($_SESSION["id_siswa"])) {
    header("Location: siswa/index.php");
    exit();
}

// Cek apakah ppdb dibuka atau tidak
$query = mysqli_query($koneksi, "SELECT * FROM ppdb");
$cek_ppdb = mysqli_fetch_assoc($query);

$jmlSiswa = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_siswa FROM pendaftaran");
$data = mysqli_fetch_assoc($jmlSiswa);

$jmlDataLengkap = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_siswa FROM pendaftaran WHERE status = 1");
$data_lengkap = mysqli_fetch_assoc($jmlDataLengkap);

$jmlDataBelumLengkap = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_siswa FROM pendaftaran WHERE status =0");
$data_belum_lengkap = mysqli_fetch_assoc($jmlDataBelumLengkap);

$jml_laki = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_siswa FROM pendaftaran WHERE jenis_kelamin = 'laki-laki'");
$data_laki = mysqli_fetch_assoc($jml_laki);

$jml_perempuan = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_siswa FROM pendaftaran WHERE jenis_kelamin = 'Perempuan'");
$data_perempuan = mysqli_fetch_assoc($jml_perempuan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Dashboard - SMP Al-Qolam</title>
    <link rel="icon" href="../asset/img/logosmp-1.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-glass shadow-2">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                    <button class="btn btn-green d-xl-none text-white" style="background-color: #00AA5B;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="bi bi-list"></i>
                    </button>
                    <div id="waktu" class="d-none d-xl-block"></div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="img/logosmp.jpg" class="" width="30" alt=""> -->
                        Selamat Datang <?= $_SESSION["username"] ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../ppdb/index.php" target="_blank"><i class="bi bi-house me-2"></i>Home</a></li>
                        <li><a class="dropdown-item" onclick="logout()" style="cursor: pointer;"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                            <!-- href="../ppdb/logout.php" -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <?php include "layout/sidebar.php" ?>

        <div class="main-panel">
            <!-- Content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-light border rounded-8 p-3">
                                <h1 class="fw-500">Dashboard PPDB SMP Al-Qolam</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <div class="card border shadow-2 rounded-16">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Data Calon Siswa</h5>
                                        <div class="icon-shape icon-md bg-primary bg-gradient rounded-circle">
                                            <i class="bi bi-person-fill fs-24 text-light"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold"><?= $data["jml_siswa"] ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0">
                            <div class="card border shadow-2 rounded-16">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Data Siswa Lengkap</h5>
                                        <div class="icon-shape icon-md rounded-circle bg-green">
                                            <i class="bi bi-person-fill-check fs-24 text-light"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold"><?= $data_lengkap["jml_siswa"] ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0">
                            <div class="card border shadow-2 rounded-16">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Data Siswa Belum Di-Verifikasi</h5>
                                        <div class="icon-shape icon-md rounded-circle bg-danger">
                                            <i class="bi bi-person-fill-exclamation fs-24 text-light"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold"><?= $data_belum_lengkap["jml_siswa"] ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="card border shadow-2 rounded-16">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Data Siswa Laki-Laki</h5>
                                        <div class="icon-shape icon-md rounded-circle bg-info">
                                            <i class="bi bi-gender-male fs-24 text-light"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold"><?= $data_laki["jml_siswa"] ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="card border shadow-2 rounded-16">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Data Siswa Perempuan</h5>
                                        <div class="icon-shape icon-md rounded-circle bg-warning">
                                            <i class="bi bi-gender-female fs-24 text-light"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold"><?= $data_perempuan["jml_siswa"] ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <?php if ($cek_ppdb["status"] == 0) : ?>
                            <div class="col-lg-6">
                                <div class="card rounded-16 shadow-1">
                                    <div class="card-header">
                                        <h4 class="fw-bold text-danger"><i class="bi bi-exclamation-circle-fill"></i> Pendaftaran Telah <span class="text-danger">Ditutup</span></h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Tekan tombol <b>Buka Pendaftaran</b> dibawah ini untuk memulai PPDB.
                                            Setelah ditekan, calon siswa bisa mengisi formulir pendaftaran.</p>
                                        <!-- <button type="submit" name="buka_pendaftaran" onclick="" class="btn btn-green fw-bold">Buka Pendaftaran</button> -->
                                        <form action="" method="post">
                                            <input type="hidden" name="status_pendaftaran" id="status_pendaftaran" value="1">
                                            <button type="submit" id="buka_pendaftaran" name="buka_pendaftaran" class="btn btn-green fw-bold">Buka Pendaftaran</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="col-lg-6">
                                <div class="card rounded-16 shadow-1">
                                    <div class="card-header">
                                        <h4 class="fw-bold text-green"><i class="bi bi-exclamation-circle-fill"></i> Pendaftaran Telah <span class="text-green">Dibuka</span></h4>
                                    </div>
                                    <div class="card-body">

                                        <p>Tekan tombol <b>Tutup Pendaftaran</b> dibawah ini untuk mengakhiri PPDB.
                                            Setelah ditekan, calon siswa tidak bisa mengisi formulir pendaftaran.</p>
                                        <form action="" method="post">
                                            <input type="hidden" name="status_pendaftaran" id="status_pendaftaran" value="0">
                                            <button type="submit" id="tutup_pendaftaran" name="tutup_pendaftaran" class="btn btn-danger fw-bold">Tutup Pendaftaran</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST["buka_pendaftaran"])) {
                if (gantiStatusPendaftaran($_POST) > 0) {
                    echo "
                    <script>
                        setTimeout(function(){
                            Swal.fire({
                                icon: 'success',
                                title: 'Pendaftaran Berhasil Dibuka!',
                                timer: 1700,
                                showConfirmButton: false,
                            })
                        },10)
                        window.setTimeout(function(){
                            window.location.href = 'index.php';
                        }, 1700)
                    </script>
                                        ";
                }
            }

            if (isset($_POST["tutup_pendaftaran"])) {
                if (gantiStatusPendaftaran($_POST) > 0) {
                    echo "
                    <script>
                        setTimeout(function(){
                            Swal.fire({
                                icon: 'success',
                                title: 'Pendaftaran Berhasil Ditutup!',
                                timer: 1700,
                                showConfirmButton: false,
                            })
                        },10)
                        window.setTimeout(function(){
                            window.location.href = 'index.php';
                        }, 1700)
                    </script>
                                        ";
                }
            }
            ?>
            <?php include 'layout/footer.php'; ?>
        </div>
    </div>

    <script src="../asset/js/bootstrap.js"></script>
    <script src="../asset/js/sweetalert2.js"></script>
    <script src="../asset/js/script.js"></script>
    <script>
        function logout() {
            Swal.fire({
                title: 'Yakin Logout?',
                text: "Jika logout anda harus login kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Logout!',
                        showConfirmButton: false
                    })
                    setTimeout(function() {
                        window.location.href = '../ppdb/logout.php'
                    }, 1500)
                }
            })
        }
    </script>
</body>

</html>