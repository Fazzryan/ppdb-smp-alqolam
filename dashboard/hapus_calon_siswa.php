    <?php
    session_start();
    include "../config/koneksi.php";
    include "../config/fungsi.php";

    $id_pendaftaran = $_POST["id_pendaftaran"];

    $query = "SELECT pdf_ijazah, pdf_akta, pdf_kk, pdf_nisn, foto FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {

        $hapus = mysqli_query($koneksi, "DELETE pendaftaran , keterangan 
        FROM pendaftaran 
        LEFT JOIN keterangan 
        ON pendaftaran.id_pendaftaran = keterangan.id_pendaftaran
        WHERE pendaftaran.id_pendaftaran = '$id_pendaftaran'");

        if ($hapus) {
            $row = $result->fetch_assoc();
            // Hapus file-file terkait
            foreach ($row as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'data_calon_siswa.php'
            </script>
            ";
        }
    }

    ?>