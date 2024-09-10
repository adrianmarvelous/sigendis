<?php 
    require_once '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
  
<link href='../fullcalendar/lib/main.css' rel='stylesheet' />
<script src='../fullcalendar/lib/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {   
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth'
      },
      initialDate: '<?=date('Y-m-d')?>',
      navLinks: false, // can click day/week names to navigate views
      businessHours: false, // display business hours
      editable: false,
      selectable: false,
      events: [
        <?php
            $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE status = 1");
            $query_data->execute();
            while($data = $query_data->fetch(PDO::FETCH_ASSOC)){
                $day_plus1 = date('Y-m-d',strtotime($data['tgl_selesai'].'+1 day'));
        ?>
        {
          start: '<?=$data['tgl_mulai']?>',
          end: '<?=$day_plus1?>',
          overlap: false,
          display: 'background',
          color: 'red'
        },
        <?php } ?>
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
    background-image: url("../resource/photo/home 3.jpeg");
    background-repeat: no-repeat;
    background-size:cover;
    background-attachment:fixed;
  }

  #calendar {
    width: 700px;
  }
  .cover{
    height:1000px;
    width:100%;
      left: 0px;
      top: 0px;
    display:flex;
    justify-content:center;
    background-color: rgba(255, 255, 255, .7);
  }
  .bg{
    margin-top:50px;
    border-radius:20px;
    background-color: rgba(255, 255, 255, .9);
    height:90%;
    width: 90%;
  }
  .cal{
    display:flex;
    padding:20px;
  }

  @media only screen and (max-width: 1000px) {
    .cal{
      flex-direction: column;
      width:100%;
    }
    #calendar{
      width:100%;
    }
  }
</style>

<?php 
  if(htmlentities(isset($_GET['status']))){?>
  <script type="text/javascript">
      $(window).on('load', function() {
          $('#exampleModal').modal('show');
      });
  </script>
  <?php }?>
</head>
<body style="margin: 0;">
<nav class="navbar navbar-expand-lg" style="
    background: rgba(255, 255, 255, 0.9); // Make sure this color has an opacity of less than 1
    backdrop-filter: blur(8px); // This be the blur">
<div class="logo">
    <img src="../resource/logo/logo-bkpsdm.png" alt="" width="400">
</div>
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <div class="d-flex" style="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-3">
                <li class="nav-item" style="font-size:24px;margin:20px;font-family: 'Anton', sans-serif;">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item" style="font-size:24px;margin:20px;font-family: 'Anton', sans-serif;">
                    <a class="nav-link" href="">Booking<span class="sr-only"></span></a>
                </li>
                <li class="nav-item" style="font-size:24px;margin:20px;font-family: 'Anton', sans-serif;">
                    <a class="nav-link" href="../index.php?pages=index_kegiatan">Kegiatan<span class="sr-only"></span></a>
                </li>
                <li class="nav-item" style="font-size:24px;margin:20px;font-family: 'Anton', sans-serif;">
                    <a class="nav-link" href="../login/login_page.php">Login<span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</nav>
<div class="cover">
<div class="bg">
    <?php
      if(htmlentities(isset($_GET['id']))){
        $id = htmlentities($_GET['id']);
        $query_pemohon = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
        $query_pemohon->bindParam(':id',$id);
        $query_pemohon->execute();
        $pemohon = $query_pemohon->fetch(PDO::FETCH_ASSOC);
        ?>
        <div style="border:2px solid;display:flex;padding:20px;text-align:center;color:green;margin:20px;border-radius:10px;">
        <p><?php echo $pemohon['nama_instansi']." Berhasil mangajukan permohonan pada tanggal ".date('d-m-Y',strtotime($pemohon['tgl_mulai']))." sampai dengan ".date('d-m-Y',strtotime($pemohon['tgl_selesai'])).". Mohon menunggu tanggapan dari BKPSDM";?></p>
        
        </div>
        <?php
      }
    ?>
<div class="cal" style="">
  <div style="display:flex;justify-content:center;width:40%;">
    <form method="GET" action="../proses/cek_tanggal.php">
      <div style="width: 300px;border:">
        <p>Tanggal Mulai :</p>
        <input type="date" class="form-control" name="tgl_mulai" required>
        <p style="margin-top: 20px;">Tanggal Selesai :</p>
        <input type="date" class="form-control" name="tgl_selesai" required>
        <button style="margin-top: 20px;margin-bottom: 20px" class="btn btn-primary">Cek Tanggal</button>
      </div>
    </form>
  </div>
  <div id='calendar'>
  </div>
</div>

  <?php 
  if(htmlentities(isset($_GET['status']))){
    $status = htmlentities($_GET['status']);?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hasil Cek</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          if($status == 'tidak_tersedia'){
        ?>
        Tanggal Tidak Tersedia
        <?php }elseif($status == 'tgl_terbalik'){?>
          Tanggal mulai tidak boleh lebih dari tanggal selesai.
        <?php }elseif($status == 'tersedia'){
          $tgl_mulai = htmlentities($_GET['tgl_mulai']);
          $tgl_selesai = htmlentities($_GET['tgl_selesai']);
          ?>
        Jadwal Tersedia Untuk Tanggal <?php echo date('d-m-Y',strtotime($tgl_mulai))?> Sampai Dengan Tanggal <?php echo date('d-m-Y',strtotime($tgl_selesai))?>
        <?php }?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php if($status == 'tersedia'){?>
          <a class="btn btn-primary" href="form_permintaan.php?tgl_mulai=<?=$tgl_mulai?>&tgl_selesai=<?=$tgl_selesai?>">Ajukan Permohonan</a>  
        <?php }?>
      </div>
    </div>
  </div>
</div>
    <?php }?>
    </div></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>