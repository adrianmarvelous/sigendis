<?php 
    require_once '../../../../koneksi.php';
    require_once '../../../../session.php';

    $id = htmlentities($_GET['id']);
    $no_srt_persetujuan = htmlentities($_GET['no_srt_persetujuan']);
    $no_srt_ijin = htmlentities($_GET['no_srt_ijin']);
    $nip_approve = '196905101997022001';

    $akun = htmlentities($_GET['akun']);

    $uniqueCode = uniqid();
    $lastFiveDigits = substr($uniqueCode, -5);

    // if($akun == "admin"){
        $tgl_persetujuan = date("Y-m-d");
    // }else{
    //     $tgl_persetujuan = NULL;
    // }

    $query_check = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
    $query_check->bindParam(':id',$id);
    $query_check->execute();
    $check = $query_check->fetch(PDO::FETCH_ASSOC);
    
    $query_cek1 = $db->prepare("SELECT * FROM `sigendis_jadwal_peminjaman` WHERE tgl_mulai <= :tgl_mulai AND tgl_selesai >= :tgl_mulai AND status = 1;");
    $query_cek1->bindParam(':tgl_mulai',$check['tgl_mulai']);
    $query_cek1->execute();

    $query_cek2 = $db->prepare("SELECT * FROM `sigendis_jadwal_peminjaman` WHERE tgl_mulai <= :tgl_selesai AND tgl_selesai >= :tgl_selesai AND status = 1;");
    $query_cek2->bindParam(':tgl_selesai',$check['tgl_selesai']);
    $query_cek2->execute();
    echo $query_cek1->rowCount()." - ".$query_cek2->rowCount();

    
    if($query_cek1->rowCount()+$query_cek2->rowCount() > 0){
        echo "<script>alert('Jadwal telah terisi');window.location='../../index.php?pages=detail_pemohon&id=$id'</script>";
    }else{
        $update = $db->prepare("UPDATE sigendis_jadwal_peminjaman SET kode_unik=:kode_unik, status=1, tgl_persetujuan=:tgl_persetujuan, no_srt_persetujuan=:no_srt_persetujuan, no_srt_ijin=:no_srt_ijin, nip_approve=:nip_approve WHERE id = :id");
        $update->bindParam(':kode_unik',$lastFiveDigits);
        $update->bindParam(':tgl_persetujuan',$tgl_persetujuan);
        $update->bindParam(':no_srt_persetujuan',$no_srt_persetujuan);
        $update->bindParam(':no_srt_ijin',$no_srt_ijin);
        $update->bindParam(':nip_approve',$nip_approve);
        $update->bindParam(':id',$id);
        $update->execute();
    
        header("Location: ../../index.php?pages=pemohon_baru_detail_pemohon&id=$id");
    }


?>