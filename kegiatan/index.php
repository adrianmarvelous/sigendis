<div style="display:flex;justify-content:center">
<div style="
        padding:20px;
        margin:20px;
        border-radius:50px;
        width: 95%;
        background: rgba(255, 255, 255, 0.7); // Make sure this color has an opacity of less than 1
        backdrop-filter: blur(8px); // This be the blur">
<div style="display:flex">
<?php
    $id_array = array(18,20);
    $jumlah = count($id_array);
    for($i=0;$i<$jumlah;$i++){
        $query_kegiatan_web = $db->prepare("SELECT * FROM foto_kegiatan WHERE id = :id");
        $query_kegiatan_web->bindParam(':id',$id_array[$i]);
        $query_kegiatan_web->execute();
        $kegiatan_web = $query_kegiatan_web->fetch(PDO::FETCH_ASSOC);
        $query_foto = $db->prepare("SELECT * FROM lampiran_foto_kegiatan WHERE id_foto_kegiatan = :id");
        $query_foto->bindParam(':id',$id_array[$i]);
        $query_foto->execute();
        $foto = $query_foto->fetch(PDO::FETCH_ASSOC);
        ?>
    <div class="card" style="width: 20rem;margin:20px;border-radius:20px;">
    <img style="border-radius: 20px 20px 0px 0px;" src="../storage/app/public/<?=$foto['file_lampiran']?>" class="card-img-top" alt="...">

    <div class="card-body">
        <h5 class="card-title"><?=$kegiatan_web['judul']?></h5>
        <p class="card-text" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?=$kegiatan_web['narasi']?></p>
    </div>
    <div style="margin:20px">
        <a href="?pages=detail_kegiatan&id=<?=$data['id']?>" class="btn btn-primary">Lihat Detail</a>
    </div>
    </div>
    <?php
    }
?>

<?php 
    $query_data = $db->prepare("SELECT * FROM foto_kegiatan_header");
    $query_data->execute();
    while($data = $query_data->fetch(PDO::FETCH_ASSOC)){
        $query_foto = $db->prepare("SELECT * FROM foto_kegiatan_files WHERE id_header = :id");
        $query_foto->bindParam(':id',$data['id']);
        $query_foto->execute();
        $foto = $query_foto->fetch(PDO::FETCH_ASSOC);
?>
<div class="card" style="width: 20rem;margin:20px;border-radius:20px;">
<img style="border-radius: 20px 20px 0px 0px;" src="user/admin/proses/upload/foto_kegiatan/<?=$foto['foto']?>" class="card-img-top" alt="...">

<div class="card-body">
    <h5 class="card-title"><?=$data['nama_kegiatan']?></h5>
    <p class="card-text" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?=$data['deskripsi']?></p>
</div>
<div style="margin:20px">
    <a href="?pages=detail_kegiatan&id=<?=$data['id']?>" class="btn btn-primary">Lihat Detail</a>
</div>
</div>
<?php }?>
</div>
</div>
</div>