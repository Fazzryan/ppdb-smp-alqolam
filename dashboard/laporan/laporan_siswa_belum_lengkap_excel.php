<?php
include "../../config/koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Siswa Belum Lengkap SMP AL-Qolam.xls");

$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE status = 0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Calon Siswa Lengkap Excel</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Pendaftaran</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Sekolah Asal</th>
                <th>Agama</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Pekerjaan Ayah</th>
                <th>Pekerjaan Ibu</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $data) : ?>
                <?php
                if ($data["status"] == 0) {
                    $stat = "Belum Di-Verifikasi";
                } else {
                    $stat = "Sudah Lengkap";
                }

                ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $data["id_pendaftaran"] ?></td>
                    <td><?= $data["nama_lengkap"] ?></td>
                    <td><?= $data["nik"] ?></td>
                    <td><?= $data["nisn"] ?></td>
                    <td><?= $data["jenis_kelamin"] ?></td>
                    <td><?= $data["tempat_lahir"] ?></td>
                    <td><?= $data["tanggal_lahir"] ?></td>
                    <td><?= $data["sekolah_asal"] ?></td>
                    <td><?= $data["agama"] ?></td>
                    <td><?= $data["nama_ayah"] ?></td>
                    <td><?= $data["nama_ibu"] ?></td>
                    <td><?= $data["pekerjaan_ayah"] ?></td>
                    <td><?= $data["pekerjaan_ibu"] ?></td>
                    <td><?= $data["alamat"] ?></td>
                    <td><?= $data["nomor_telepon"] ?></td>
                    <td><?= $stat ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>