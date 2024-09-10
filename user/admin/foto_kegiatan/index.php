<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Foto Kegiatan</h1>
            <br>
            <a style="margin-bottom: 20px;" class="btn btn-primary" href="?pages=tambah_kegiatan">Tambah Kegiatan +</a>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Kegiata</td>
                        <td>Instansi</td>
                        <td>Tanggal</td>
                        <td>Aksi</td>
                    </tr>
                    <?php 
                        $i = 1;
                        $query_pemohon = $db->prepare("SELECT * FROM foto_kegiatan_header");
                        $query_pemohon->execute();
                        while($pemohon = $query_pemohon->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $pemohon['nama_kegiatan']?></td>
                        <td><?php echo $pemohon['nama_instansi']?></td>
                        <td><?php echo date("d-M-Y",strtotime($pemohon['tanggal']))?></td>
                        <td><a class="btn btn-primary" href="?pages=detail_foto_kegiatan&id=<?=$pemohon['id']?>">Detail</a></td>
                    </tr>
                    <?php }?>
                </thead>
            </table>