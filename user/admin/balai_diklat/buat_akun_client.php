<?php 
    $id = htmlentities($_GET['id']);

    $query_pemohon = $db->prepare("SELECT * FROM booking_header WHERE id = :id");
    $query_pemohon->bindParam(':id',$id);
    $query_pemohon->execute();
    $pemohon = $query_pemohon->fetch(PDO::FETCH_ASSOC);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1>Buat Akun</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses/balai_diklat/buat_akun_client.php">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 200px;">E Mail</td>
                            <td style="width: 20px;">:</td>
                            <td><input class="form-control" name="email" type="text" value="<?=$pemohon['email']?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input class="form-control" name="password" type="password"></td>
                        </tr>
                        <tr>
                            <td>Konfirmasi Password</td>
                            <td>:</td>
                            <td><input class="form-control" name="konfirmasi_password" type="password"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>