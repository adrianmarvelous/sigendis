<?php 
    $tgl_mulai = htmlentities($_GET['tgl_mulai']);
    $tgl_selesai = htmlentities($_GET['tgl_selesai']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FADC9B">
    <img src="../resource/logo/logo-bkpsdm.png" alt="" width="400">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a class="form-control mr-sm-2" href="#">Home <span class="sr-only">(current)</span></a>
    </form>
  </div>
</nav>
<h1 style="text-align: center;">Form Permohonan</h1>
<form method="POST" action="../proses/form_permintaan.php" enctype="multipart/form-data">
    <div style="padding: 20px;">
        <table class="table table-striped" style="padding: 100px">
            <tr>
                <td style="width: 150px;">Nama</td>
                <td style="width: 20px;">:</td>
                <td><input name="nama" class="form-control" type="text" required></td>
                <span style="color: red;">* nama akan digunakan untuk mengisi surat pernyataan peminjaman gedung diklat</span>
            </tr>
            <tr>
                <td style="width: 150px;">NIK</td>
                <td style="width: 20px;">:</td>
                <td><input name="nik" class="form-control" type="number" required></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td><input name="email" class="form-control" type="text" required></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td><input name="telp" class="form-control" type="number" required></td>
            </tr>
            <tr>
                <td>Nama Instansi</td>
                <td>:</td>
                <td><input name="nama_instansi" class="form-control" type="text" required></td>
            </tr>
            <tr>
                <td>Nama Kegiatan</td>
                <td>:</td>
                <td><input name="nama_kegiatan" class="form-control" type="text" required></td>
            </tr>
            <tr>
                <td>Jumlah Peserta Laki-laki</td>
                <td>:</td>
                <td><input name="peserta_pria" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td>Jumlah Peserta Perempuan</td>
                <td>:</td>
                <td><input name="peserta_wanita" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td>Tanggal Mulai</td>
                <td>:</td>
                <td><input name="tgl_mulai" class="form-control" type="date" value="<?=$tgl_mulai?>" readonly></td>
            </tr>
            <tr>
                <td>Tanggal Selesai</td>
                <td>:</td>
                <td><input name="tgl_selesai" class="form-control" type="date" value="<?=$tgl_selesai?>" readonly></td>
            </tr>
            <tr>
                <td>Upload Surat Permohonan</td>
                <td>:</td>
                <td><input class="form-control" name="surat_permohonan" type="file" accept="application/pdf" required></td>
            </tr>
            <tr>
                <td>Nomer Surat Permohonan</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="no_srt_permohonan" required></td>
            </tr>
            <tr>
                <td>Tangal Surat Permohonan</td>
                <td>:</td>
                <td><input  class="form-control"  type="date" name="tgl_srt_permohonan" required></td>
            </tr>
            <tr>
                <td>Perihal Surat Permohonan</td>
                <td>:</td>
                <td><input  class="form-control"  type="text" name="perihal_srt_permohonan" required></td>
            </tr>
        </table>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>