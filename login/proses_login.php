<?php 
    require_once '../koneksi.php';
    
    session_start();

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

     $check_username = $db->prepare("SELECT * FROM user_gedung_diklat WHERE username = :username");
     $check_username->bindParam(':username',$username);
     $check_username->execute();
     $hash = $check_username->fetch(PDO::FETCH_ASSOC);

     if($check_username->rowCount() == 0){
        echo "<script>alert('username belum terdaftar');window.location='login_page.php'</script>";
     }else{
        if(password_verify($password,$hash['password'])){
         $_SESSION['role'] = $hash['role'];
         $_SESSION['username'] = $hash['username'];
            if($hash['role'] == "admin"){
               header('Location: ../user/admin/index.php');
            }elseif($hash['role'] == "pemohon"){
               header('Location: ../user/pemohon/index.php');
            }
        }else{
         echo "<script>alert('password salah');window.location='login_page.php'</script>";
        }
     }
?>