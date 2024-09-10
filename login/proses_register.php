<?php 
    require_once '../freestyle/koneksi.php';

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $konfirmasi_password = htmlentities($_POST['konfirmasi_password']);

    $check_username = $db->prepare("SELECT username FROM users WHERE username = :username");
    $check_username->bindParam(':username',$username);
    $check_username->execute();

    if($check_username->rowCount() > 0){
        echo "<script>alert('username telah terdaftar');window.location='register.php'</script>";
    }else{
        if($password != $konfirmasi_password){
            echo "<script>alert('password dan konfirmasi password tidak sama');window.location='register.php'</script>";
        }else{
            $hash_password = password_hash($password, PASSWORD_BCRYPT);

            $insert = $db->prepare("INSERT INTO users (username, password) VALUES (:username,:password)");
            $insert->bindParam(':username',$username);
            $insert->bindParam(':password',$hash_password);
            $insert->execute();

            header('Location: login_page.php');
        }
    }

?>