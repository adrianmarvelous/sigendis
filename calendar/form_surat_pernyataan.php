<?php 
    ini_set('display_errors', 1);
    error_reporting(~0);
    $id = htmlentities($_GET['id']);
    include '../koneksi.php';

    $query_peminjaman = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
    $query_peminjaman->bindParam(':id',$id);
    $query_peminjaman->execute();
    $data = $query_peminjaman->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
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
<h1 style="text-align: center;">Form Surat Pernyataan</h1>
<form method="POST" action="../proses/upload_surat_pernyataan.php" enctype="multipart/form-data">
    <div style="padding: 20px;">
        <table class="table table-striped" style="padding: 100px">
            <tr>
                <td style="width: 170px;">Download Surat Pernyataan</td>
                <td style="width: 20px;">:</td>
                <td><a href="../print/surat_pernyataan.php?id=<?=$id?>" class="btn btn-primary" target="_blank">Surat Pernyataan <i class="fas fa-download"></i></a></td>
            </tr>
            <tr>
                <td style="width: 170px;">Upload Surat Pernyataan PDF</td>
                <td style="width: 20px;">:</td>
                <td><input class="form-control" type="file" required name="surat_pernyataan" accept="application/pdf"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?=$id?>">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>