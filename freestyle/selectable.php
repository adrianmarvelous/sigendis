<?php 
  require_once 'koneksi.php';
  $query_acara = $db->prepare("SELECT * FROM booking_header");
  $query_acara->execute();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar/lib/main.css' rel='stylesheet' />
<script src='fullcalendar/lib/main.js'></script>
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
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialDate: '2022-11-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        <?php
          while($acara = $query_acara->fetch(PDO::FETCH_ASSOC)){
            $day = date('Y-m-d', strtotime($acara['tgl_selesai'].'+1 day'));
        ?>
        {
          title: '<?=$acara['nama'];?>',
          start: '<?=$acara['tgl_mulai'];?>',
          end: '<?=$day;?>'
        },
        <?php } ?>
      ]
    });

    calendar.render();
  });

</script>

  <div id='calendar'></div>

</body>
</html>
