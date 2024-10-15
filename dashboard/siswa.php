<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    header("Location: ../ppdb/login.php");
    exit();
}

$jmlsiswa = mysqli_query($koneksi, "SELECT COUNT(*) AS jml_siswa FROM siswa");
$data = mysqli_fetch_assoc($jmlsiswa);

$siswa = mysqli_query($koneksi, "SELECT * FROM siswa");

if (isset($_POST["hapus_siswa"])) {
    $id_siswa = $_POST["id_siswa"];
    $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");
    if ($query) {
        echo "
            <script>
                alert('Berhasil Hapus!');
                window.location.href='siswa.php'
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Akun Siswa PPDB SMP Al-Qolam</title>
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
                                <h1 class="fw-500">Akun Siswa PPDB SMP Al-Qolam</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5 col-lg-5">
                            <span class="fs-18">Menampilkan <b><?= $data['jml_siswa'] ?></b> data akun siswa.</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="card rounded-8 shadow-1">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th><i class="bi bi-gear-fill"></i> Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($siswa as $key => $item) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $item["username"] ?></td>
                                                        <td><?= $item["password"] ?></td>
                                                        <td>
                                                            <a href="edit_siswa.php?id_pendaftaran=<?= $item['id_pendaftaran'] ?>" class="btn btn-gray"><i class="bi bi-pencil-fill"></i></a>

                                                            <!-- <form action="" method="post" class="d-inline">
                                                                <input type="hidden" name="id_siswa" id="id_siswa" value="<?= $item['id_siswa'] ?>">
                                                                <button type="submit" name="hapus_siswa" class="btn btn-gray <?php if ($item['username'] == 'siswa') {
                                                                                                                                    echo 'disabled';
                                                                                                                                } ?>" onclick="return confirm('Yakin Hapus?')"><i class="bi bi-trash-fill"></i></button>
                                                            </form> -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST["tambah_admin"])) {
                if (buatAkunAdmin($_POST) > 0) {
                    echo "
                    <script>
                    setTimeout(function(){
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Membuat Akun!',
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
                                title: 'Gagal Membuat Akun!',
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
        function lihatPassword() {
            let password = document.getElementById('password');
            const toggleButton = document.getElementById('toggleButton');

            if (password.type === 'password') {
                document.getElementById('password').type = 'text';
                toggleButton.textContent = 'Sembunyikan Password';
            } else {
                document.getElementById('password').type = 'password';
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