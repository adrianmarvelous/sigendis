<?php 
    error_reporting(0);
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require_once('../../plugin/phpqrcode/qrlib.php');

    $id = htmlentities($_GET['id']);
    
    $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id = :id");
    $query_data->bindParam(':id',$id);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
    $lamaa_hari = strtotime($data['tgl_mulai']) - strtotime($data['tgl_selesai']);
    echo $lama_hari = abs(round($lamaa_hari / 84600));
    $nip = $data['nip_approve'];
    include '../pejabat.php';
    $bulan = date('m',strtotime($data['tgl_mulai']));
    $tahun = date('Y',strtotime($data['tgl_mulai']));

    
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Persetujuan</title>
    <link rel="stylesheet" href="../../css/surat_ketersediaan_narsum.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <table border="1" width="100%" style="border-collapse: collapse;font-family: Arial, Helvetica, sans-serif;text-align:center">
        <tr>
            <td width="20%" rowspan="5">
                <img width="80" src="../../resource/logo/sby_hitamputih.png" alt="">
            </td>
            <td style="font-size: 24;font-weight:bold;">PEMERINTAH KOTA SURABAYA</td>
        </tr>
        <tr>
            <td style="font-size: 24;font-weight:bold;">BADAN KEPEGAWAIAN DAN PENGEMBANGAN</td>
        </tr>
        <tr>
            <td style="font-size: 24;font-weight:bold;">SUMBER DAYA MANUSIA</td>
        </tr>
        <tr>
            <td style="font-size: 16;font-weight:bold;">Jalan Jimerto Nomor 25-27 Surabaya 60272</td>
        </tr>
        <tr>
            <td style="font-size: 16;font-weight:bold;">Telp. (031) 5312144 ext. 348 Fax. (031) 5474482</td>
        </tr>
    </table>
    <table border="1" width="100%" style="font-family: Arial, Helvetica, sans-serif;margin-top:50px;">
        <tr>
            <td style="width: 100px;"></td>
            <td style="width: 20px;"></td>
            <td style="width: 200px;"></td>
            <td style="width: 80px;"></td>
            <td style="width: 70px;"></td>
            <td>Surabaya, <?php echo date("d-m-Y",strtotime('-1 day'. $data['tgl_mulai']))?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Kepada</td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td><?php echo $data['no_srt_ijin']?></td>
            <td></td>
            <td>Yth.</td>
            <td>1. Camat Prigen <br>
                2. Kapolsek Prigen <br>
                3. Danramil/19 Prigen
            </td>
        </tr>
        <tr>
            <td>Sifat</td>
            <td>:</td>
            <td>Biasa</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>1 Lembar</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="vertical-align: text-top;">Hal</td>
            <td style="vertical-align: text-top;">:</td>
            <td>Ijin Pelaksanaan Kegiatan di Gedung Diklat Pegawai di Prigen </td>
            <td></td>
            <td></td>
            <td>di -</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <hr>
            <td></td>
            <td></td>
            <td>Surabaya</td>
        </tr>
    </table>
    <div>

    </div>
    <table style="margin-left:120px">
        <tr>
            <td style="vertical-align: text-top;text-align:justify;text-indent:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bersama ini disampaikan permohonan ijin penyelenggaraan kegiatan pada bulan <?php include '../bulan.php';?> Tahun <?=$tahun?> di Gedung Pendidikan dan Pelatihan Pegawai Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Pemerintah Kota Surabaya di Jl. Raya Palembon No. 485 Prigen Pasuruan sebagai berikut</td>
        </tr>
        <tr>
            <td style="height:20px"></td>
        </tr>
        <tr>
            <td>
                <table border="1" width="100%" style="border-collapse: collapse;border:1px solid">
                    <tr style="border:1px solid;">
                        <td style="border:1px solid;">NO</td>
                        <td style="border:1px solid;">NAMA KEGIATAN</td>
                        <td style="border:1px solid;">TANGGAL</td>
                        <td style="border:1px solid;">JUMLAH</td>
                        <td style="border:1px solid;">INSTANSI</td>
                    </tr>
                    <?php
                        $i = 1;
                        $query_kegiatan = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE month(tgl_mulai) = :bulan AND year(tgl_mulai) = :tahun AND STATUS = 1 ORDER BY tgl_mulai ASC");
                        $query_kegiatan->bindParam(':bulan',$bulan);
                        $query_kegiatan->bindParam(':tahun',$tahun);
                        $query_kegiatan->execute();
                        while($kegiatan = $query_kegiatan->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr style="border:1px solid;">
                        <td style="border:1px solid;"><?=$i++?></td>
                        <td style="border:1px solid;"><?=$kegiatan['nama_kegiatan']?></td>
                        <td style="border:1px solid;"><?=date('d-m-Y',strtotime($kegiatan['tgl_mulai']))?></td>
                        <td style="border:1px solid;">
                            <?php
                                echo $kegiatan['peserta_pria']+$kegiatan['peserta_wanita']." Orang";
                            ?>
                        </td>
                        <td style="border:1px solid;"><?=$kegiatan['nama_instansi']?></td>
                    </tr>
                    <?php }?>
                </table>
            </td>
        </tr>
    </table>
    <div style="width:80%;margin-left:120px;margin-top:20px">
        <p>Demikian atas perhatiannya disampaikan terima kasih</p>
    </div>
    <table width="100%" style="text-align: center;margin-top:20px">
        <tr>
            <td width="50%"></td>
            <td width="50%">a.n. KEPALA BADAN</td>
        </tr>
        <tr>
            <td></td>
            <td>SEKRETARIS,</td>
        </tr>
        <tr>
            <td>
            <?php
            //file path
            //$name_file = $id_sub."_".$id_content."_".$id_nota."_".$tanggal;
            $file = "qr_code/".$id.".png";

            //other parameters
            /*$ecc = 'M';
            $pixel_size = 1.7;
            $frame_size = 2;*/

            // Generates QR Code and Save as PNG
            QRcode::png($actual_link, $file/*, $ecc, $pixel_size, $frame_size*/);

            // Displaying the stored QR code if you want
            echo "<div><img width=15% src='".$file."'></div>";
            ?>
            </td>
            <td>
                <?php 
                    if($data['status'] == 1){
                ?>
                <img src="../specimen/<?=$data['nip_approve']?>.png" width="120">
                <?php }?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-decoration: underline;"><?php echo $nama_nip?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $jabatan?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $data['nip_approve']?></td>
        </tr>
    </table>
    
    <div style="position:fixed;bottom:0;width:100%;height:50px;background:white;">
        <hr>
        <p style="text-align: center;font-size:12px;color:gray">http://www.surabaya.go.id, email: bkpsdm@surabaya.go.id</p>
    </div>
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>