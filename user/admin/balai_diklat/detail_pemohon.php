<?php
    $id = htmlentities($_GET['id']);
    $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
    $query_data->bindParam(':id',$id);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pb-0">
            <h3 style="text-transform: capitalize"></h3>
            </div>
            <div class="card-body">
                <div class="tab-pane show active" id="horizontal-form-preview">
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <p><?=$data['nama']?></p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Instansi</label>
                        <div class="col-md-9">
                            <p><?=$data['nama_instansi']?></p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-md-9">
                            <p><?=$data['nama_kegiatan']?></p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-9">
                            <p><?=$data['email']?></p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">No Telp</label>
                        <div class="col-md-9">
                            <p><?=$data['telp']?></p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Peserta Pria</label>
                        <div class="col-md-9">
                            <p><?=$data['peserta_pria']?> Orang</p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Peserta Wanita</label>
                        <div class="col-md-9">
                            <p><?=$data['peserta_wanita']?> Orang</p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Tanggal</label>
                        <div class="col-md-9">
                            <p><?=date("d-M-Y",strtotime($data['tgl_mulai']))?> sampai <?=date("d-M-Y",strtotime($data['tgl_selesai']))?></p>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Surat Permohonan</label>
                        <div class="col-md-9">
                            <a class="btn bg-gradient-primary" href="../../proses/upload/surat_permohonan/<?=$data['surat_permohonan']?>" target="_blank">View</a>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Surat Pernyataan</label>
                        <div class="col-md-9">
                            <a class="btn bg-gradient-primary" href="../../proses/upload/surat_pernyataan/<?=$data['surat_pernyataan']?>" target="_blank">View</a>
                        </div>
                    </div>
                    <?php
                        if($data['status'] == 1){
                    ?>
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Surat Persetujuan</label>
                        <div class="col-md-9">
                            <a class="btn bg-gradient-primary" href="../surat_persetujuan/surat_persetujuan.php?id=<?=$data['id']?>">View</a>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Surat Permohonan Ijin</label>
                        <div class="col-md-9">
                            <a class="btn bg-gradient-primary" href="../surat_persetujuan/surat_ijin.php?id=<?=$data['id']?>">View</a>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Kode Unik</label>
                        <div class="col-md-9">
                            <p><?=$data['kode_unik']?></p>
                            <!-- <?php
                                // $uniqueCode = uniqid();
                                // echo substr($uniqueCode, -5);
                            ?> -->
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div>
                    <?php
                        if($data['status'] == 0){
                    ?>
                    <div style="display:flex;justify-content:flex-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Approve
                        </button>
                        <!-- <a class="btn bg-gradient-success" href="/artikel_client/list_artikel/edit/{{$item->id}}">Approve</a> -->
                        <div style="width: 20px"></div>
                        <a class="btn bg-gradient-danger" href="proses/balai_diklat/tolak_permohonan.php?id=<?=$id?>">Tolak</a>
                    </div>
                    <?php }?>
                </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menyetujui surat permohonan ini?</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="proses/balai_diklat/approve_permohonan.php">
                    <div class="modal-body">
                        <p>Masukan Nomer Surat Persetujuan</p>
                        <input class="form-control" type="text" name="no_srt_persetujuan" required>
                        <p>Masukan Nomer Surat Permohonan Ijin</p>
                        <input class="form-control" type="text" name="no_srt_ijin" required>
                        <input type="hidden" name="id" value="<?=$id?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
                
            </div>  <!-- end card-body -->
        </div>  <!-- end card -->
    </div>  <!-- end col -->

</div>
<!-- end row -->