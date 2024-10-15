<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../ppdb/login.php");
    exit();
}
$id_pendaftaran = $_GET["id_pendaftaran"];
$pendaftaran = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'");
$data = mysqli_fetch_assoc($pendaftaran);

$pesan_keterangan = mysqli_query($koneksi, "SELECT * FROM keterangan WHERE id_pendaftaran = '$id_pendaftaran'");
// $data_keterangan = mysqli_fetch_assoc($pesan_keterangan);
// var_dump($data_keterangan);
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Detail Calon Siswa - SMP Al-Qolam</title>
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
        <!-- Sidebar -->
        <nav class="navbar-vertical-nav">
            <div class="navbar-vertical">
                <div class="p-4">
                    <a href="../ppdb/index.php" class="navbar-brand fw-bold">
                        <!-- <img src="https://freshcart.codescandy.com/assets/images/logo/freshcart-logo.svg" alt=""> -->
                        <img src="../asset/img/logosmp.jpg" class="" width="35" alt="">
                        SMP Al-Qolam
                    </a>
                </div>
                <div class="navbar-vertical-content flex-grow-1">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link"><i class="bi bi-house me-2"></i> Dashboard</a>
                        </li>
                        <li class="nav-item my-3 ps-3">
                            <span class="fw-bold fs-14">PPDB</span>
                        </li>
                        <li class="nav-item">
                            <a href="data_calon_siswa.php" class="nav-link "><i class="bi bi-file-earmark-text me-2"></i>Data Calon
                                Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="data_siswa_lengkap.php" class="nav-link"><i class="bi bi-file-earmark-check me-2"></i> Data Siswa Lengkap</a>
                        </li>
                        <li class="nav-item">
                            <a href="data_siswa_tidak_lengkap.php" class="nav-link"><i class="bi bi-file-earmark-check me-2"></i> Data Siswa Tidak Lengkap</a>
                        </li>
                        <li class="nav-item my-3 ps-3">
                            <span class="fw-bold fs-14">AKUN</span>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link"><i class="bi bi-person me-2"></i> Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar Off Canva -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    <img src="../asset/img/logosmp.jpg" class="" width="35" alt="">
                    SMP Al-Qolam
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <div class="navbar-vertical-content flex-grow-1">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link"><i class="bi bi-house me-2"></i> Dashboard</a>
                            </li>
                            <li class="nav-item my-3 ps-3">
                                <span class="fw-bold fs-14" style="font-size: 14px;">Data Siswa</span>
                            </li>
                            <li class="nav-item">
                                <a href="data_calon_siswa.php" class="nav-link"><i class="bi bi-file-earmark-text me-2"></i>Data Calon Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a href="data_siswa_lengkap.php" class="nav-link"><i class="bi bi-file-earmark-check me-2"></i> Data Siswa Lengkap</a>
                            </li>
                            <li class="nav-item">
                                <a href="data_siswa_tidak_lengkap.php" class="nav-link"><i class="bi bi-file-earmark-check me-2"></i> Data Siswa Tidak Lengkap</a>
                            </li>
                            <li class="nav-item my-3 ps-3">
                                <span class="fw-bold fs-14">AKUN</span>
                            </li>
                            <li class="nav-item">
                                <a href="admin.php" class="nav-link"><i class="bi bi-person me-2"></i> Admin</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="main-panel">
            <!-- Content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-light border rounded-8 p-3">
                                <h1 class="fw-500">Detail Calon Siswa Tidak Lengkap SMP Al-Qolam</h1>
                            </div>
                        </div>
                    </div>

                    <div class="d-block d-md-flex justify-content-between align-items-center">
                        <a href="data_siswa_tidak_lengkap.php" class="btn btn-gray fw-bold mt-3 p-3"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <dl class="row g-0 g-md-3">
                                <dt class="col-sm-5">Nomor Pendaftaran</dt>
                                <dd class="col-sm-7 py-2 w-50 ps-2 bg-green bg-gradient rounded-3 fw-bold text-white"><?= $data["id_pendaftaran"] ?></dd>

                                <dt class="col-sm-5">Nama Lengkap</dt>
                                <dd class="col-sm-7"><?= $data["nama_lengkap"] ?></dd>

                                <dt class="col-sm-5">NIK</dt>
                                <dd class="col-sm-7"><?= $data["nik"] ?></dd>
                                <dt class="col-sm-5">NISN</dt>
                                <dd class="col-sm-7"><?= $data["nisn"] ?></dd>

                                <dt class="col-sm-5">Jenis Kelamin</dt>
                                <dd class="col-sm-7"><?= $data["jenis_kelamin"] ?></dd>

                                <dt class="col-sm-5">Tempat Lahir</dt>
                                <dd class="col-sm-7"><?= $data["tempat_lahir"] ?></dd>

                                <dt class="col-sm-5">Tanggal Lahir</dt>
                                <dd class="col-sm-7"><?= $data["tanggal_lahir"] ?></dd>

                                <dt class="col-sm-5">Sekolah Asal</dt>
                                <dd class="col-sm-7"><?= $data["sekolah_asal"] ?></dd>

                                <dt class="col-sm-5">Agama</dt>
                                <dd class="col-sm-7"><?= $data["agama"] ?></dd>
                            </dl>
                        </div>

                        <div class="col-lg-6">
                            <dl class="row g-0 g-md-3">
                                <dt class="col-sm-5">Nama Ayah</dt>
                                <dd class="col-sm-7"><?= $data["nama_ayah"] ?></dd>

                                <dt class="col-sm-5">Nama Ibu</dt>
                                <dd class="col-sm-7"><?= $data["nama_ibu"] ?></dd>

                                <dt class="col-sm-5">Pekerjaan Ayah</dt>
                                <dd class="col-sm-7"><?= $data["pekerjaan_ayah"] ?></dd>

                                <dt class="col-sm-5">Pekerjaan Ibu</dt>
                                <dd class="col-sm-7"><?= $data["pekerjaan_ibu"] ?></dd>

                                <dt class="col-sm-5">Alamat</dt>
                                <dd class="col-sm-7"><?= $data["alamat"] ?></dd>

                                <dt class="col-sm-5">Nomor Telepon</dt>
                                <dd class="col-sm-7"><?= $data["nomor_telepon"] ?></dd>

                                <dt class="col-sm-5">Foto Siswa</dt>
                                <dd class="col-sm-7">
                                    <img src="<?= $data["foto"] ?>" width="75" class="rounded-3" alt="foto siswa">
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <h5 class="my-3">Kelengkapan Persyaratan</h5>
                        <div class="col-lg-7">
                            <a href="load_ijazah.php?id_pendaftaran=<?= $data["id_pendaftaran"] ?>" target="_blank" class="btn btn-gray mt-1 p-3 fw-bold">Ijazah</a>

                            <a href="load_akta.php?id_pendaftaran=<?= $data["id_pendaftaran"] ?>" target="_blank" class="btn btn-gray mt-1 p-3 fw-bold">Akta Kelahiran</a>

                            <a href="load_kk.php?id_pendaftaran=<?= $data["id_pendaftaran"] ?>" target="_blank" class="btn btn-gray mt-1 p-3 fw-bold">Kartu Keluarga</a>

                            <a href="load_ktp.php?id_pendaftaran=<?= $data["id_pendaftaran"] ?>" target="_blank" class="btn btn-gray mt-1 p-3 fw-bold">KTP Orang Tua</a>

                            <a href="load_nisn.php?id_pendaftaran=<?= $data["id_pendaftaran"] ?>" target="_blank" class="btn btn-gray mt-1 p-3 fw-bold">NISN</a>
                        </div>

                        <div class="col-lg-5 mt-3 mt-lg-0">
                            <!-- Button trigger modal -->
                            <?php if ($data["status"] == 0) : ?>
                                <button type="button" class="btn btn-outline-gray p-3 fw-bold shadow-md me-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Belum Lengkap
                                </button>
                                <form action="cek_status_siswa.php" method="post" class="d-inline">
                                    <input type="hidden" name="id_pendaftaran" value="<?= $data['id_pendaftaran'] ?>">
                                    <button type="submit" name="lengkap" class="btn btn-green p-3 fw-bold shadow-md">Sudah Lengkap</button>
                                </form>
                            <?php endif ?>

                        </div>


                        <?php
                        if (isset($_POST["simpan_keterangan"])) {
                            if (simpanKeterangan($_POST) > 0) {
                                echo "
                                    <script>
                                        setTimeout(function(){
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Keterangan Berhasil Disimpan!',
                                                timer: 1700,
                                                showConfirmButton: false,
                                            })
                                        },10)
                                        window.setTimeout(function(){
                                            window.location.href = 'data_siswa_tidak_lengkap.php';
                                        }, 1700)
                                    </script>
                                ";
                            }
                        }

                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_pendaftaran" value="<?= $data['id_pendaftaran'] ?>">
                                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" placeholder="Contoh : Ijazah belum diupload"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-gray fw-bold" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="simpan_keterangan" class="btn btn-green fw-bold">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php if ($pesan_keterangan) : ?>
                            <div class="col-12">
                                <h5 class="my-3">Keterangan </h5>
                                <?php foreach ($pesan_keterangan as $pesan) : ?>
                                    <ul>
                                        <li><span class="text-danger"><?= $pesan["keterangan"] ?></span></li>
                                    </ul>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </div>
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