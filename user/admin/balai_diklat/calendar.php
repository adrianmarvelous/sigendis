<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
<link href='../../fullcalendar/lib/main.css' rel='stylesheet' />
<script src='../../fullcalendar/lib/main.js'></script>
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
      navLinks: true, // can click day/week names to navigate views
      businessHours: false, // display business hours
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
        },
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

<div style="width: 700px;" id='calendar'></div>