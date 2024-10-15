<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

// Cek apakah ppdb dibuka atau tidak
$query = mysqli_query($koneksi, "SELECT * FROM ppdb");
$cek_ppdb = mysqli_fetch_assoc($query);

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
    <title>Selamat Datang Di PPDB SMP Al-Qolam</title>
    <link rel="icon" href="../asset/img/logosmp-1.png">
</head>

<body style="margin-top: 50px;">

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
                        <a href="#home" class="nav-link fs-15 ln-30 fw-500 home active">Home</a>
                    </li>
                    <li class="nav-item px-1">
                        <a href="#jadwal" class="nav-link fs-15 ln-30 fw-500 jadwal">Jadwal</a>
                    </li>
                    <li class="nav-item px-1">
                        <a href="#pembiayaan" class="nav-link fs-15 ln-30 fw-500 pembiayaan">Pembiayaan</a>
                    </li>
                    <li class="nav-item px-1">
                        <a href="#persyaratan" class="nav-link fs-15 ln-30 fw-500 persyaratan">Persyaratan</a>
                    </li>
                    <li class="nav-item px-1">
                        <a href="#alurpendaftaran" class="nav-link fs-15 ln-30 fw-500 alurpendaftaran">Alur Pendaftaran</a>
                    </li>
                    <?php if (isset($_SESSION["username"])) : ?>
                        <li class="nav-item px-1">
                            <a href="../dashboard/index.php" class="btn btn-green fs-15 ln-30 fw-500 alurpendaftaran">Dashboard</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <main id="home">
        <div class="container mt-5 mb-3 pt-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-7 text-center text-lg-start">
                    <h1 class="fw-bold mt-5 display-5">Penerimaan Peserta Didik Baru <span class="d-block text-green">SMP AL-Qolam</span></h1>
                    <p class="text-dark lead mb-2">
                        Tahun Ajaran 2023/2024
                    </p>
                    <!-- <a href="buat_akun.php" class="btn btn-green py-3">Buat Akun</a>
                    <a href="login.php" class="btn btn-outline-green p-3">Login</a> -->
                    <p class="lead">Mempersiapkan generasi yang beriman, bertaqwa dan berakhlakulkarim, berpengetahuan luas, berbudi luhur serta memiliki kepdulian dan dedikasi yang tinggi terhadap Agama, Bangsa, dan Negara.</p>

                    <?php if ($cek_ppdb["status"] == 1) : ?>
                        <h4 class="text-green mt-4"><i class="bi bi-exclamation-circle-fill"></i> Pendaftaran Telah Dibuka</h4>
                    <?php else :  ?>
                        <h4 class="text-danger mt-4"><i class="bi bi-exclamation-circle-fill"></i> Pendaftaran Telah Ditutup</h4>
                    <?php endif  ?>

                    <?php if ($cek_ppdb["status"] == 1) : ?>
                        <a href="pendaftaran.php" class="btn btn-green mt-3 p-3 fw-bold shadow">Daftar Sekarang</a>
                    <?php endif ?>

                    <?php if (empty($_SESSION["username"])) : ?>
                        <a href="login_siswa.php" class="btn btn-green mt-3 p-3 fw-bold shadow">Login</a>
                    <?php endif ?>

                    <div class="mt-4">
                        <span class="d-block text-dark fw-bold mb-2">Info Pendaftaran</span>
                        <a href="https://api.whatsapp.com/send?phone=6281320636030&text=Hallo,%20Bagaimana%20cara%20saya%20mendaftar%20ke%20SMP%20Al-Qolam?" target="_wa1" class="text-decoration-none  text-dark d-block">Ust. Asep Deni, S.Pd.I <br> <span class="text-green fw-bold"><i class="bi bi-whatsapp"></i> 0813 2063 6030</span></a>
                        <a href="https://api.whatsapp.com/send?phone=6281356710170&text=Hallo,%20Bagaimana%20cara%20saya%20mendaftar%20ke%20SMP%20Al-Qolam?" target="_wa1" class="text-decoration-none  text-dark">Ust. Epul, S.Pd.I <br> <span class="text-green fw-bold"><i class="bi bi-whatsapp"></i> 0813 5671 0170</span></a>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <img src="../asset/img/icon1.svg" class="w-100 d-none d-lg-block" alt="icon">
                </div>
            </div>
        </div>
    </main>

    <section id="jadwal" class="pt-md-3 ">
        <div class="container pt-5 pt-md-0">
            <div class="row mt-md-5 mb-md-4 mb-2 justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <div class="text-center mt-5">
                        <h2><i class="bi bi-alarm me-2"></i> Waktu Pendaftaran</h2>
                    </div>
                    <p>Waktu pendaftaran dilakukan pada saat jam kerja <span class="d-md-block">mulai pukul <b>08.00 - 14.00</b></span></p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="card shadow-1 rounded-8 mb-3">
                        <div class="card-body">
                            <span>
                                <h4 class="fw-bold d-inline">PPDB</h4>
                                - Gelombang 1
                            </span>
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap border-top text-dark mb-0 mt-3">
                                    <tbody>
                                        <tr>
                                            <td>Tanggal Mulai</td>
                                            <td>:</td>
                                            <td>1 Mei 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Selesai</td>
                                            <td>:</td>
                                            <td>30 Juni 2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-1 rounded-8">
                        <div class="card-body">
                            <span>
                                <h4 class="fw-bold d-inline">PPDB</h4>
                                - Gelombang 2
                            </span>
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap border-top text-dark mb-0 mt-3">
                                    <tbody>
                                        <tr>
                                            <td>Tanggal Mulai</td>
                                            <td>:</td>
                                            <td>1 Juli 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Selesai</td>
                                            <td>:</td>
                                            <td>15 Juli 2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <img src="../asset/img/pic1.png" class="w-100" alt="logo">
                </div>
            </div>
        </div>
    </section>
    <section id="pembiayaan" class="pt-md-3 mt-5" style="background-color: #F5FAFF;">
        <div class="container pt-5 pt-md-0  ">
            <div class="row mt-md-5 justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <h2 class="mt-5"><i class="bi bi-wallet2 me-2"></i> Pembiayaan</h2>
                    <p>Berikut adalah rincian biaya yang harus dibayar oleh siswa</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <img src="../asset/img/pic2.png" class="w-100 rounded-16 shadow-lg" alt="gambar">
                </div>
                <div class="col-lg-5 mt-3 mt-md-0">
                    <div class="card rounded-8 shadow-2 border-0 bg-white mb-3">
                        <div class="card-body p-md-4">
                            <h5 class="fw-bold mb-3">Biaya Pesantren (Bagi yang mondok)</h5>
                            <div class="row justify-content-between">
                                <div class="col-lg-6 col-8">
                                    <p class="fw-500"><i class="bi bi-check"></i> Listrik dan Kebersihan</p>
                                </div>
                                <div class="col-lg-4 col-4 text-end">
                                    <p>Rp 25.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-lg-6 col-5">
                                    <p class="fw-500"><i class="bi bi-check"></i> Biaya Makan</p>
                                </div>
                                <div class="col-lg-4 col-5 text-end">
                                    <p>Rp 300.000</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-8 shadow-2 border-0 bg-white">
                        <div class="card-body p-md-4">
                            <h5 class="fw-bold mb-3">Biaya Kelengkapan Santri</h5>
                            <div class="row justify-content-between">
                                <div class="col-lg-6 col-8">
                                    <p class="fw-500"><i class="bi bi-check"></i> Kaos Olahraga</p>
                                </div>
                                <div class="col-lg-4 col-4 text-end">
                                    <p>Rp 85.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="fw-500"><i class="bi bi-check"></i> Batik Sekolah</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p>Rp 80.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="fw-500"><i class="bi bi-check"></i> Sampul Rapot</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p>Rp 50.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-7">
                                    <p class="fw-500"><i class="bi bi-check"></i> Atribut Logo Sekolah</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p>Rp 50.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="fw-500"><i class="bi bi-check"></i> Cetak Foto</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p>Rp 10.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="fw-500"><i class="bi bi-check"></i> Biaya MOPD</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p>Rp 50.000</p>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-7">
                                    <p class="fw-500"><i class="bi bi-check"></i> Biaya Pendaftaran</p>
                                </div>
                                <div class="col-4 text-end">
                                    <p>Rp 50.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#F5FAFF" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,208C384,235,480,245,576,245.3C672,245,768,235,864,224C960,213,1056,203,1152,218.7C1248,235,1344,277,1392,298.7L1440,320L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>

    <section id="persyaratan" class="pt-md-3 mt-5">
        <div class="container pt-5 pt-md-0">
            <div class="row mt-md-5 text-center">
                <h2 class="mt-5"><i class="bi bi-clipboard-check me-2"></i> Persyaratan</h2>
                <p>Berikut adalah persyaratan untuk masuk ke SMP AL-Qolam</p>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-9 col-lg-6">
                    <div class="card rounded-8 shadow-1">
                        <div class="card-body p-md-4">
                            <h5 class="fw-bold mb-3">Persyaratan Pendaftaran</h5>
                            <ol>
                                <li>Mengisi Form Pendaftaran</li>
                                <li>Mengunggah File Scan Ijazah</li>
                                <li>Mengunggah File Scan NISN</li>
                                <li>Mengunggah File Scan Kartu Keluarga</li>
                                <li>Mengunggah File Scan Akte Kelahiran</li>
                                <li>Mengunggah File Scan KTP Orang Tua (Ayah dan Ibu)</li>
                                <li>Mengunggah File Pas Foto 3 x 4 dengan format jpg, png, dan jpeg</li>
                            </ol>
                            <p>
                                <b>Format Penamaan File</b> : Ijazah_NamaSiswa <br>
                                <b>Contoh</b> : ijazah_daniaditya, akta_daniaditya, kk_daniaditya, dll.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2 mt-lg-0">
                    <img src="../asset/img/pic3.png" class="w-100" alt="gambar">
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#F5FAFF" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,213.3C384,224,480,224,576,197.3C672,171,768,117,864,106.7C960,96,1056,128,1152,128C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <section id="alurpendaftaran" class="" style="background-color: #F5FAFF;">
        <div class="container pb-5 pt-5 pt-md-0">
            <div class="row mb-2 justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <h2 class="mt-5"><i class="bi bi-recycle me-2"></i> Alur Pendaftaran</h2>
                    <p class="">Sebelum mendaftar, calon siswa diwajibkan terlebih dahulu memahami alur pendaftaran. SIlahkan membaca dengan teliti tahap demi tahap agar dapat memahami dengan baik.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-2">
                    <div class="card h-100 rounded-8 shadow-2 border-0">
                        <div class="card-body p-md-4">
                            <h4 class="fw-bold">1. Cek Jadwal Dan Persyaratan</h4>
                            <p>Calon siswa mengunjungi website PPDB SMP Al-Qolam dan melihat informasi pendaftaran seperti jadwal dan persyaratan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card rounded-8 shadow-2 border-0">
                        <div class="card-body p-md-4">
                            <h4 class="fw-bold">2. Daftar Online</h4>
                            <p>Calon peserta melakukan Pendaftaran Online melalui website ini. Setelah mendaftar, calon peserta mencetak bukti pendaftaran, Jika mengalami kesulitan mendaftar online, hubungi petugas PPDB.
                                <br>
                                <a href="https://wa.me/+6281320636030" target="_wa1" class="text-green">Ust. Asep Deni, S.Pd.I 0813-2063-6030</a>
                                <br>
                                <a href="https://wa.me/+6281356710170" target="_wa1" class="text-green">Ust. Epul, S.Pd.I 0813-5671-0170</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card rounded-8 shadow-2 border-0">
                        <div class="card-body p-md-4">
                            <h4 class="fw-bold">3. Daftar Ulang</h4>
                            <p>Calon siswa melakukan daftar ulang di SMP Al-Qolam bersama orang tua pada tanggal yang telah ditentukan dan jangan lupa membawa bukti pendaftaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="border-top">
        <div class="container mt-3 py-2">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <p>&copy; 2023 - SMP AL-QOLAM TASIKMALAYA</p>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt fs-22 me-1"></i>
                                    <span class="fs-20 fw-500">Alamat</span>
                                </div>
                                <p class="fs-14">Jl. Dusun Nagrak, Sindangraja, Kec. Jamanis, Kabupaten Tasikmalaya, Jawa Barat </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-whatsapp fs-22 me-1"></i>
                                    <span class="fs-20 fw-500">Whatsapp</span>
                                </div>
                                <a href="https://wa.me/+6281320636030" target="_wa1" class="text-decoration-none fs-14 text-dark d-block">Ust. Asep Deni, S.Pd.I <br> <span class="text-green fw-bold"> 0813 2063 6030</span></a>
                                <a href="https://wa.me/+6281356710170" target="_wa1" class="text-decoration-none fs-14 text-dark">Ust. Epul, S.Pd.I <br> <span class="text-green fw-bold"> 0813 5671 0170</span></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope fs-22 me-1"></i>
                                    <span class="fs-20 fw-500">Email</span>
                                </div>
                                <p class="fs-14">smpalqolam2015@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../asset/js/bootstrap.js"></script>
    <script>
        const navbar = document.querySelector('.navbar');
        navbar.addEventListener('click', (event) => {
            if (event.target.classList.contains('nav-link')) {
                const keclick = event.target;

                const navlinks = document.querySelectorAll('.nav-link');
                navlinks.forEach(item => item.classList.remove('active'));

                keclick.classList.add('active');
            }
        });
    </script>
</body>

</html>