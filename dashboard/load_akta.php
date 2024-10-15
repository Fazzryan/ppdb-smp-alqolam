<?php
include "../config/koneksi.php";
$id_pendaftaran = $_GET['id_pendaftaran'];
$pendaftaran = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
$data = mysqli_fetch_assoc($pendaftaran);
?>
<div>
    <embed src="<?php echo $data['pdf_akta']; ?>" type="application/pdf" width="100%" height="100%" />
</div>