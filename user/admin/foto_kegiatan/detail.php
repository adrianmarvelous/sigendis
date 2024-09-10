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
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 200px;">Nama Kegiatan</td>
                            <td style="width: 20px;">:</td>
                            <td><?php echo $detail['nama_kegiatan']?></td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td>:</td>
                            <td><?php echo $detail['nama_instansi']?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?php echo $detail['deskripsi']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo date("d-m-Y",strtotime($detail['tanggal']))?></td>
                        </tr>
                    </table>
                    <div>
                        <?php 
                            $query_foto = $db->prepare("SELECT * FROM foto_kegiatan_files WHERE id_header = :id_header");
                            $query_foto->bindParam(':id_header',$detail['id']);
                            $query_foto->execute();
                            while($foto = $query_foto->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <img style="width: 40%;" src="proses/upload/foto_kegiatan/<?=$foto['foto']?>">
                        <?php }?>
                    </div>
                    <br>
                    <a class="btn btn-primary" href="?pages=edit_foto_kegiatan&id=<?=$id?>">Edit</a>