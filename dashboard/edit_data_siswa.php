<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../ppdb/login.php");
    exit();
}

$id_pendaftaran = $_GET["id_pendaftaran"];
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Data Siswa - SMP Al-Qolam</title>
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
                                <h1 class="fw-500">Edit Data Calon Siswa SMP Al-Qolam</h1>
                            </div>
                        </div>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
                        <input type="hidden" name="id_pendaftaran" value="<?= $data['id_pendaftaran'] ?>">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-3">
                                <dl class="d-flex align-items-center justify-content-between">
                                    <h4 class="fs-20 fw-bold">Id Pendaftaran</h4>
                                    <span class="badge bg-success fs-18"><?= $data['id_pendaftaran'] ?></span>
                                </dl>
                            </div>
                            <div class="col-md-7 text-end">
                                <a href="data_calon_siswa.php" class="btn btn-gray fw-bold py-3 px-3 me-1"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="row mt-4 px-2 px-lg-0">
                            <div class="col-lg-6">
                                <h4 class="mb-3">Data Diri Siswa</h4>
                                <div class="card p-4 shadow-sm rounded-16">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" class="form-control" required placeholder="Sesuai Ijazah">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">NIK</label>
                                        <input type="number" id="nik" name="nik" value="<?= $data['nik'] ?>" class="form-control" required placeholder="NIK">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">NISN</label>
                                        <input type="number" id="nisn" name="nisn" value="<?= $data['nisn'] ?>" class="form-control" required placeholder="NISN">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if ($data['jenis_kelamin'] == "Laki-laki") {
                                                                                                                    echo "checked";
                                                                                                                } ?> id="jenis_kelamin" value="Laki-laki">
                                            <label class="form-check-label" for="laki-laki">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if ($data['jenis_kelamin'] == "Perempuan") {
                                                                                                                    echo "checked";
                                                                                                                } ?> id="jenis_kelamin" value="Perempuan">
                                            <label class="form-check-label" for="perempuan">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" class="form-control" required placeholder="Tempat Lahir">
                                            </div>
                                            <div class="col-lg-6 mt-3 mt-lg-0">
                                                <label for="" class="form-label">Tanggal Lahir</label>
                                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" class="form-control" required placeholder="1 januari 2000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Agama</label>
                                        <select id="agama" name="agama" class="form-select">
                                            <option value="<?= $data['agama'] ?>"><?= $data['agama'] ?></option>
                                            <option value="Islam">Islam</option>
                                            <option value="kristen">kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghuchu">Konghuchu</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Sekolah Asal</label>
                                        <input type="text" id="sekolah_asal" name="sekolah_asal" value="<?= $data['sekolah_asal'] ?>" class="form-control" required placeholder="Sekolah Asal">
                                    </div>
                                </div>
                            </div>

                            <!-- Data Orang Tua -->
                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <h4 class="mb-3">Data Diri Orang Tua / Wali Siswa</h4>
                                <div class="card p-4 shadow-sm rounded-16">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nama Ayah</label>
                                        <input type="text" id="nama_ayah" name="nama_ayah" value="<?= $data['nama_ayah'] ?>" class="form-control" required placeholder="Nama Ayah">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nama Ibu</label>
                                        <input type="text" id="nama_ibu" name="nama_ibu" value="<?= $data['nama_ibu'] ?>" class="form-control" required placeholder="Nama Ibu">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= $data['pekerjaan_ayah'] ?>" class="form-control" required placeholder="Pekerjaan Ayah">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= $data['pekerjaan_ibu'] ?>" class="form-control" required placeholder="Pekerjaan Ibu">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Alamat</label>
                                        <textarea id="alamat" name="alamat" class="form-control" cols="30" rows="5" required placeholder="Alamat"><?= $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nomor Telepon/Whatsapp</label>
                                        <input type="number" id="nomor_telepon" name="nomor_telepon" class="form-control" required placeholder="08123456789" value="<?= $data['nomor_telepon'] ?>" onkeypress="if(this.value.length===13) return false">
                                    </div>
                                    <input type="hidden" name="pdf_ijazah" value="<?= $data['pdf_ijazah'] ?>">
                                    <input type="hidden" name="pdf_akta" value="<?= $data['pdf_akta'] ?>">
                                    <input type="hidden" name="pdf_kk" value="<?= $data['pdf_kk'] ?>">
                                    <input type="hidden" name="pdf_nisn" value="<?= $data['pdf_nisn'] ?>">
                                    <input type="hidden" name="foto" value="<?= $data['foto'] ?>">
                                </div>
                            </div>

                            <div class="mt-3 text-md-end">
                                <!-- Button trigger modal -->
                                <button type="submit" name="edit_data" id="edit_data" class="btn btn-green fw-bold shadow p-3 px-5 me-2">Edit Data</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["edit_data"])) {
                        if (edit_data_siswa($_POST) > 0) {
                            echo "
                                <script>
                                setTimeout(function(){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Data Berhasil Diubah!',
                                        timer: 1700,
                                        showConfirmButton: false,
                                    })
                                },10)
                                window.setTimeout(function(){
                                    window.location.href='data_calon_siswa.php';
                                }, 2000)
                                </script>
                            ";
                        } else {
                            echo "
                                <script>
                                    setTimeout(function () { 
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal Mengubah Data!',
                                        })
                                    },10);  
                                    window.setTimeout(function(){ 
                                    } ,3000);
                                </script>
                            ";
                        }
                    }
                    ?>

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