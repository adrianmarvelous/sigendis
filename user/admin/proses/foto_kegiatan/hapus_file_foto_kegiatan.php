<?php 
    include '../../../../koneksi.php';
    include '../../../../session.php';

    $id = htmlentities($_GET['id']);
    $id_foto = htmlentities($_GET['id_foto']);

    $query_foto = $db->prepare("SELECT * FROM foto_kegiatan_files WHERE id = :id");
    $query_foto->bindParam(':id',$id_foto);
    $query_foto->execute();
    $foto = $query_foto->fetch(PDO::FETCH_ASSOC);

    $delete_row = $db->prepare("DELETE FROM foto_kegiatan_files WHERE id = :id");
    $delete_row->bindParam(':id',$id_foto);
    $delete_row->execute();

    $directory_delete = '../upload/foto_kegiatan/'.$foto['foto'].'';
    unlink($directory_delete);

    header('Location: ../../index.php?pages=edit_foto_kegiatan&id='.$id.'');
    
?>