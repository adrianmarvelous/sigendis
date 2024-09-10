<?php 
    require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
<link href='fullcalendar/lib/main.css' rel='stylesheet' />
<script src='fullcalendar/lib/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: '<?=date('Y-m-d')?>',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      events: [
        <?php
            $query_data = $db->prepare("SELECT * FROM booking_header WHERE status = 1");
            $query_data->execute();
            while($data = $query_data->fetch(PDO::FETCH_ASSOC)){
                $day_plus1 = date('Y-m-d',strtotime($data['tgl_selesai'].'+1 day'));
        ?>
        {
          start: '<?=$data['tgl_mulai']?>',
          end: '<?=$day_plus1?>',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        }
        <?php } ?>
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
</head>
<body>
<button style="margin-left:110px;margin-bottom: 20px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Cek Tanggal
</button>
<form method="GET" action="proses/cek_tanggal.php">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cek Tanggal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tanggal Mulai :</p>
        <input type="date" class="form-control" name="tgl_mulai">
        <p>Tanggal Selesai :</p>
        <input type="date" class="form-control" name="tgl_selesai">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cek</button>
      </div>
    </div>
  </div>
</div>
</form>
  <div id='calendar'></div>

</body>
</html>
