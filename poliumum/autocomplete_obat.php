<?php 
header("Content-Type: application/json; charset=UTF-8");
include '../koneksi.php';

if(isset($_GET['query'])){
    $obat = $_GET['query'];
    $query = mysqli_query($koneksi,"SELECT * FROM data_obat WHERE nama_obat LIKE '%$obat%' ORDER BY nama_obat DESC");
 
    while ($data = mysqli_fetch_array($query)) {
        $output['suggestions'][] = [
            'value' => $data['nama_obat'],
            'nama'  => $data['nama_obat']
        ];
    }
 
    if (! empty($output)) {
        echo json_encode($output);
    }
  }
?>