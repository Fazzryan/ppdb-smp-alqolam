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
                    <a href="index.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                                                            echo 'on';
                                                        } ?>"><i class="bi bi-house me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item my-3 ps-3">
                    <span class="fw-bold fs-14">PPDB</span>
                </li>
                <li class="nav-item">
                    <a href="data_calon_siswa.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_calon_siswa.php') {
                                                                        echo 'on';
                                                                    } ?>"><i class="bi bi-file-earmark-text me-2"></i>Data Calon
                        Siswa</a>
                </li>
                <li class="nav-item">
                    <a href="data_siswa_lengkap.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_siswa_lengkap.php') {
                                                                            echo 'on';
                                                                        } ?>"><i class="bi bi-file-earmark-check me-2"></i> Data Siswa Lengkap</a>
                </li>
                <li class="nav-item">
                    <a href="data_siswa_tidak_lengkap.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_siswa_tidak_lengkap.php') {
                                                                                echo 'on';
                                                                            } ?>"><i class="bi bi-file-earmark-x me-2"></i> Data Siswa Tidak Lengkap</a>
                </li>
                <li class="nav-item my-3 ps-3">
                    <span class="fw-bold fs-14">AKUN</span>
                </li>
                <li class="nav-item">
                    <a href="admin.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
                                                            echo 'on';
                                                        } ?>"><i class="bi bi-person-fill-gear me-2"></i> Admin</a>
                </li>
                <li class="nav-item">
                    <a href="siswa.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'siswa.php') {
                                                            echo 'on';
                                                        } ?>"><i class="bi bi-person-fill me-2"></i> Siswa</a>
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
                        <a href="index.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                                                                echo 'on';
                                                            } ?>"><i class="bi bi-house me-2"></i> Dashboard</a>
                    </li>
                    <li class="nav-item my-3 ps-3">
                        <span class="fw-bold fs-14" style="font-size: 14px;">Data Siswa</span>
                    </li>
                    <li class="nav-item">
                        <a href="data_calon_siswa.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_calon_siswa.php') {
                                                                            echo 'on';
                                                                        } ?>"><i class="bi bi-file-earmark-text me-2"></i>Data Calon Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_siswa_lengkap.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_siswa_lengkap.php') {
                                                                                echo 'on';
                                                                            } ?>"><i class="bi bi-file-earmark-check me-2"></i> Data Siswa Lengkap</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_siswa_tidak_lengkap.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_siswa_tidak_lengkap.php') {
                                                                                    echo 'on';
                                                                                } ?>"><i class="bi bi-file-earmark-x me-2"></i> Data Siswa Tidak Lengkap</a>
                    </li>
                    <li class="nav-item my-3 ps-3">
                        <span class="fw-bold fs-14">AKUN</span>
                    </li>
                    <li class="nav-item">
                        <a href="admin.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
                                                                echo 'on';
                                                            } ?>"><i class="bi bi-person-fill-gear me-2"></i> Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="siswa.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'siswa.php') {
                                                                echo 'on';
                                                            } ?>"><i class="bi bi-person-fill me-2"></i> Siswa</a>
                </ul>
            </div>
        </div>

    </div>
</div>