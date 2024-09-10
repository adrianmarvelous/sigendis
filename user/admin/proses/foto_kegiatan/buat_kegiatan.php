<?php 
    include '../../../../koneksi.php';
    include '../../../../session.php';

    $nama_kegiatan = htmlentities($_POST['nama_kegiatan']);
    $nama_instansi = htmlentities($_POST['nama_instansi']);
    $deskripsi = htmlentities($_POST['deskripsi']);
    $tanggal = htmlentities($_POST['tanggal']);

    
    $query_last_id = $db->prepare("SELECT max(id) as max_id FROM foto_kegiatan_header");
    $query_last_id->execute();
    $_last_id = $query_last_id->fetch(PDO::FETCH_ASSOC);
    $last_id = $_last_id['max_id']+1;
    

    $input = $db->prepare("INSERT INTO foto_kegiatan_header (id, nama_kegiatan, nama_instansi, deskripsi, tanggal) VALUES (:id, :nama_kegiatan, :nama_instansi, :deskripsi, :tanggal)");
    $input->bindParam(':id',$last_id);
    $input->bindParam(':nama_kegiatan',$nama_kegiatan);
    $input->bindParam(':nama_instansi',$nama_instansi);
    $input->bindParam(':deskripsi',$deskripsi);
    $input->bindParam(':tanggal',$tanggal);
    $input->execute();

    echo $jumlah = count($_FILES['foto_kegiatan']['name']);

    for($i=0;$i<$jumlah;$i++){
        $file_name[$i] = htmlentities($_FILES['foto_kegiatan']['name'][$i]);
        $file_size[$i] = htmlentities($_FILES['foto_kegiatan']['size'][$i]);
        if(!empty($file_name[$i])){
            if($file_size[$i] > 10000000){
                echo "<script>alert('Ukuran file $nama terlalu besar');history.go(-1);</script>";
            }else{
                $acak = rand(00000000, 99999999);
                $FileExt[$i]       = substr($file_name[$i], strrpos($file_name[$i], '.'));
                $FileExt[$i]       = str_replace('.','',$FileExt[$i]);
                $file_name[$i] = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name[$i]);
                $NewFileName[$i]   = $acak.'_'.$file_name[$i].'.'.$FileExt[$i];
                $directory = '../upload/foto_kegiatan/';

                move_uploaded_file($_FILES['foto_kegiatan']['tmp_name'][$i],$directory.$NewFileName[$i]);
                //return $NewFileName[$i];
                $insert_upload = $db->prepare("INSERT INTO foto_kegiatan_files (id_header, foto) VALUES (:id_header,:foto)");
                $insert_upload->bindParam(':id_header',$last_id);
                $insert_upload->bindParam(':foto',$NewFileName[$i]);
                $insert_upload->execute();
            }
        }
    }


    header('Location: ../../index.php?pages=index_foto_kegiatan');
?>