<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-color: #F27B58;">
    <div style="display:flex;justify-content:center">
        <div style="display:flex; width: 1200px; height: 500px; margin-top:60px; background-color:white;border-radius:50px">
            <div style="padding: 100px">
            <form method="POST" action="proses_register.php">
                <h1>Register</h1>
                <p>Username</p>
                <input class="form-control" type="text" name="username">
                <p>Password</p>
                <input class="form-control" type="password" name="password">
                <p>Konfirmasi Password</p>
                <input class="form-control" type="password" name="konfirmasi_password">
                <br>
                <button style="width: 100%;" type="submit" class="btn btn-primary">Daftar</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>