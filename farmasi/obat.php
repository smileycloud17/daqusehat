<?php 
    include '../koneksi.php';
    $no_reg = json_encode($_POST['id']);
    
    $tombol_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat_hasil_pemeriksaan where no_reg = $no_reg");
    $to = mysqli_fetch_array($tombol_obat);
    $obat = "SELECT * FROM tb_obat_hasil_pemeriksaan where no_reg = $no_reg";
    $do = mysqli_query($koneksi, $obat);
    $data_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pemeriksaan_poliumum where no_reg = $no_reg");
    $dp = mysqli_fetch_array($data_pasien);
?>
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Detail Obat</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<h5 style="font-size: 20px; font-weight: bold;">Data Pasien</h5>
No RM : <?php echo $dp['no_rm']; ?> <br>
No Registrasi : <?php echo $dp['no_reg']; ?> <br>
Nama Pasien : <?php echo $dp['nama_pasien']; ?> <hr>
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
        }else{
    ?>

    <?php
        }
    ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <form action="proses-obat.php" method="post">
        <input type="text" name="no-reg" value="<?php echo $dp['no_reg']; ?>" hidden>
        <?php 
            $status = $to['status'];
            if($status == 'Sudah Dilayani'){
        ?>
                <button type="submit" class="btn btn-danger" disabled>Telah Dilayani</button>
        <?php
            }else{
        ?>
                <button type="submit" class="btn btn-primary">Tandai Telah Dilayani</button>
        <?php
            }
        ?>
    </form>
</div>
</div>