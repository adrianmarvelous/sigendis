<?php 
    //error_reporting(0);
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => [216, 330]]);
    ob_start();

    setlocale(LC_TIME, 'id_ID.utf8');
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

    function getHariIndonesia($tanggal) {
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=id&dt=t&q=";
    
        $nama_hari = strftime("%A", strtotime($tanggal));
        $nama_hari_english = urlencode($nama_hari);
    
        $response = file_get_contents($url . $nama_hari_english);
    
        // Parsing hasil JSON
        $data = json_decode($response, true);
    
        // Mendapatkan terjemahan (indeks 0 adalah terjemahan)
        $terjemahan = $data[0][0][0];
    
        return $terjemahan;
    }
    
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
<style>
    .table1 {
        border-collapse: collapse;
    }

    .table1, .table1 td, .table1 tr {
        border: 1px solid black;
    }
    .table1{
        width: 100%;
        text-align: center;
    }
    .paragraf{
        text-align:justify;
        text-indent: 50px;
    }
</style>

<body>
    <table border="1" width="100%" style="border-collapse: collapse;font-family: Arial, Helvetica, sans-serif;text-align:center">
        <tr>
            <td width="20%" rowspan="5">
                <img width="80" src="../../resource/logo/sby_hitamputih.png" alt="">
            </td>
            <td style="font-size: 22;">PEMERINTAH KOTA SURABAYA</td>
        </tr>
        <tr>
            <td style="font-size: 26;">BADAN KEPEGAWAIAN DAN PENGEMBANGAN</td>
        </tr>
        <tr>
            <td style="font-size: 26;">SUMBER DAYA MANUSIA</td>
        </tr>
        <tr>
            <td style="font-size: 16;">Jalan Jimerto Nomor 25-27 Surabaya 60272</td>
        </tr>
        <tr>
            <td style="font-size: 16;">Telp. (031) 5312144 ext. 348 Fax. (031) 5474482</td>
        </tr>
    </table>
    <table border="1" width="100%" style="font-family: Arial, Helvetica, sans-serif;margin-top:50px;">
        <tr>
            <td style="width: 100px;"></td>
            <td style="width: 20px;"></td>
            <td style="width: 200px;"></td>
            <td style="width: 80px;"></td>
            <td style="width: 70px;"></td>
            <td>Surabaya, <?php echo date("d-m-Y",strtotime($data['tgl_persetujuan']))?></td>
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
            <td><?php echo '000.1.4/'.$data['no_srt_persetujuan'].'/436.8.4'.'/2024'?></td>
            <td></td>
            <td>Yth.</td>
            <td><?php echo $data['nama']?></td>
        </tr>
        <tr>
            <td>Sifat</td>
            <td>:</td>
            <td>Biasa</td>
            <td></td>
            <td></td>
            <td><?php echo $data['nama_instansi']?></td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>-</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="vertical-align: text-top;">Hal</td>
            <td style="vertical-align: text-top;">:</td>
            <td>Persetujuan Peminjaman Gedung Diklat Kepegawaian Kota Surabaya di Prigen - Pasuruan</td>
            <td></td>
            <td></td>
            <td>di Surabaya</td>
        </tr>
    </table>
    <div>

    </div>
    <div style="width:80%;margin-left:120px;margin-top:10px">
    <p class="paragraf">Menindaklanjuti Surat Saudara  nomor: <?php echo $data['no_srt_permohonan']?> tanggal <?php echo date('d-m-Y',strtotime($data['tgl_srt_permohonan']))?>  nomor: <?php echo $data['no_srt_permohonan']?> Hal : <?php echo $data['perihal_srt_permohonan']?>, tanggal <?= date('d-m-Y',strtotime($data['tgl_mulai']))?> - <?= date('d-m-Y',strtotime($data['tgl_selesai']))?> bersama ini disampaikan persetujuan penggunaan Gedung Diklat Kepegawaian Pemerintah Kota Surabaya Jl. Raya Palembon No.485, Prigen, Kec. Prigen, Pasuruan.</p>
    <p>Berikut disampaikan informasi penggunaan Gedung Diklat Kepegawaian :</p>
    <ol style="text-align: justify;">
        <li>Gedung Diklat Kepegawaian dapat Saudara Gunakan pada :</li>
        <table class="table1">
            <tr>
                <td colspan="3">Check-In</td>
                <td colspan="3">Check-Out</td>
            </tr>
            <tr>
                <td>Hari</td>
                <td>Tanggal</td>
                <td>Pukul</td>
                <td>Hari</td>
                <td>Tanggal</td>
                <td>Pukul</td>
            </tr>
            <tr>
                <td><?=getHariIndonesia($data['tgl_mulai'])?></td>
                <td><?=date('d-M-Y',strtotime($data['tgl_mulai']))?></td>
                <td>08:00</td>
                <td><?=getHariIndonesia($data['tgl_selesai'])?></td>
                <td><?=date('d-M-Y',strtotime($data['tgl_selesai']))?></td>
                <td>15:00</td>
            </tr>
        </table>

        <li>Jumlah Tamu yang hadir sebanyak : <?=$data['peserta_pria']+$data['peserta_wanita']?> orang</li>
        <li>Ruangan yang digunakan :
            <ol>
                <li>Aula</li>
                <li>Mushola</li>
                <li>Lobby lt. 1 Gedung Asrama</li>
                <li>Lobby lt. 2 Gedung Asrama</li>
                <li>Ruang makan Gedung Asrama</li>
                <li>Kamar Tidur :</li>
            </ol>
        </li>
        <li>Badan Kepegawaian dan Pengembangan SDM Kota Surabaya berhak untuk membatalkan jadwal peminjaman Gedung Diklat Kepegawaian Prigen, apabila digunakan untuk agenda atau kegiatan kedinasan Pemerintah Kota Surabaya yang mendesak, dengan pemberitahuan melalui surat maupun pesan elektronik (sms, line, whatsap. dll);</li>
        <li>Apabila terjadi sebagaimana poin 5, maka Saudara dapat mengajukan penjadwalan ulang pelaksanaan kegiatan yg tertunda di Gedung Diklat Kepegawaian - Prigen, dengan syarat dan ketentuan yang ditetapkan oleh Badan Kepegawaian dan Pengembangan SDM Kota Surabaya.</li>
    </ol>
    <p class="paragraf">Sehubungan dengan hal tersebut, dimohon kepada Saudara untuk mengunduh dan menandatangani Formulir Perjanjian Peminjaman, serta mengunggah kembali formulir yang telah ditanda tangani pada aplikasi SiGendis.</p>
    <p class="paragraf">BKPSDM akan memberikan kode unik yang harus Saudara sampaikan kepada pegawai Badan Kepegawaian dan Pengembangan SDM yang bertugas di Gedung Diklat Kepegawaian Prigen, saat Check-In.</p>
    <p class="paragraf">Pegawai Badan Kepegawaian dan Pengembangan SDM yang bertugas di Gedung Diklat Kepegawaian Prigen berhak menolah kehadiran Saudara beserta tim pada tanggal tersebut pada poin 1, apabila Saudara tidak dapat menunjukkan kode unik tersebut.</p>
    <p class="paragraf">Demikian atas perhatiannya disampaikan terima kasih.</p>
    </div>
    <!-- <table style="margin-left:120px">
        <tr>
            <td style="vertical-align: text-top;">1.</td>
            <td style="text-align:justify">Badan Kepegawaian dan Pengembangan SDM Kota Surabaya menyetujui peminjaman Gedung Diklat Kepegawaian - Prigen pada tanggal <?= date('d-m-Y',strtotime($data['tgl_mulai']))?> - <?= date('d-m-Y',strtotime($data['tgl_selesai']))?> untuk pelaksanaan kegiatan <?=$data['nama_kegiatan']?> dengan jumlah peserta sebanyak <?=$data['peserta_pria']+$data['peserta_wanita']?> orang ; </td>
        </tr>
        <tr>
            <td style="vertical-align: text-top;">2.</td>
            <td style="text-align:justify">Peminjam wajib menjaga kebersihan, keamanan dan ketertiban di lingkungan Gedung Diklat Kepegawaian - Prigen ;</td>
        </tr>
        <tr>
            <td style="vertical-align: text-top;">3.</td>
            <td style="text-align:justify">Badan Kepegawaian dan Pengembangan SDM Kota Surabaya berhak untuk membatalkan ijin peminjaman Gedung Diklat Kepegawaian Prigen kepada Saudara,  apabila digunakan untuk agenda atau kegiatan kedinasan Pemerintah Kota Surabaya yang mendesak, dengan pemberitahuan melalui surat maupun pesan elektronik (sms, line, whatsap. dll) ; </td>
        </tr>
        <tr>
            <td style="vertical-align: text-top;">4.</td>
            <td style="text-align:justify">Apabila terjadi sebagaimana poin 3, maka Saudara dapat mengajukan penjadwalan ulang pelaksanaan kegiatan yg tertunda di Gedung Diklat Kepegawaian - Prigen, dengan syarat dan ketentuan yang ditetapkan oleh Badan Kepegawaian dan Pengembangan SDM Kota Surabaya. </td>
        </tr>
    </table>
    <div style="width:80%;margin-left:120px;margin-top:20px">
        <p>Demikian atas perhatiannya disampaikan terima kasih</p>
    </div>-->
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
                <img src="../../../sekretariat/assets/specimen/<?=$data['nip_approve']?>.png" width="120">
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
	<div style="position:fixed;bottom:0;width:100%;height:60px;">
        <hr>
        <p style="text-align: center;font-size:12px;color:gray">http://www.bkpsdm.surabaya.go.id, email: bkpsdm@surabaya.go.id</p>
    </div>
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>