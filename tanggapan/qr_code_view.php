<?php
ini_set('display_errors', 1);
error_reporting(~0);
    require_once '../koneksi.php';

    $id = htmlentities($_GET['id']);
    $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
    $query_data->bindParam(':id',$id);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sigendis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <style>
    body{
        background-image: url('../resource/photo/halaman 1.jpg'); /* Add your background image */
        background-size: cover;
        display: flex;
        /* align-items: center; */
        justify-content: center;
        height: 100vh;
    }
    .card{
        background-color: rgba(255, 255, 255, 0.9); /* Adjust the last value for transparency (0 to 1) */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for a lifted effect */
        margin: 20px auto;
        color: gray;
    }
  </style>
  <body>
    <div class="container" style="padding-top: 20px;">
        <div class="card">
            <div class="card-body">
                <h1>Sigendis</h1>
                <h6>Sistem Informasi Gedung Diklat Surabaya</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5>Instansi</h5>
                <h2><?=$data['nama_instansi']?></h2>
                <h5>Nama Kegiatan</h5>
                <h2><?=$data['nama_kegiatan']?></h2>
                <h5>Tanggal</h5>
                <h2><?=date('d-M-Y',strtotime($data['tgl_mulai']))?></h2>
                <h5>Sampai Dengan</h2>
                <h2><?=date('d-M-Y',strtotime($data['tgl_selesai']))?></h2>
                <h5>Kode Unik</h5>
                <h2><?=$data['kode_unik']?></h2>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>