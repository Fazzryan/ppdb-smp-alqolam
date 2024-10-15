<?php
include "../../config/koneksi.php";
require_once "../../lib/fpdf/fpdf.php";


class PDF extends FPDF
{
    // Membuat Page header
    function Header()
    {
        // Menambahkan Logo
        $this->Image('../../asset/img/logosmp.jpg', 10, 6, 25);
        // Menambahkan judul header
        $this->SetFont('Helvetica', 'B', 13);
        $this->Cell(30);
        $this->Cell(140, 0, 'PONDOK PESANTREN AL-QOLAM', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(0, 170, 91);
        $this->Cell(30);
        $this->Cell(140, 15, 'SMP AL-QOLAM', 0, 1, 'C');

        $this->SetFont('Helvetica', '', 9);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(30);
        $this->Cell(140, 0, 'Jl. Dusun Nagrak, Sindangraja, Kec. Jamanis, Kabupaten Tasikmalaya, Jawa Barat', 0, 1, 'C');

        // Menambahkan garis header
        $this->SetLineWidth(1);
        $this->Line(10, 36, 200, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 37, 200, 37);
        $this->Ln();
    }
    // Membuat page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Helvetica', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

//tampilkan judul laporan
$pdf->Cell(0, 20);

$pdf->Ln();
//Membuat kolom judul tabel
$pdf->SetFont('Helvetica', 'B', '11');
$pdf->SetFIllColor(30, 214, 128);
$pdf->SetDrawColor(42, 53, 79);
$pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
$pdf->Cell(35, 7, 'ID Pendaftaran', 1, '0', 'C', true);
$pdf->Cell(30, 7, 'Nisn', 1, '0', 'C', true);
$pdf->Cell(50, 7, 'Nama', 1, '0', 'C', true);
$pdf->Cell(35, 7, 'Telepon', 1, '0', 'C', true);
$pdf->Cell(35, 7, 'Status', 1, '0', 'C', true);
$pdf->Ln();

//Membuat kolom isi tabel
$pdf->SetFont('Helvetica', '', '11');

$i = 0;

$tampil = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
while ($data = mysqli_fetch_array($tampil)) {
    if ($data["status"] == 0) {
        $status = "Belum Di-Verfikasi";
    } else {
        $status = "Sudah Lengkap";
    }
    $i++;
    $pdf->Cell(8, 7, $i, 1, '0', 'C');
    $pdf->Cell(35, 7, $data['id_pendaftaran'], 1, '0', 'L');
    $pdf->Cell(30, 7, $data['nisn'], 1, '0', 'L');
    $pdf->Cell(50, 7, $data['nama_lengkap'], 1, '0', 'L');
    $pdf->Cell(35, 7, $data['nomor_telepon'], 1, '0', 'L');
    $pdf->Cell(35, 7, $status, 1, '0', 'L');
    $pdf->Ln();
}
// Menampilkan output file PDF
$pdf->Output('i', 'Data Calon Siswa SMP Al-Qolam.pdf', 'false');
