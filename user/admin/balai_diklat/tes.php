<?php 
    require_once '../../../koneksi.php';
    $id = htmlentities($_GET['id']);

    $query_data = $db->prepare("SELECT * FROM booking_header WHERE id = :id");
    $query_data->bindParam(':id',$id);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
    $lama_hari = strtotime($data['tgl_mulai']) - strtotime($data['tgl_selesai']);
    echo $hari = abs(round($lama_hari / 84600));
?>