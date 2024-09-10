<?php
    require_once '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
    body{
        background-image:linear-gradient(45deg,#FFAE00,#F9E866);
        background-attachment: fixed
    }
    .div1{
        display:flex;
        justify-content:center;
    }
    .div2{
        display:flex;
        width: 80%;
        height: 700px;
        margin-top:60px;
        background-color:white;
        border-radius:50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        justify-content:space-between;
    }
    img{
        height: 100%;
        border-radius: 0px 50px 50px 0px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
  @media only screen and (max-width: 1500px) {
    img{
        width:100%;
    }
  }
  @media only screen and (max-width: 1000px) {
    .gambar{
        display:none;
    }
  }
</style> 
<body>
    <div class="div1">
        <div class="div2">
            <div style="padding: 40px;">
            <form method="POST" action="login-proses.php">
                <p style="font-size: 30px;font-weight:bold">Balai Diklat Pemerintah Kota Surabaya</p>
                <!--<p style="font-size: 24px;font-weight:bold">Login</p>-->
                <p><?=show_alert();?></p>
                <p>Username</p>
                <input class="form-control" type="text" name="username" required>
                <br>
                <p>Password</p>
                <input class="form-control" type="password" name="password" required>
                <br>
                <button style="width: 100%;" type="submit" name="submit" class="btn btn-warning">Login</button>
            </form>
            </div>
            <div class="gambar">
                <img src="../resource/photo/home 3.jpeg" style="">
            </div>
        </div>
    </div>
</body>
</html>