<?php
    require_once '../../../../koneksi.php';

    $id = htmlentities($_GET['id']);

    $tolak = $db->prepare('UPDATE sigendis_jadwal_peminjaman SET status = -1 WHERE id = :id');
    $tolak->bindParam(':id',$id);
    $tolak->execute();

    
    header("Location: ../../index.php?pages=pemohon_baru_detail_pemohon&id=$id");
?>