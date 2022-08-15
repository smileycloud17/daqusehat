<?php
include "../koneksi.php";
$no_rm = $_POST['no_rm'];
$no_reg = $_POST['no_reg'];
$nama = $_POST['namalngkp'];
$tanggal_masuk = $_POST['indate'];
$pemeriksaan_penunjang = $_POST['pemeriksaan_penunjang'];
$diagnosa = $_POST['diagnosa'];
$ananmnesa = $_POST['ananmnesa'];
$pemeriksaan_fisik = $_POST['pemeriksaan_fisik'];
$simpan = mysqli_query($koneksi,"UPDATE tb_pemeriksaan_poliumum SET diagnosa='$diagnosa', pemeriksaan_penunjang='$pemeriksaan_penunjang', ananmnesa='$ananmnesa', pemeriksaan_fisik='$pemeriksaan_fisik', status_pelayanan='Sudah Dilayani' WHERE no_reg='$no_reg'");

$obat = $_POST['obat'];
$jumlah = $_POST['jumlah'];
$dosis = $_POST['dosis'];
foreach($obat as $key=>$value){
    $save="INSERT INTO tb_obat_hasil_pemeriksaan(no_reg,nama_obat,jumlah,dosis,tanggal_periksa,status)VALUES('".$no_reg."','".$value."','".$jumlah[$key]."','".$dosis[$key]."','".$tanggal_masuk."','Belum Dilayani')";
    $query = mysqli_query($koneksi,$save);
}
 
if ($simpan and $query) {
    echo "
        <script>
            window.location = 'dashboard.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('Gagal Menambahkan Pasien! Cek Kembali');
            window.location = 'registration.php?no_reg=$no_reg';
        </script>
    ";
}
?>