<?php 
    $id = htmlentities($_GET['id']);

    $query_detail = $db->prepare("SELECT * FROM foto_kegiatan_header WHERE id = :id");
    $query_detail->bindParam(':id',$id);
    $query_detail->execute();
    $detail = $query_detail->fetch(PDO::FETCH_ASSOC);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Detail Kegiatan</h1>
            <div class="card mb-4">
                <div class="card-body">
                <div class="table-responsive">
                    <form action="proses/foto_kegiatan/update_data.php" method="POST" enctype="multipart/form-data">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 200px;">Nama Kegiatan</td>
                            <td style="width: 20px;">:</td>
                            <td><input class="form-control" type="text" name="nama_kegiatan" value="<?=$detail['nama_kegiatan']?>"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Nama Instansi</td>
                            <td style="width: 20px;">:</td>
                            <td><input class="form-control" type="text" name="nama_instansi" value="<?=$detail['nama_instansi']?>"></td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Deskripsi</td>
                            <td style="width: 20px;">:</td>
                            <td><textarea class="form-control" name="deskripsi" name="deskripsi" id="" cols="30" rows="10"><?php echo $detail['deskripsi']?></textarea></td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Tanggal</td>
                            <td style="width: 20px;">:</td>
                            <td><input class="form-control" type="date" name="tanggal" value="<?=$detail['tanggal']?>"></td>
                        </tr>
                        <?php 
                        $i = 1;
                            $query_foto = $db->prepare("SELECT * FROM foto_kegiatan_files WHERE id_header = :id");
                            $query_foto->bindParam(':id',$id);
                            $query_foto->execute();
                            while($foto = $query_foto->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td>:</td>
                            <td>
                                <img style="width: 80%;" src="proses/upload/foto_kegiatan/<?=$foto['foto']?>">
                                <a class="btn btn-danger" href="proses/foto_kegiatan/hapus_file_foto_kegiatan.php?id=<?=$id?>&id_foto=<?=$foto['id']?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>Upload Foto</td>
                            <td>:</td>
                            <td><input class="form-control" type="file" name="foto_kegiatan[]" accept="image/*" multiple></td>
                        </tr>
                    </table>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>