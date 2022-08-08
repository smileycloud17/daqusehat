<?php
    include("../koneksi.php");
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pasien_resepsionis JOIN wilayah_2020 ON tb_pasien_resepsionis.provinsi = wilayah_2020.kode JOIN master_agama on tb_pasien_resepsionis.agama = master_agama.id_agama WHERE CHAR_LENGTH(wilayah_2020.kode)=2 ORDER BY no_rm DESC LIMIT 10");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>