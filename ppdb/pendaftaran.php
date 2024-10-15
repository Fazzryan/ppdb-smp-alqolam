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

$id_pendaftaran = mysqli_query($koneksi, "SELECT max(id_pendaftaran) AS idTerakhir FROM pendaftaran");
$id_daftar = mysqli_fetch_array($id_pendaftaran);
$id_pendaftaran = $id_daftar["idTerakhir"];

$urutan = (int) substr($id_pendaftaran, 4, 4);
$urutan++;

$huruf = "PEND";
$id_pendaftaran = $huruf . sprintf("%04s", $urutan);
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
    <title>Formulir Pendaftaran | PPDB SMP Al-Qolam</title>
    <link rel="icon" href="../asset/img/logosmp-1.png">
</head>

<body style="background-color:#F5FAFF">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm fixed-top">
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
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="fw-bold mt-5">Formulir Pendaftaran</h2>
                    <p>Lengkapi formulir pendaftaran dibawah ini dengan teliti.</p>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row px-2 px-lg-0">
                    <div class="col-lg-6">
                        <h4 class="mb-3">Data Diri Siswa</h4>
                        <div class="card p-4 shadow-sm rounded-16">
                            <input type="hidden" name="id_pendaftaran" value="<?= $id_pendaftaran ?>">
                            <div class="mb-2">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required placeholder="Sesuai Ijazah" onkeypress="return hanyaHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">NIK</label>
                                <input type="number" id="nik" name="nik" class="form-control" required placeholder="NIK">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">NISN</label>
                                <input type="number" id="nisn" name="nisn" class="form-control" required placeholder="NISN">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin" checked>
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="form-label">Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required placeholder="Tempat Lahir" onkeypress="return hanyaHuruf(event)">
                                    </div>
                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                        <label for="" class="form-label">Tanggal Lahir</label>
                                        <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required placeholder="1 januari 2000">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Agama</label>
                                <select id="agama" name="agama" class="form-select">
                                    <option value="Islam">Islam</option>
                                    <option value="kristen">kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Sekolah Asal</label>
                                <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control" required placeholder="Sekolah Asal">
                            </div>
                        </div>
                    </div>

                    <!-- Data Orang Tua -->
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <h4 class="mb-3">Data Diri Orang Tua / Wali Siswa</h4>
                        <div class="card p-4 shadow-sm rounded-16">
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Ayah</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" required placeholder="Nama Ayah" onkeypress="return hanyaHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" required placeholder="Nama Ibu" onkeypress="return hanyaHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" required placeholder="Pekerjaan Ayah" onkeypress="return hanyaHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" required placeholder="Pekerjaan Ibu" onkeypress="return hanyaHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" cols="30" rows="5" required placeholder="Alamat"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nomor Telepon/Whatsapp</label>
                                <input type="number" id="nomor_telepon" name="nomor_telepon" class="form-control" required placeholder="08123456789" onkeypress="return hanyaAngka(event, this)">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <h4 class="mb-3">Kelengkapan Persyaratan</h4>
                        <div class="card p-4 shadow-sm rounded-16">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Ijazah Siswa</label>
                                        <input type="file" id="file_ijazah" name="file_ijazah" class="form-control" required accept=".pdf">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Akta Kelahiran</label>
                                        <input type="file" id="file_akta_kelahiran" name="file_akta_kelahiran" class="form-control" required accept=".pdf">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Kartu Keluarga</label>
                                        <input type="file" id="file_kartu_keluarga" name="file_kartu_keluarga" class="form-control" required accept=".pdf">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2 mt-lg-0">
                                    <div class="mb-2">
                                        <label for="" class="form-label">KTP Orang Tua</label>
                                        <input type="file" id="file_ktp" name="file_ktp" class="form-control" required accept=".pdf">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">File NISN</label>
                                        <input type="file" id="file_nisn" name="file_nisn" class="form-control" required accept=".pdf">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Foto Siswa</label>
                                        <input type="file" id="foto_siswa" name="foto_siswa" class="form-control" required accept=".jpg, .jpg, .jpeg">
                                        <span class="d-block mt-1 fs-14 text-danger fst-italic">Ukuran file foto maksimal 1 Mb.</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-3 text-md-end">
                        <!-- Button trigger modal -->
                        <a href="index.php" class="btn btn-outline-gray fw-bold py-3 px-4 me-1">Batal</a>
                        <button type="submit" name="daftar" id="daftar" class="btn btn-green fw-bold shadow p-3 px-5 me-2">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Jika Tombol Daftar Di Klik -->
    <?php
    if (isset($_POST["daftar"])) {
        if (daftar($_POST) > 0) {
            // var_dump($_POST);
            // die;
            echo "
                <script>
                    window.location.href = 'pendaftaran_berhasil.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    setTimeout(function () { 
                        Swal.fire({
                            icon: 'error',
                            title: 'Pendaftaran Gagal!',
                            text: 'Periksa kembali formulir pendaftaran. Pastika semua sudah terisi dengan benar!'
                        })
                    },10);  
                    window.setTimeout(function(){ 
                    } ,5000);
                </script>
            ";
        }
    }
    ?>

    <footer class="border-top mt-5 pb-2 bg-white">
        <div class="container mt-3 py-2">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <p>&copy; 2023 - SMP AL-QOLAM TASIKMALAYA</p>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="row">
                        <div class="col-5">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt fs-22 me-1"></i>
                                    <span class="fs-20 fw-500">Alamat</span>
                                </div>
                                <p>Jl. Dusun Nagrak, Sindangraja, Kec. Jamanis, Kabupaten Tasikmalaya, Jawa Barat </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-whatsapp fs-22 me-1"></i>
                                    <span class="fs-20 fw-500">Whatsapp</span>
                                </div>
                                <a href="https://wa.me/+6281320636030" target="_wa1" class="text-decoration-none  text-dark d-block">Ust. Asep Deni, S.Pd.I <br> <span class="text-green fw-bold"><i class="bi bi-whatsapp"></i> 0813 2063 6030</span></a>
                                <a href="https://wa.me/+6281356710170" target="_wa1" class="text-decoration-none  text-dark">Ust. Epul, S.Pd.I <br> <span class="text-green fw-bold"><i class="bi bi-whatsapp"></i> 0813 5671 0170</span></a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope fs-22 me-1"></i>
                                    <span class="fs-20 fw-500">Email</span>
                                </div>
                                <p>smpalqolam2015@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../asset/js/bootstrap.js"></script>
    <script src="../asset/js/sweetalert2.js"></script>
    <script>
        function hanyaHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
                return false;
            return true;
        }

        function hanyaAngka(evt, val) {
            if (val.value.length === 13) {
                return false
            }
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
</body>

</html>