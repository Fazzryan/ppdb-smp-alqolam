<?php
include "koneksi.php";
// Buat Akun
function buatAkunAdmin($data)
{
    global $koneksi;

    $username = htmlspecialchars($data["username"]);
    $password = md5($data["password"]);

    $query = mysqli_query($koneksi, "INSERT INTO admin (id_admin, username, password) VALUES ('', '$username', '$password')");
    if ($query) {
        return mysqli_affected_rows($koneksi);
    }
}
function editAkunAdmin($data)
{
    global $koneksi;

    $id_admin = $data["id_admin"];
    $username = $data["username"];
    $password = $data["password"];
    $password_baru = $data["password_baru"];

    if ($password_baru == '') {
        $pass = $password;
    } else {
        $pass = md5($password_baru);
    }

    $query = mysqli_query($koneksi, "UPDATE admin SET username = '$username', password ='$pass' WHERE id_admin = '$id_admin'");

    if ($query) {
        return mysqli_affected_rows($koneksi);
    }
}

// Edit Akun Siswa
function editAkunSiswa($data)
{
    global $koneksi;

    $id_pendaftaran = $_POST["id_pendaftaran"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_baru = $_POST["password_baru"];

    if ($password_baru == '') {
        $passwd = $password;
    } else {
        $passwd = $password_baru;
    }

    $edit = mysqli_query($koneksi, "UPDATE siswa SET id_pendaftaran = '$id_pendaftaran', username = '$username', password = '$passwd' WHERE id_pendaftaran = '$id_pendaftaran'");
    if ($edit) {
        echo "
            <script>
                alert('Berhasil Mengubah Akun Siswa!');
                window.location = document.URL;
            </script>
        ";
    }
}
// Login
function login($data)
{
    global $koneksi;

    $username = $data["username"];
    $password = md5($data["password"]);
    $passw = $data["password"];

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    $admin = mysqli_fetch_assoc($query);
    if ($admin) {
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['password'] = $admin['password'];
    }
    return mysqli_affected_rows($koneksi);
}

function login_siswa($data)
{
    global $koneksi;

    $username = $data["username"];
    $passw = $data["password"];

    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE username = '$username' AND password = '$passw'");
    $siswa = mysqli_fetch_assoc($query);
    if ($siswa) {
        $_SESSION['id_siswa'] = $siswa['id_siswa'];
        $_SESSION['id_pendaftaran'] = $siswa['id_pendaftaran'];
        $_SESSION['username'] = $siswa['username'];
        $_SESSION['password'] = $siswa['password'];
    }
    return mysqli_affected_rows($koneksi);
}

// Logout
function logout()
{
    session_destroy();
    echo "
    <script>
        window.location ='../index.php';
    </script>";
}


function daftar($data)
{
    global $koneksi;

    $kode_pendaftaran = mysqli_query($koneksi, "SELECT max(id_pendaftaran) AS kodeTerakhir FROM pendaftaran");
    $kode_daftar = mysqli_fetch_array($kode_pendaftaran);
    $kode = $kode_daftar["kodeTerakhir"];

    $urutan = (int) substr($kode, 3, 3);
    $urutan++;

    $huruf = "PEN";
    $kode = $huruf . sprintf("%03s", $urutan);

    $id_pendaftaran = $data["id_pendaftaran"];
    $nama_lengkap = $data["nama_lengkap"];
    $nik = $data["nik"];
    $nisn = $data["nisn"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $agama = $data["agama"];
    $sekolah_asal = $data["sekolah_asal"];
    $nama_ayah = $data["nama_ayah"];
    $nama_ibu = $data["nama_ibu"];
    $pekerjaan_ayah = $data["pekerjaan_ayah"];
    $pekerjaan_ibu = $data["pekerjaan_ibu"];
    $alamat = $data["alamat"];
    $nomor_telepon = $data["nomor_telepon"];

    // Proses unggah file PDF dan PNG
    $target_dir = "../fileupload/";  // Ganti dengan direktori tujuan penyimpanan file
    $target_files = array("file_ijazah", "file_akta_kelahiran", "file_kartu_keluarga", "file_ktp", "file_nisn", "foto_siswa");

    $file_paths = array();

    foreach ($target_files as $file_input) {
        $target_file = $target_dir . basename($_FILES[$file_input]['name']);
        if (move_uploaded_file($_FILES[$file_input]['tmp_name'], $target_file)) {
            $file_paths[$file_input] = $target_file;
        } else {
            echo "Gagal mengunggah file.";
            exit;
        }
    }

    // Simpan data ke database
    $query = "INSERT INTO pendaftaran (id_pendaftaran, nama_lengkap, nik, nisn, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, sekolah_asal, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, alamat, nomor_telepon, pdf_ijazah, pdf_akta, pdf_kk, pdf_ktp, pdf_nisn, foto) VALUES ('$id_pendaftaran','$nama_lengkap', '$nik', '$nisn', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$sekolah_asal', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu', '$alamat', '$nomor_telepon', '$file_paths[file_ijazah]', '$file_paths[file_akta_kelahiran]', '$file_paths[file_kartu_keluarga]', '$file_paths[file_ktp]', '$file_paths[file_nisn]', '$file_paths[foto_siswa]')";

    if ($koneksi->query($query) === TRUE) {
        // Membuat akun siswa dan simpan ke database
        mysqli_query($koneksi, "INSERT INTO siswa (id_siswa, id_pendaftaran, username, password)
        VALUES ('','$id_pendaftaran','$nama_lengkap','12345678')
        ");
        return mysqli_affected_rows($koneksi);
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

function edit_data_siswa($data)
{
    global $koneksi;

    $id_pendaftaran = $data["id_pendaftaran"];

    $nama_lengkap = $data["nama_lengkap"];
    $nik = $data["nik"];
    $nisn = $data["nisn"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $agama = $data["agama"];
    $sekolah_asal = $data["sekolah_asal"];
    $nama_ayah = $data["nama_ayah"];
    $nama_ibu = $data["nama_ibu"];
    $pekerjaan_ayah = $data["pekerjaan_ayah"];
    $pekerjaan_ibu = $data["pekerjaan_ibu"];
    $alamat = $data["alamat"];
    $nomor_telepon = $data["nomor_telepon"];

    $pdf_ijazah = $data["pdf_ijazah"];
    $pdf_akta = $data["pdf_akta"];
    $pdf_kk = $data["pdf_kk"];
    $pdf_nisn = $data["pdf_nisn"];
    $foto = $data["foto"];

    $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_lengkap = '$nama_lengkap', nik = '$nik', nisn = '$nisn', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', agama = '$agama', sekolah_asal = '$sekolah_asal', nama_ayah = '$nama_ayah',nama_ibu = '$nama_ibu', pekerjaan_ayah = '$pekerjaan_ayah', pekerjaan_ibu = '$pekerjaan_ibu', alamat = '$alamat', nomor_telepon = '$nomor_telepon' WHERE id_pendaftaran = '$id_pendaftaran'");
    if ($update) {
        return mysqli_affected_rows($koneksi);
    }
}

function simpanKeterangan($data)
{
    global $koneksi;

    $id_pendaftaran = $data["id_pendaftaran"];
    $keterangan = $data["keterangan"];

    $query = mysqli_query($koneksi, "INSERT INTO keterangan (id_keterangan, id_pendaftaran, keterangan) VALUES ('', '$id_pendaftaran','$keterangan')");

    if ($query) {
        return mysqli_affected_rows($koneksi);
    }
}

function gantiStatusPendaftaran($data)
{
    global $koneksi;

    $id = $data["id_pendaftaran"];
    $status = $data["status_pendaftaran"];

    $query = mysqli_query($koneksi, "UPDATE ppdb SET status = '$status'");
    if ($query) {
        // mysqli_query($koneksi, "DELETE FROM keterangan WHERE id_pendaftaran = '$id'");
        return mysqli_affected_rows($koneksi);
    }
}

function hapusCalonSiswa($data)
{
    global $koneksi;

    $id_pendaftaran = $data["id_pendaftaran"];

    $hapus = mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'");
}
