<?php 
    ini_set('display_errors', 1);
    error_reporting(~0);
    require_once '../koneksi.php';

    echo $tgl_mulai = htmlentities($_GET['tgl_mulai']);
    echo "<br>";
    echo $tgl_selesai = htmlentities($_GET['tgl_selesai']);

    if(strtotime($tgl_selesai) < strtotime($tgl_mulai)){
        header('Location: ../calendar/calendar.php?status=tgl_terbalik');
    }else{

        $query_cek1 = $db->prepare("SELECT * FROM `sigendis_jadwal_peminjaman` WHERE tgl_mulai <= :tgl_mulai AND tgl_selesai >= :tgl_mulai AND status = 1;");
        $query_cek1->bindParam(':tgl_mulai',$tgl_mulai);
        $query_cek1->execute();
    
        $query_cek2 = $db->prepare("SELECT * FROM `sigendis_jadwal_peminjaman` WHERE tgl_mulai <= :tgl_selesai AND tgl_selesai >= :tgl_selesai AND status = 1;");
        $query_cek2->bindParam(':tgl_selesai',$tgl_selesai);
        $query_cek2->execute();
    
    
        /*if($query_cek1->rowCount()+$query_cek2->rowCount() > 0){
            echo "<script>alert('Jadwal Telah Terisi');window.location='../background-event.php'</script>";
        }else{
           header('Location: ../form_permintaan.php?tgl_mulai='.$tgl_mulai.'&tgl_selesai='.$tgl_selesai.'');
        }*/
    
        if($query_cek1->rowCount()+$query_cek2->rowCount() > 0){
            header('Location: ../calendar/calendar.php?status=tidak_tersedia');
        }else{
            header('Location: ../calendar/calendar.php?status=tersedia&tgl_mulai='.$tgl_mulai.'&tgl_selesai='.$tgl_selesai.'');
        }
    }
   
?>