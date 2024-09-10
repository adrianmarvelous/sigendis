<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gedung Diklat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
  </head>
  <!--<style>
    .bc-kanan{
        
    }
  </style>-->
  <style>
    .backcover{
        padding:20px;
        border-radius:50px;
        width: 100%;
        background: rgba(255, 255, 255, 0.7); // Make sure this color has an opacity of less than 1
        backdrop-filter: blur(8px); // This be the blur
        }
    .title{
        font-size:1000%;
        font-family: 'Josefin Sans', sans-serif;
    }
    .bc-kiri{
    }
    .button_booking{
        height:100px;
        width:250px;
        border-radius:40px 10px 40px 10px;
        font-size:40px;
        background-color:#252526;
        color:white;
        font-family: 'Josefin Sans', sans-serif;
    }
    .desc{
        margin-top: -50px;
        font-size:32px;
        font-family: 'Josefin Sans', sans-serif;
    }
    @media only screen and (max-width: 850px) {
        .title{
            font-size:100px;
        }
        .backcover{
            flex-direction: column-reverse;
        }
        .desc{
            font-size: 20px;
        }
    }
  </style>
  <body>
    <div style="display:flex;justify-content:center;padding:20px;">

        <div class="backcover" style="display:flex;">
            <div class="bc-kiri">
                <p class="title" style="">Gedung Diklat</p>
                <p class="desc" >Badan Kepegawaian dan Diklat Sumber Daya Manusia Pemerintah Kota Surabaya</p>
                <form method="GET" action="calendar/calendar.php">
                    <button class="button_booking">Booking</button>
                </form>
            </div>
            <div class="bc-kanan" style=border:1px solid;">
                <div style="display:flex;justify-content:center;flex-direction:column;height:100%;">
                    <img style="width:100%;border-radius:50px;" src="resource/photo/kegiatan 1.jpeg" alt="">
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>