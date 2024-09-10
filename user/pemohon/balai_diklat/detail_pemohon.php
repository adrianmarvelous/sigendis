<?php 
    $id = htmlentities($_GET['id']);

    $query_pemohon = $db->prepare("SELECT * FROM booking_header WHERE id = :id");
    $query_pemohon->bindParam(':id',$id);
    $query_pemohon->execute();
    $pemohon = $query_pemohon->fetch(PDO::FETCH_ASSOC);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Pemohon Balai Diklat
                <?php 
                    if($pemohon['status'] == 0){
                ?>
                <span style="font-size: 24px;border: 1px solid;padding:5px;border-radius:10px;background-color:#007BFF;color:white;">Belum di approve</span>
                <?php }else{?>
                <span style="font-size: 24px;border: 1px solid;padding:5px;border-radius:10px;background-color:#FF650D;color:white;">Sudah di approve</span>
                <?php }?>
            </h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 200px;">Nama Pemohon</td>
                            <td style="width: 20px;">:</td>
                            <td><?php echo $pemohon['nama']?></td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Nama Instansi</td>
                            <td style="width: 20px;">:</td>
                            <td><?php echo $pemohon['nama_instansi']?></td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Nama Kegiatan</td>
                            <td style="width: 20px;">:</td>
                            <td><?php echo $pemohon['nama_kegiatan']?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td><?php echo $pemohon['email']?></td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td>:</td>
                            <td><?php echo $pemohon['telp']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo date('d-m-Y',strtotime($pemohon['tgl_mulai']))." Sampai ".date('d-m-Y',strtotime($pemohon['tgl_selesai']))?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Peserta</td>
                            <td>:</td>
                            <td>Laki-laki <?php echo $pemohon['peserta_pria']?> orang dan Perempuan <?php echo $pemohon['peserta_wanita']?></td>
                        </tr>
                        <tr>
                            <td>Surat Permohonan</td>
                            <td>:</td>
                            <td><a class="btn btn-primary" href="../../proses/upload/surat_permohonan/<?=$pemohon['surat_permohonan']?>" target="_blank">View</a></td>
                        </tr>
                        <?php 
                            if($pemohon['status'] == 1){
                        ?>
                        <tr>
                            <td>Surat Persetujuan</td>
                            <td>:</td>
                            <td><a class="btn btn-primary" href="../surat_persetujuan/surat_persetujuan.php?id=<?=$pemohon['id']?>" target="_blank">View</a></td>
                        </tr>
                        <?php }?>
                    </table>
                    <a class="btn btn-warning" href="../../calendar/calendar.php" target="_blank">Cek Kalender</a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Apakah anda ingin menyetujui surat permohonan ini?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="GET" action="proses/balai_diklat/approve_permohonan.php">
                                <div class="modal-body">
                                    <p>Masukan Nomer Surat Persetujuan</p>
                                    <input class="form-control" type="text" name="no_srt_persetujuan" required>
                                    <input type="hidden" name="id" value="<?=$id?>">
                                </div>
                                <div class="modal-footer">

                                    <!--<form method="GET" action="transaksi/approve.php">-->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="sumbit" class="btn btn-primary">Approve</button>
                                    <!--<a class="btn btn-primary" href="proses/balai_diklat/approve_permohonan.php?id=<?=$pemohon['id']?>">Approve</a>-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>