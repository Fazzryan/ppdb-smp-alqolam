<!-- Sidebar -->
<nav class="navbar-vertical-nav">
    <div class="navbar-vertical">
        <div class="p-4">
            <a href="../../ppdb/index.php" class="navbar-brand fw-bold">
                <img src="../../asset/img/logosmp.jpg" class="" width="35" alt="">
                SMP Al-Qolam
            </a>
        </div>
        <div class="navbar-vertical-content flex-grow-1">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                                                            echo 'on';
                                                        } ?>"><i class="bi bi-house me-2"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="siswa_detail.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'siswa_detail.php') {
                                                                    echo 'on';
                                                                } ?>"><i class="bi bi-journal-bookmark me-2"></i> Biodata Siswa</a>
                </li>
                <li class="nav-item">
                    <a href="akun_siswa.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'akun_siswa.php') {
                                                                    echo 'on';
                                                                } ?>"><i class="bi bi-person me-2"></i> Akun Siswa</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar Off Canva -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <img src="../../asset/img/logosmp.jpg" class="" width="35" alt="">
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
                    <li class="nav-item">
                        <a href="siswa_detail.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'siswa_detail.php') {
                                                                        echo 'on';
                                                                    } ?>"><i class="bi bi-journal-bookmark me-2"></i> Biodata Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="akun_siswa.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'akun_siswa.php') {
                                                                        echo 'on';
                                                                    } ?>"><i class="bi bi-person me-2"></i> Akun Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>