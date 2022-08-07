<?php
include ("koneksi.php");
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$pasien = mysqli_query($koneksi,"select * from tb_pasien_resepsionis");
$html = '<center><h3>Laporan Pasien Resepsionis</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>No RM</th>
            <th>No BPJS</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Gender</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Alamat Domisili</th>
        </tr>';
$no = 1;
while ($d = mysqli_fetch_array($pasien)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $d['no_rm'] . "</td>
                <td>" . $d['no_bpjs'] . "</td>
                <td>" . $d['nik'] . "</td>
                <td>" . $d['nama_pasien'] . "</td>
                <td>" . $d['tanggal_lahir'] . "</td>
                <td>" . $d['jenis_kelamin'] . "</td>
                <td>" . $d['no_telp'] . "</td>
                <td>" . $d['alamat'] . "</td>
                <td>" . $d['domisili'] . "</td>
                </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan.pdf', array("Attachment"=>0));