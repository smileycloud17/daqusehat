<?php 
    include '../koneksi.php';
    $no_reg = json_encode($_POST['id']);
    error_reporting(0);
    
    $tombol_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat_hasil_pemeriksaan where no_reg = $no_reg");
    $to = mysqli_fetch_array($tombol_obat);
    $obat = "SELECT * FROM tb_obat_hasil_pemeriksaan where no_reg = $no_reg";
    $do = mysqli_query($koneksi, $obat);
    $data_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pemeriksaan_poliumum where no_reg = $no_reg");
    $dp = mysqli_fetch_array($data_pasien);
    $cek_pasien = mysqli_query($koneksi, "SELECT * FROM tb_cek_pasien where no_reg = $no_reg");
    $cp = mysqli_fetch_array($cek_pasien);
    $no_rm = $dp['no_rm'];
    $data_pasien_resepsionis = mysqli_query($koneksi, "SELECT * FROM tb_pasien_resepsionis where no_rm = $no_rm");
    $dpr = mysqli_fetch_array($data_pasien_resepsionis);
?>

<h5 style="font-size: 20px; font-weight: bold;">Data Pasien</h5>
<table style="width: 100%;">
    <tr>
        <td>
            No RM : <?php echo $dp['no_rm']; ?>
        </td>
        <td>
            <?= $cp['perawatan']; ?>
        </td>
    </tr>
    <tr>
        <td>
            No Registrasi : <?php echo $dp['no_reg']; ?> <br>
        </td>
        <td>
            <?= $dp['jenis_layanan']; ?>
        </td>
    </tr>
    <tr>
        <td>
            Nama Pasien : <?php echo $dp['nama_pasien']; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Jenis Kelamin : 
            <?php if($dpr['jenis_kelamin'] == "") {
                echo "-";
                } else {
                    echo $dpr['jenis_kelamin'];
                 }; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Tanggal Masuk : <?php $tanggal = $dp['tanggal_masuk']; echo date("d-m-Y", strtotime($tanggal)) ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            No BPJS : 
            <?php if($dp['jenis_layanan'] == "umum") {
                echo "-";
                } else {
                    echo $dpr['no_bpjs'];
                 }; ?>
        </td>
        <td>
        </td>
    </tr>
</table>
<hr>
<h5 style="font-size: 20px; font-weight: bold;">Hasil Cek up</h5>
<table style="width: 100%;">
    <tr>
        <td>
            Berat Badan : <?php echo $cp['berat_badan']; ?> Kg
        </td>
        <td>
            Berat Badan : <?php echo $cp['suhu_badan']; ?> &#176;C
        </td>
    </tr>
    <tr>
        <td>
            Tinggi Badan : <?php echo $cp['tinggi_badan']; ?> cm
        </td>
        <td>
            Golongan Darah : <?php echo $cp['gol_darah']; ?>
        </td>
    </tr>
</table>
<hr>
<h5 style="font-size: 20px; font-weight: bold;">Tekanan Darah</h5>
<table style="width: 100%;">
    <tr>
        <td>
            Sistole : <?php echo $cp['sistole']; ?> mmHg
        </td>
        <td>
            Diastole : <?php echo $cp['diastole']; ?> mmHg
        </td>
    </tr>
</table>
<hr>
<h5 style="font-size: 20px; font-weight: bold;">Hasil Pemeriksaan</h5>
<table style="width: 100%;">
    <tr>
        <td>
            Anamnesa : <?php echo $dp['ananmnesa']; ?> 
        </td>
    </tr>
    <tr>
        <td>
            Pemeriksaan Fisik : <?php echo $dp['pemeriksaan_fisik']; ?> 
        </td>
    </tr>
    <tr>
        <td>
            Diagnosa : <?php echo $dp['diagnosa']; ?>
        </td>
    </tr>
    <tr>
        <td>
            Pemeriksaan Penunjang : <?php echo $dp['pemeriksaan_penunjang']; ?>
        </td>
    </tr>
</table>
<hr>
<h5 style="font-size: 20px; font-weight: bold;">Alergi</h5>
<table style="width: 100%;">
    <tr>
        <td>
            Makanan : 
            <?php echo $dpr['alergi_makanan']; ?> 
        </td>
    </tr>
    <tr>
        <td>
            Udara : 
            <?php echo $dpr['alergi_udara']; ?> 
        </td>
    </tr>
    <tr>
        <td>
            Obat : 
            <?php echo $dpr['alergi_obat']; ?>
        </td>
    </tr>
</table>
<hr>
<h5 style="font-size: 20px; font-weight: bold;">Data Obat Pasien</h5>
<div class="tabel-dashboard">
    <table>
        <thead>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Dosis</th>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($do)>0){ ?>
                <?php
                $no = 1;
                while($d = mysqli_fetch_array($do)){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $d['nama_obat']; ?></td>
                <td><?php echo $d['jumlah']; ?></td>
                <td><?php echo $d['dosis']; ?></td>
            </tr>
            <?php $no++; } ?>
            <?php } ?>
</tbody>
</table>
</div>
    <?php 
        $status = $to['status'];
        if($status == 'Sudah Dilayani'){
    ?>
        <h2 class="status-pelayanan">Sudah Dilayani</h2>
    <?php
        }else if ($status == null){
    ?>
        <h2 class="status-pelayanan belum-dilayani">Belum Dilayani</h2>
    <?php
        }
    ?>
</div>