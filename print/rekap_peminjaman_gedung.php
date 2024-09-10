<?php 
    error_reporting(0);
    require_once '../koneksi.php';
    require_once('../plugin/phpqrcode/qrlib.php');
    require_once('../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require_once('../plugin/phpqrcode/qrlib.php');

    if(htmlentities(isset($_GET['bulan']))){
        $bulan = htmlentities($_GET['bulan']);
    }

    $status = htmlentities($_GET['status']);
    $tahun = htmlentities($_GET['tahun']);

    if(htmlentities(isset($_GET['bulan']))){
        if($status == "all"){
            $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE month(tgl_mulai) = :bulan AND year(tgl_mulai) = :tahun ORDER BY tgl_mulai ASC");
        }else{
            $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE month(tgl_mulai) = :bulan AND year(tgl_mulai) = :tahun AND status = :status ORDER BY tgl_mulai ASC");
            $query_data->bindParam('status',$status);
        }
        $query_data->bindParam(':bulan',$bulan);
    }else{
        if($status == "all"){
            $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE year(tgl_mulai) = :tahun ORDER BY tgl_mulai ASC");
        }else{
            $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE year(tgl_mulai) = :tahun AND status = :status ORDER BY tgl_mulai ASC");
            $query_data->bindParam('status',$status);
        }
    }
    $query_data->bindParam(':tahun',$tahun);
    $query_data->execute();
    
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Persetujuan</title>

</head>
<style>
table, tr, td {
  border: 1px solid;
    padding: 10px;
}
</style>
<body>
    <div style="text-align:center;font-size:38px;">
        <p>Rekap Peminjaman Gedung Diklat <br>
        <?php
            if(htmlentities(isset($_GET['bulan']))){
        ?>    
        Bulan <?php include '../user/bulan.php'?> 
        <?php }?>Tahun <?=$tahun?>
        </p>
    </div>
<table border="1" width="100%" style="border-collapse: collapse;">
    <tr style="background-color:lightgray">
        <td style="font-weight: bold">No</td>
        <td style="font-weight: bold">Tanggal Mulai</td>
        <td style="font-weight: bold">Tanggal Selesai</td>
        <td style="font-weight: bold">Instansi</td>
        <td style="font-weight: bold">Nama Kegiatan</td>
        <td style="font-weight: bold">Status</td>
    </tr>
    <?php
        $i=1;
        if($query_data->rowCount() > 0){
        while($data = $query_data->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <td style="width: 20px;"><?=$i++?></td>
        <td><?= date('d-m-Y',strtotime($data['tgl_mulai']))?></td>
        <td><?= date('d-m-Y',strtotime($data['tgl_selesai']))?></td>
        <td><?=$data['nama_instansi']?></td>
        <td><?=$data['nama_kegiatan']?></td>
        <td>
            <?php
                if($data['status'] == 1){
                    echo "Sudah Disetujui";
                }elseif($data['status'] == -1){
                    echo "Tidak Disetujui";
                }elseif($data['status'] == 0){
                    echo "Pending";
                }
            ?>
        </td>
    </tr>
    <?php }}else{?>
    <tr>
        <td colspan="6" style="text-align: center;font-size:24px">Data Kosong</td>
    </tr>
    <?php }?>
   </table>
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>