<?php 
    require_once '../../../../koneksi.php';
    require_once '../../../../session.php';

    $id = htmlentities($_POST['id']);
    $username = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $konfirmasi_password = htmlentities($_POST['konfirmasi_password']);

    $query_data = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query_data->bindParam(':username',$username);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
    
    if($query_data->rowCount() > 0){
        echo "<script>alert('Username Telah Terdaftar');window.location='../../index.php?pages=detail_pemohon&id=$id'</script>";
    }else{
        
        if($password != $konfirmasi_password){
            echo "<script>alert('password dan konfirmasi password tidak sama');window.location='../../index.php?pages=detail_pemohon&id=$id'</script>";
        }else{
            $hash_password = password_hash($password, PASSWORD_BCRYPT);

            $insert = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username,:password,'pemohon')");
            $insert->bindParam(':username',$username);
            $insert->bindParam(':password',$hash_password);
            $insert->execute();

            header('Location: ../../index.php?pages=detail_pemohon&id='.$id.'');
        }
    }
?>