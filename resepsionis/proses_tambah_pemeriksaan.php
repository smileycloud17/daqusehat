<?php
include "../koneksi.php";
$perawatan = $_POST['perawatan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_rm1 = $_POST['no_rm1'];
$no_rm2 = $_POST['no_rm2'];
$no_rm3 = $_POST['no_rm3'];
$no_rm = $no_rm1.'.'.$no_rm2.'.'.$no_rm3;
$nama_lengkap = $_POST['nama'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$layanan = $_POST['layanan'];
$poli = $_POST['poli'];
$berat_badan = $_POST['berat_badan'];
$suhu_badan = $_POST['suhu_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$gol_darah = $_POST['golongan_darah'];
$sistole = $_POST['sistole'];
$diastole = $_POST['diastole'];
$noreg = $_POST['no_reg'];


$resepsionis = "INSERT INTO tb_cek_pasien (perawatan,no_reg,no_rm,nama_lengkap,tanggal_masuk,layanan,poli,berat_badan,suhu_badan,tinggi_badan,gol_darah,sistole,diastole) VALUES ('$perawatan','$noreg','$no_rm','$nama_lengkap','$tanggal_masuk','$layanan','$poli','$berat_badan','$suhu_badan','$tinggi_badan','$gol_darah','$sistole','$diastole')";


$poliumum = "INSERT INTO tb_pemeriksaan_poliumum (no_reg,no_rm,tanggal_masuk,nama_pasien,jenis_layanan,status_pelayanan) VALUES ('$noreg', '$no_rm','$tanggal_masuk','$nama_lengkap', '$layanan','Belum Dilayani')";

$simpan_pemeriksaan = mysqli_query($koneksi, $poliumum);

$simpan = mysqli_query($koneksi,$resepsionis);

if ($simpan and $simpan_pemeriksaan) {
    echo "
        <script>
            alert('Berhasil Menambahkan Data Pemeriksaan');
            window.location = 'datapemeriksaan.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('Gagal Menambahkan Pemeriksaan! Cek Kembali');
            // window.location = 'cekpasien.php';
        </script>
    ";
    echo "Error: <br>" . mysqli_error($koneksi);
    echo "Error: <br>" . mysqli_error($koneksi);
}
?>