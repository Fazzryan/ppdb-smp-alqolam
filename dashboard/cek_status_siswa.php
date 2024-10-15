<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

$id_pendaftaran = $_POST["id_pendaftaran"];


$ganti_status = mysqli_query($koneksi, "UPDATE pendaftaran SET status = 1 WHERE id_pendaftaran = '$id_pendaftaran'");
$delete_keterangan = mysqli_query($koneksi, "DELETE FROM keterangan WHERE id_pendaftaran = '$id_pendaftaran'");

?>
<link rel="stylesheet" href="../asset/css/bootstrap.css">
<link rel="stylesheet" href="../asset/css/style.css">
<script src="../asset/js/sweetalert2.js"></script>
<script>
    setTimeout(function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data telah diverifikasi!',
            timer: 1700,
        })
    }, 10)
    window.setTimeout(function() {
        window.location.href = 'data_calon_siswa.php';
    }, 1700)
</script>