<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../ppdb/login.php");
    exit();
}

$id_admin = $_GET["id_admin"];
$getAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id_admin'");
$admin = mysqli_fetch_assoc($getAdmin);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Admin PPDB SMP Al-Qolam</title>
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
                            <a href="data_calon_siswa.php" class="nav-link"><i class="bi bi-file-earmark-text me-2"></i>Data Calon
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
                            <a href="admin.php" class="nav-link on"><i class="bi bi-person me-2"></i> Admin</a>
                        </li>
                        <li class="nav-item my-3 ps-3">
                            <span class="fw-bold fs-14">COMING SOON</span>
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
                                <span class="fw-bold fs-14">Data Siswa</span>
                            </li>
                            <li class=" nav-item">
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
                                <a href="admin.php" class="nav-link on"><i class="bi bi-person me-2"></i> Admin</a>
                            </li>
                            <li class="nav-item my-3 ps-3">
                                <span class="fw-bold fs-14">COMING SOON</span>
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
                                <h1 class="fw-500">Admin PPDB SMP Al-Qolam</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-5 mt-4 mt-lg-0">
                            <form action="" method="post">
                                <div class="card rounded-8 shadow-2">
                                    <div class="card-body">
                                        <h5 class="fw-bold mb-3">Edit Admin</h5>
                                        <div class="mb-3">
                                            <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">
                                            <label class="form-label fw-500" for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" autocomplete="off" value="<?= $admin['username'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-500" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" autocomplete="off" value="<?= $admin["password"] ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-500" for="password">Password Baru</label>
                                            <input type="password" name="password_baru" id="password_baru" class="form-control" autocomplete="off"">
                                        </div>
                                        <div class=" d-flex justify-content-between">
                                            <span role="button" tabindex="0" id="toggleButton" onclick="lihatPassword()">Lihat Password</span>
                                            <div>
                                                <a href="admin.php" class="btn btn-outline-gray px-3 py-2 fw-bold">Batal</a>
                                                <button type="submit" name="edit_admin" class="btn btn-green fw-bold px-3 py-2">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST["edit_admin"])) {
                if (editAkunAdmin($_POST) > 0) {
                    echo "
                    <script>
                    setTimeout(function(){
                        Swal.fire({
                            icon: 'success',
                            title: 'Akun Berhasil Diubah!',
                            timer: 1700,
                            showConfirmButton: false,
                          })
                    },10)
                    window.setTimeout(function(){
                        window.location.href='admin.php';
                    }, 2000)
                    </script>
                ";
                } else {
                    echo "
                    <script>
                        setTimeout(function () { 
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Mengubah Akun!',
                            })
                        },10);  
                        window.setTimeout(function(){ 
                        } ,3000);
                    </script>
                ";
                }
            }
            ?>
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
        function hapusAdmin() {
            Swal.fire({
                title: 'Yakin Hapus?',
                text: "Akun akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const formHapusAdmin = document.getElementById('form_hapus_admin');
                    formHapusAdmin.addEventListener('submit', function(e) {
                        e.preventDefault();

                        let id_admin = document.getElementById("id_admin");
                        let username = document.getElementById("username");
                        let password = document.getElementById("password");
                    });
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Menghapus!',
                        showConfirmButton: false
                    })
                    setTimeout(function() {
                        window.location.href = 'index.php'
                    }, 1500)
                }
            })
        }


        function lihatPassword() {
            let password = document.getElementById('password_baru');
            const toggleButton = document.getElementById('toggleButton');

            if (password.type === 'password') {
                document.getElementById('password_baru').type = 'text';
                toggleButton.textContent = 'Sembunyikan Password';
            } else {
                document.getElementById('password_baru').type = 'password';
                toggleButton.textContent = 'Lihat Password';
            }
        }

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