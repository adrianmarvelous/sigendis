<?php 
    $username = htmlentities($_SESSION['username']);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Permohonan Balai Diklat</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        
            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Kegiatan</td>
                        <td>Tanggal Mulai</td>
                        <td>Tanggal Selesai</td>
                        <td>Tanggal Approve</td>
                        <td>Aksi</td>
                    </tr>
                    <?php 
                        $i = 1;
                        $query_kegiatan = $db->prepare("SELECT booking_header.* FROM booking_header JOIN user_gedung_diklat ON booking_header.email = user_gedung_diklat.username WHERE user_gedung_diklat.username = :username AND status = 1");
                        $query_kegiatan->bindParam(':username',$username);
                        $query_kegiatan->execute();
                        while($kegiatan = $query_kegiatan->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $kegiatan['nama_kegiatan']?></td>
                        <td><?php echo date("d-m-Y",strtotime($kegiatan['tgl_mulai']))?></td>
                        <td><?php echo date("d-m-Y",strtotime($kegiatan['tgl_selesai']))?></td>
                        <td><?php echo date("d-m-Y",strtotime($kegiatan['tgl_srt_permohonan']))?></td>
                        <td><a class="btn btn-primary" href="?pages=detail_permohonan&id=<?=$kegiatan['id']?>" target="_blank">Detail</a></td>
                    </tr>
                    <?php }?>
                </thead>
            </table>
                    </div>
                </div>
            </div>