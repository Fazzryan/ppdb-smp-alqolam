<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if (!empty($_SESSION["username"]) || !empty($_SESSION["password"])) {
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <!-- <link rel="stylesheet" href="../asset/css/sweetalert.css"> -->
    <!-- Bs Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Login | SMP Al-Qolam</title>
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
                                        <h1 class="fw-500 font-roboto">LOGIN ADMIN PPDB</h2>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-500" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" autocomplete="off" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-500" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                                </div>
                                <button type="submit" name="login" class="btn btn-green w-100 py-2 mb-3 fs-20">MASUK</button>
                                <div class="text-center">
                                    <a href="index.php" class="text-green">&laquo; KEMBALI KE HOME | </a>
                                    <a href="login_siswa.php" class="text-green">LOGIN SEBAGAI <span class="text-primary">SISWA</span> &raquo; </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="fw-bold text-white text-center fs-14">&copy; 2023 - SMP AL-QOLAM TASIKMALAYA</p>

                    <?php

                    if (isset($_POST["login"])) {
                        if (login($_POST) > 0) {
                            echo "
                            <script>
                                setTimeout(function(){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Login Berhasil!',
                                        timer: 1700,
                                        showConfirmButton: false,
                                      })
                                },10)
                                window.setTimeout(function(){
                                    window.location.href = '../dashboard/index.php';
                                }, 1700)
                            </script>
                        ";
                        } else {
                            echo "
                            <script>
                            setTimeout(function () { 
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Gagal!',
                                    text: 'Username atau Password salah!'
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
    <script>

    </script>
    <script src="../asset/js/bootstrap.js"></script>
    <script src="../asset/js/sweetalert2.js"></script>
</body>

</html>