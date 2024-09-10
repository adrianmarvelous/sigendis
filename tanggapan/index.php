
<div style="display:flex;justify-content:center;width:100%;">
    <div style="
            padding:20px;
            margin:20px;
            border-radius:50px;
            width: 95%;
            height: 750px;
            background: rgba(255, 255, 255, 0.7); // Make sure this color has an opacity of less than 1
            backdrop-filter: blur(8px); // This be the blur">
            <div class="table-responsive p-0">
                <table id="tabel" class="table table-hover table-sm table-striped table-bordered">
                    <tr>
                        <td>No</td>
                        <td>Kegiatan</td>
                        <td>Tanggal Mulai</td>
                        <td>Tanggal Selesai</td>
                        <td>Status Approve</td>
                        <td>Aksi</td>
                    </tr>
                    <?php
                        $email = htmlentities($_GET['email']);
                        $i = 1;
                        $query_pemohon = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE email = :email");
                        $query_pemohon->bindParam(':email',$email);
                        $query_pemohon->execute();
                        while($pemohon = $query_pemohon->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$pemohon['nama_kegiatan']?></td>
                        <td><?=date('d-m-Y',strtotime($pemohon['tgl_mulai']))?></td>
                        <td><?=date('d-m-Y',strtotime($pemohon['tgl_selesai']))?></td>
                        <td>
                            <?php
                                if($pemohon['status'] == 1){
                                    echo "Sudah Approve";
                                }else{
                                    echo "Belum Approve";
                                }
                            ?>
                        </td>
                        <td><a class="btn btn-primary" href="?pages=detail_tanggapan&id=<?=$pemohon['id']?>">Detail</a></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
    </div>
</div>