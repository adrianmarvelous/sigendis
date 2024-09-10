<?php

    ini_set('display_errors', 1);
    error_reporting(~0);
    require_once '../koneksi.php';

    $id = htmlentities($_POST['id']);
    function re_name($nama){
        $file_name = htmlentities($_FILES[$nama]['name']);
        $file_size = htmlentities($_FILES[$nama]['size']);
        if(!empty($file_name)){
            if($file_size > 10000000){
                echo "<script>alert('Ukuran file $nama terlalu besar');history.go(-1);</script>";
            }else{
                $acak = rand(00000000, 99999999);
                $FileExt       = substr($file_name, strrpos($file_name, '.'));
                $FileExt       = str_replace('.','',$FileExt);
                $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                $NewFileName   = $acak.'_'.$file_name.'.'.$FileExt;
                $directory = 'upload/'.$nama.'/';

                move_uploaded_file($_FILES[$nama]['tmp_name'],$directory.$NewFileName);
                return $NewFileName;
            }
        }
    }

    $nama_surat_pernyataan = re_name("surat_pernyataan");

    $update = $db->prepare("UPDATE sigendis_jadwal_peminjaman SET surat_pernyataan=:surat_pernyataan WHERE id=:id");
    $update->bindParam(':surat_pernyataan',$nama_surat_pernyataan);
    $update->bindParam(':id',$id);
    $update->execute();


    header('Location: ../calendar/calendar.php?id='.$id);
?>