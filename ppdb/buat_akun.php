<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

// $id_admin = $_SESSION["id_admin"];
// var_dump($id_admin);
// die;
// $admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id_admin'");

// if ($_SESSION["username"] !== 'Admin') {
//     header("Location: index.php");
//     exit();
// }


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
    <title>Buat Akun | SMP Al-Qolam</title>
    <link rel="icon" href="../asset/img/logosmp-1.png">
</head>

<body style="background:#134426;">
    <!-- Hero -->
    <main class="my-4" style="display:flex; justify-content:center; align-items:center;  min-height:85vh">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="card rounded-8 mb-4">
                        <div class="card-body" style="padding: 2rem 2rem;">
                            <form action="" method="post">
                                <div class="text-center">
                                    <img src="../asset/img/logosmp.jpg" alt="logo smp" class="logo-smp">
                                    <div class="my-4">
                                        <h1 class="fw-500 font-roboto">Buat Akun Admin PPDB</h1>
                                        <p class="text-muted">Sudah punya akun? <a href="login.php " class="text-green">Login disini</a></p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-500" for="nama_lengkap">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-500" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <button type="submit" name="registrasi" class="btn btn-green w-100 py-2 mb-3 fs-20">BUAT AKUN</button>
                                <div class="text-center">
                                    <a href="index.php" class="text-green">&laquo; KEMBALI KE HOME</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="fw-bold text-white text-center fs-14">&copy; 2023 - SMP AL-QOLAM TASIKMALAYA</p>
                    <?php

                    if (isset($_POST["registrasi"])) {
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
                                window.location.href='login.php';
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
                </div>
            </div>
        </div>
    </main>

    <script src="asset/js/bootstrap.js"></script>
    <script src="../asset/js/sweetalert2.js"></script>

</body>

</html>