<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../ppdb/login.php");
    exit();
}

// Pagination
$batas_halaman = 6;
$halaman = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas_halaman) - $batas_halaman : 0;

$sebelumnya = $halaman - 1;
$selanjutnya = $halaman + 1;
$data = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE status = 1");

$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas_halaman);
$nomor = $halaman_awal + 1;

$pendaftaran = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE status = 1 ORDER BY id_pendaftaran ASC LIMIT $halaman_awal, $batas_halaman");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Calon Siswa Lengkap - SMP Al-Qolam</title>
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
                                <h1 class="fw-500">Data Calon Siswa Lengkap SMP Al-Qolam</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5 col-lg-5">
                            <span class="fs-18">Menampilkan <b><?= $jumlah_data ?></b> data siswa lengkap.</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pendaftaran</th>
                                        <th>Nisn</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Sekolah Asal</th>
                                        <th>Telepon</th>
                                        <th>Status</th>
                                        <th><i class="bi bi-gear-fill"></i> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pendaftaran as  $data) : ?>
                                        <tr>
                                            <td class="fw-bold"><?= $nomor ?></td>
                                            <td><?= $data["id_pendaftaran"] ?></td>
                                            <td><?= $data["nisn"] ?></td>
                                            <td><?= $data["nik"] ?></td>
                                            <td><?= $data["nama_lengkap"] ?></td>
                                            <td><?= $data["sekolah_asal"] ?></td>
                                            <td><?= $data["nomor_telepon"] ?></td>
                                            <td>
                                                <?php if ($data["status"] == 1) : ?>
                                                    <b class="text-green">Sudah Lengkap</b>
                                                <?php endif ?>
                                            </td>
                                            <td colspan="">
                                                <a href="detail_siswa_lengkap.php?id_pendaftaran=<?= $data["id_pendaftaran"] ?>" class="btn btn-gray"><i class="bi bi-eye-fill"></i></a>

                                                <form action="hapus_calon_siswa.php" method="post" class="d-inline">
                                                    <input type="hidden" name="id_pendaftaran" value="<?= $data["id_pendaftaran"] ?>">
                                                    <button type="submit" name="hapus_siswa" onclick="return confirm('Yakin Hapus?')" class="btn btn-gray"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $nomor++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="laporan/laporan_siswa_lengkap.php" target="_blank" class="btn btn-green"><i class="bi bi-file-earmark-pdf me-1 fw-bold"></i>Ekspor PDF</a>
                                    <a href="laporan/laporan_siswa_lengkap_excel.php" target="_blank" class="btn btn-green"><i class="bi bi-file-earmark-excel me-1 fw-bold"></i>Ekspor Excel</a>
                                </div>
                                <ul class="pagination">
                                    <li class="page-item  <?php if ($halaman < 1) {
                                                                echo "disabled";
                                                            } ?>">
                                        <a class="page-link" <?php if ($halaman > 1) {
                                                                    echo "href='?halaman=$sebelumnya'";
                                                                } ?>>&laquo;</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                                        <li class="page-item  <?php if ($halaman == $i) {
                                                                    echo "active";
                                                                } ?>">
                                            <a class="page-link" href="?halaman=<?= $i ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor ?>
                                    <li class="page-item <?php if ($halaman >= $total_halaman) {
                                                                echo "disabled";
                                                            } ?>">
                                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                    echo "href='?halaman=$selanjutnya'";
                                                                } ?>>&raquo</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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