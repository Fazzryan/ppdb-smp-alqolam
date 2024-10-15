<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../../ppdb/login.php");
    exit();
}

// Cek apakah ppdb dibuka atau tidak
$query = mysqli_query($koneksi, "SELECT * FROM ppdb");
$cek_ppdb = mysqli_fetch_assoc($query);

// $getId = mysqli_query($koneksi, "SELECT id_pendaftaran FROM pendaftaran ORDER BY id_pendaftaran DESC LIMIT 1");
// $id = mysqli_fetch_assoc($getId);
// $id_terakhir = $id["id_pendaftaran"];
$id_pend = $_SESSION["id_pendaftaran"];
$siswa = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id_pend'");
$data = mysqli_fetch_assoc($siswa);

$pesan_keterangan = mysqli_query($koneksi, "SELECT * FROM keterangan WHERE id_pendaftaran = '$id_pend'");
$qjml = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_ket FROM keterangan WHERE id_pendaftaran = '$id_pend'");
$jml = mysqli_fetch_assoc($qjml);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>SMP Al-Qolam</title>
    <link rel="icon" href="../../asset/img/logosmp-1.png">
</head>

<body class="text-dark">
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
                        <?= $_SESSION["username"] ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../../ppdb/index.php" target="_blank"><i class="bi bi-house me-2"></i>Home</a></li>
                        <li><a class="dropdown-item" onclick="logout()" style="cursor: pointer;"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                            <!-- href="../ppdb/logout.php" -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar -->
        <?php include "layout/sidebar.php"; ?>

        <div class="main-panel">
            <!-- Content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-light border rounded-8 p-3">
                                <h1 class="fw-500 text-uppercase text-center">back to school SMP Al-Qolam <span class="text-green">let's go!</span></h1>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="card rounded-16">
                                <div class="card-header">
                                    <h4>STATUS PENDAFTARAN</h4>
                                </div>
                                <div class="card-body">
                                    <?php if ($data['status'] == 1) : ?>
                                        <div class="alert alert-success rounded-8" role="alert">
                                            <h5 class="alert-heading fw-bold text-dark">STATUS : DITERIMA</h5>
                                            <p>Status Pendaftaran Anda di sekolah <b>SMP Al-Qolam</b> Sampai Saat ini adalah <b>DITERIMA</b></p>
                                            <hr>
                                            <p>Segera lakukan proses <b>DAFTAR UALNG</b> pada waktu yang telah ditentukan! Lihat informasi pada <b>Kegiatan Dan Tanggal Penting</b></p>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger rounded-8" role="alert">
                                            <h5 class="alert-heading fw-bold text-dark">STATUS : BELUM DIVERIFIKASI</h5>
                                            <p>Status Pendaftaran Anda di sekolah <b>SMP Al-Qolam</b> Sampai Saat ini adalah <b>DIVERIFIKASI</b></p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-12 mt-3">
                            <div class="card rounded-16">
                                <div class="card-header">
                                    <h4>STATUS DAFTAR ULANG</h4>
                                </div>
                                <div class="card-body">
                                    <?php if ($data['status'] == 1) : ?>
                                        <div class="alert alert-success rounded-8" role="alert">
                                            <h5 class="alert-heading fw-bold text-dark">STATUS : SUDAH DAFTAR ULANG</h5>
                                            <p>Status Daftar Ulang Anda di sekolah <b>SMP Al-Qolam</b> Sampai Saat ini adalah <b>SUDAH DAFTAR ULANG</b></p>
                                            <hr>
                                            <p class="mb-0">Jika Status Pendaftaran Anda <b>DITERIMA</b> Segeralah melakukan proses <b>DAFTAR ULANG</b> Ke Sekolah Secara Langsung.</p>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger rounded-8" role="alert">
                                            <h5 class="alert-heading fw-bold text-dark">STATUS : BELUM DAFTAR ULANG</h5>
                                            <p>Status Daftar Ulang Anda di sekolah <b>SMP Al-Qolam</b> Sampai Saat ini adalah <b>BELUM DAFTAR ULANG</b></p>
                                            <hr>
                                            <p class="mb-0">Jika Status Pendaftaran Anda <b class="text-success">DITERIMA</b> Segeralah melakukan proses <b>DAFTAR ULANG</b> Ke Sekolah Secara Langsung.</p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="row justify-content-between mt-3">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column">
                                <div class="card mt-2 rounded-16 shadow-1">
                                    <div class="card-header">
                                        <h4 class="fw-bold"><i class="bi bi-info-circle-fill text-danger"></i> Kegiatan Dan Tanggal Penting</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-green">Kamis, 13 Juli 2023</h5>
                                        <p class="fw-500 text-dark">Daftar ulang, Pembekalan MPLS dan Rapat Wali Murid</p>

                                        <h5 class="card-title text-green">Jumat, 14-16 Juli 2023</h5>
                                        <p class="fw-500 text-dark">Pembekalan MPLS</p>

                                        <h5 class="card-title text-green">Senin, 17 Juli 2023</h5>
                                        <p class="fw-500 text-dark">Belajar Efektif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3 mt-lg-0">
                            <div class="d-flex flex-column">
                                <div class="card h-100 mt-2 rounded-16 shadow-1">
                                    <div class="card-header">
                                        <h4 class="fw-bold"><i class="bi bi-bookmarks-fill text-success"></i> Berkas Persyaratan PPDB SMP Al-Qolam</h4>
                                    </div>
                                    <div class="card-body">
                                        <ol>
                                            <li class="mt-1">Photo Copy Izajah 3 Lembar</li>
                                            <li class="mt-1">Photo Copy NISN 3 Lembar</li>
                                            <li class="mt-1">Photo Copy Akta Kelahiran 3 Lembar</li>
                                            <li class="mt-1">Photo Copy KK & KTP Orang Tua 3 Lembar</li>
                                            <li class="mt-1">Photo Copy Pas Foto 3x4 (3 Buah)</li>
                                            <li class="mt-1">Photo Copy KIP (jika ada)</li>
                                        </ol>
                                        <h5 class="fw-500 ms-3">Jangan Sampai Lupa Ya.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="card h-100 rounded-16 shadow-1">
                                <div class="card-header">
                                    <h4 class="fw-bold"><i class="bi bi-info-circle-fill text-danger"></i> Kelengkapan Berkas Anda</h4>
                                </div>
                                <div class="card-body">
                                    <?php if ($pesan_keterangan) : ?>
                                        <div class="col-12">
                                            <?php foreach ($pesan_keterangan as $pesan) : ?>
                                                <ul>
                                                    <li><span class="text-danger"><?= $pesan["keterangan"] ?></span></li>
                                                </ul>
                                            <?php endforeach ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($jml['jml_ket'] < 1 && $data['status'] == 0) : ?>
                                        <p class="text-danger text-center fw-bold">BELUM DIVERIFIKASI OLEH ADMIN</p>
                                    <?php elseif ($jml['jml_ket'] < 1 && $data['status'] == 1) : ?>
                                        <p class="text-success text-center fw-bold">SELAMAT BERKAS ANDA SUDAH LENGKAP</p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card h-100 rounded-16 shadow-1">
                                <div class="card-header">
                                    <h4 class="fw-bold"><i class="bi bi-telephone-fill text-success"></i> Info Kontak PPDB</h4>
                                </div>
                                <div class="card-body">
                                    <p>Jika ada kendala pada saat mendaftar atau ada data calon siswa yang tidak sesuai, silahkan hubungi nomor berikut ini.</p>
                                    <div class="d-flex">
                                        <a href="https://wa.me/+6281320636030" target="_wa1" class="text-decoration-none text-dark d-block">Ust. Asep Deni, S.Pd.I <br> <span class="text-green fw-bold"> 0813 2063 6030</span></a>
                                        <a href="https://wa.me/+6281356710170" target="_wa1" class="text-decoration-none text-dark ms-3">Ust. Epul, S.Pd.I <br> <span class="text-green fw-bold"> 0813 5671 0170</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row justify-content-center mt-5">
                        <div class="col-lg-6 text-center">
                            <h4 class="fw-bold">MAN JADDA WAJADA!!</h4>
                            <p>“Hari Terpenting dalam
                                pendidikan seseorang adalah
                                hari pertama sekolah, bukan
                                hari kelulusan” –Harry Wong
                                <br>
                                <br>
                                Maka jadikan hari pertama
                                sekolahmu menyennagkan
                                dengan berani berubah
                                menjadi pribadi yang jauh
                                lebih baik. Hamasah!

                            </p>
                        </div>
                    </div> -->
                </div>
            </div>

            <footer class="footer shadow-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-end">
                            <span>&copy; 2023 - SMP AL-QOLAM TASIKMALAYA</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../../asset/js/bootstrap.js"></script>
    <script src="../../asset/js/sweetalert2.js"></script>
    <script src="../../asset/js/script.js"></script>
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
                        window.location.href = '../../ppdb/logout.php'
                    }, 1500)
                }
            })
        }
    </script>
</body>

</html>