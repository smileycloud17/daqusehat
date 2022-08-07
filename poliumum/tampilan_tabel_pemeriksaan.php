<!-- <?php 
    
    include("../koneksi.php");
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pemeriksan_poliumum ORDER BY id DESC LIMIT 10");
    
?>

<?php if(mysqli_num_rows($sql)>0){ ?>
<?php
    $no = 1;
    while($d = mysqli_fetch_array($sql)){
?> -->
<tr>
    <td><?php echo $no ?></td>
    <td><?php echo $d['no_reg'] ?></td>
    <td><?php echo $d['no_rm'] ?></td>
    <td><?php echo $d['nama_pasien']?></td>
    <td><?php $tanggal = $d['tgl_masuk']; echo date("d M Y", strtotime($tanggal)) ?></td>
    <td><?php echo $d['jenis_layanan']?></td>
    <td><a href="registration" class="btn-pelayanan belum">Belumdilayani</a></td>
</tr>
<?php $no++; } ?>
<?php } ?>