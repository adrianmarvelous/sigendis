<div style="display:flex;justify-content:center;width:100%;height:100%">
    <div style="
            padding:20px;
            margin:20px;
            border-radius:50px;
            width: 95%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7); // Make sure this color has an opacity of less than 1
            backdrop-filter: blur(8px); // This be the blur">
            <div style="display:flex;padding:20px;flex-direction:column">
            <?php
                $id = htmlentities($_GET['id']);
                $query_pemohon = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
                $query_pemohon->bindParam(':id',$id);
                $query_pemohon->execute();
                $pemohon = $query_pemohon->fetch(PDO::FETCH_ASSOC);
            ?>
                <div style="display:flex;margin-bottom:20px;">
                    <?php 
                        if($pemohon['status'] == 0){
                    ?>
                        <button class="btn btn-danger">Belum Approve</button>
                    <?php }else{?>
                        <button class="btn btn-success">Sudah Approve</button>
                    <?php }?>
                </div>
                <div class="table-responsive p-0">
                    <table id="tabel" class="table table-hover table-sm table-striped table-bordered">
                        <tr>
                            <td style="width:200px">Nama</td>
                            <td style="width:20px">:</td>
                            <td><?=$pemohon['nama']?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td><?=$pemohon['email']?></td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td>:</td>
                            <td><?=$pemohon['telp']?></td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td>:</td>
                            <td><?=$pemohon['nama_instansi']?></td>
                        </tr>
                        <tr>
                            <td>Nama Kegiatan</td>
                            <td>:</td>
                            <td><?=$pemohon['nama_kegiatan']?></td>
                        </tr>
                        <tr>
                            <td>Peserta Pria</td>
                            <td>:</td>
                            <td><?=$pemohon['peserta_pria']?> Orang</td>
                        </tr>
                        <tr>
                            <td>Peserta Wanita</td>
                            <td>:</td>
                            <td><?=$pemohon['peserta_wanita']?> Orang</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?=date('d-m-Y',strtotime($pemohon['tgl_mulai']))?> Sampai <?=date('d-m-Y',strtotime($pemohon['tgl_selesai']))?></td>
                        </tr>
                        <tr>
                            <td>No Surat Pemohon</td>
                            <td>:</td>
                            <td><?=$pemohon['no_srt_permohonan']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat Pemohon</td>
                            <td>:</td>
                            <td><?=$pemohon['tgl_srt_permohonan']?></td>
                        </tr>
                        <tr>
                            <td>Perihal Surat Pemohon</td>
                            <td>:</td>
                            <td><?=$pemohon['perihal_srt_permohonan']?></td>
                        </tr>
                        <tr>
                            <td>Surat Permohonan</td>
                            <td>:</td>
                            <td><a class="btn btn-primary" href="proses/upload/surat_permohonan/<?=$pemohon['surat_permohonan']?>" target="_blank">View</a></td>
                        </tr>
                        <tr>
                            <td>Surat Pernyataan</td>
                            <td>:</td>
                            <td><a class="btn btn-primary" href="proses/upload/surat_pernyataan/<?=$pemohon['surat_pernyataan']?>" target="_blank">View</a></td>
                        </tr>
                        <?php
                            if($pemohon['status'] == 1){
                        ?>
                        <tr>
                            <td>Surat Persetujuan</td>
                            <td>:</td>
                            <td><a class="btn btn-primary" href="user/surat_persetujuan/surat_persetujuan_2024.php?id=<?=$id?>" target="_blank">View</a></td>
                        </tr>
                        <?php }?>
                    </table>
                        <?php
                            if($pemohon['status'] == 1){
                        ?>
                        <div style="height: 300px;display:flex;align-items:center;padding:20px;flex-direction:column">
                            <div>
                                <?php
                                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    require_once('../sekretariat/assets/plugin/phpqrcode/qrlib.php');

                                    $link = 'bkpsdm.surabaya.go.id/sigendis/tanggapan/qr_code_view.php?id='.$id;
                                    // $id = $header['id'];
                                    $tempdir = "qr_code/"; //Nama folder tempat menyimpan file qrcode
                                    if (!file_exists($tempdir)) //Buat folder bername temp
                                    mkdir($tempdir);

                                    QRcode::png($link, $tempdir.$id.'.png', QR_ECLEVEL_Q);
                                    //echo '<h2>QRCode</h2>';
                                    //menampilkan file qrcode 
                                    echo '<img src="'.$tempdir.$id.'.png" style="width:150px" />';
                                ?>
                            </div>
                            <br>
                            <div style="background-color: white;padding:10px 10px 0px 10px;border-radius:5px">
                                <p><?=$pemohon['kode_unik']?></p>
                            </div>
                        </div>
                        <?php }?>
                </div>
            </div>
    </div>
</div>