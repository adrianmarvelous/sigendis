<?php
    $id = htmlentities($_GET['id']);

    $query_kegiatan = $db->prepare("SELECT * FROM foto_kegiatan_header WHERE id = :id");
    $query_kegiatan->bindParam(':id',$id);
    $query_kegiatan->execute();
    $data = $query_kegiatan->fetch(PDO::FETCH_ASSOC);
?>
<div style="display:flex;justify-content:center;width:100%;">
    <div style="
            padding:20px;
            margin:20px;
            border-radius:50px;
            width: 95%;
            background: rgba(255, 255, 255, 0.7); // Make sure this color has an opacity of less than 1
            backdrop-filter: blur(8px); // This be the blur">
                <p style="text-align:center;font-size:40px;font-weight:bold"><?=$data['nama_kegiatan']?></p>
                <p style="text-indent:100px"><?=$data['deskripsi']?></p>
                <div style="display:flex;flex-wrap:wrap;justify-content:center">
                <?php
                    $query_lampiran = $db->prepare("SELECT * FROM foto_kegiatan_files WHERE id_header = :id");
                    $query_lampiran->bindParam(':id',$id);
                    $query_lampiran->execute();
                    while($lampiran = $query_lampiran->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <img style="max-width: 500px; margin:20px" src="user/admin/proses/upload/foto_kegiatan/<?=$lampiran['foto']?>" alt="">
                <?php }?>
                </div>
    </div>
</div>