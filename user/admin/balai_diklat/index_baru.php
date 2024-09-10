
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
                <div style="display: flex;justify-content:space-between">
                        <h3>Pemohon Gedung Diklat</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Print Rekap
                        </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Print Rekap Peminjaman Gedung Diklat</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="accordion-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 mx-auto">
                                            <div class="accordion" id="accordionRental">
                                                <div class="accordion-item mb-3">
                                                    <h5 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Per Bulan
                                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="false"></i>
                                                    </button>
                                                    </h5>
                                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                                                    <div class="accordion-body text-sm opacity-8">
                                                        <div class="dropdown">
                                                            <form method="GET" action="../../print/rekap_peminjaman_gedung.php">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Bulan</label>
                                                                <?php include '../bulan_dropdown.php'?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Tahun</label>
                                                                <select name="tahun" class="form-control" id="exampleFormControlSelect1">
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Jenis</label>
                                                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                                                    <option value="all">Semua</option>
                                                                    <option value="1">Sudah Approve</option>
                                                                    <option value="0">Belum Approve</option>
                                                                </select>
                                                                <br>
                                                                <button type="submit" class="btn bg-gradient-primary">Print</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item mb-3">
                                                    <h5 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Per Tahun
                                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                    </button>
                                                    </h5>
                                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                                    <div class="accordion-body text-sm opacity-8">
                                                        <div class="form-group">
                                                            <form method="GET" action="../../print/rekap_peminjaman_gedung.php">
                                                            <label for="exampleFormControlSelect1">Tahun</label>
                                                            <select name="tahun" class="form-control" id="exampleFormControlSelect1">
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                            </select>
                                                            <label for="exampleFormControlSelect1">Jenis</label>
                                                            <select class="form-control" name="status">
                                                                <option value="all">Semua</option>
                                                                <option value="1">Sudah Approve</option>
                                                                <option value="0">Belum Approve</option>
                                                            </select>
                                                            <br>
                                                        <button type="submit" class="btn bg-gradient-primary">Print</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Instansi</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                                $i=1;
                                $query_data = $db->prepare("SELECT * FROM booking_header ORDER BY tgl_mulai DESC");
                                $query_data->execute();
                                while($data = $query_data->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['nama_instansi']?></td>
                                <td><?=date("d-M-Y",strtotime($data['tgl_mulai']))?></td>
                                <td><?=date("d-M-Y",strtotime($data['tgl_selesai']))?></td>
                                <td>
                                    <?php
                                        if($data['status'] == 1){
                                            echo "<p style='color:green'>Sudah Approve</p>";
                                        }elseif($data['status'] == -1){
                                            echo "<p style='color:red'>Tidak Approve</p>";
                                        }elseif($data['status'] == 0){
                                            echo "<p style='color:blue'>Pending</p>";
                                        }
                                    ?>
                                </td>
                                <td><a class="btn bg-gradient-primary" href="?pages=pemohon_baru_detail_pemohon&id=<?=$data['id']?>">Detail</a></td>
                            </tr>
                            <?php }?>
                            <tbody>
                            </tbody>
                        </table>
                        
                    <!-- Add Bootstrap Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        </ul>
                    </nav>
                    </div>
                </div> <!-- end tab-content-->

            </div>  <!-- end card-body -->
        </div>  <!-- end card -->
    </div>  <!-- end col -->

</div>
<!-- end row -->
