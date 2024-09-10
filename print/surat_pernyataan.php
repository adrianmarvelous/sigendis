<?php
    ini_set('display_errors', 1);
    error_reporting(~0);
    include '../koneksi.php';
    $id = htmlentities($_GET['id']);

    $query_data = $db->prepare("SELECT * FROM sigendis_jadwal_peminjaman WHERE id=:id");
    $query_data->bindParam(':id',$id);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
?>
<?php 
    require_once('../plugin/phpqrcode/qrlib.php');
    require_once('../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => [216, 330]]);

    ob_start();

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
/* table, tr, td {
  border: 1px solid;
    padding: 10px;
} */
.table1 {
    border-collapse: collapse;
}

.table1, .table1 td, .table1 tr {
    border: 1px solid black;
}
.table1{
    width: 95%;
    text-align: center;
}
h1{
    text-align: center;
}
p{
    text-align: justify;
}
body{
    font-size: 12px;
} 
</style>
<body>
    <h1>FORMULIR PERJANJIAN PEMINJAMAN</h1>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?=$data['nama']?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?=$data['nik']?></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>:</td>
            <td><?=$data['telp']?></td>
        </tr>
        <tr>
            <td>Nama Instansi</td>
            <td>:</td>
            <td><?=$data['nama_instansi']?></td>
        </tr>
        <tr>
            <td>Nomor Surat Permohonan</td>
            <td>:</td>
            <td><?=$data['no_srt_permohonan']?></td>
        </tr>
    </table>
    <p>Telah menyetujui persyaratan dan ketentuan peminjaman Gedung Diklat Kepegawaian Pemerintah Kota Surabaya Jl. Raya Palembon No.485, Prigen, Kec. Prigen, Pasuruan , sebagai berikut :</p>
    <ol style="text-align: justify;">
        <li>Melakukan check in dan check out sesuai jadwal berikut :</li>
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
                <td>09:00 WIB</td>
                <td><?=getHariIndonesia($data['tgl_selesai'])?></td>
                <td><?=date('d-M-Y',strtotime($data['tgl_selesai']))?></td>
                <td>15:00 WIB</td>
            </tr>
        </table>
        <li>Menyatakan bahwa tamu yang hadir benar-benar sejumlah <?=$data['peserta_pria']+$data['peserta_wanita']?> orang;</li>
        <li>Meminjam ruangan yang disetujui, a.l.:</li>
            <ol>
                <li>Aula</li>
                <li>Mushola</li>
                <li>Lobby lt. 1 Gedung Asrama</li>
                <li>Lobby lt. 2 Gedung Asrama</li>
                <li>Ruang makan Gedung Asrama</li>
                <li>Kamar Tidur</li>
            </ol>
        <li>Menjaga kebersihan seluruh ruangan yang digunakan;</li>
        <li>Tidak merubah tata letak ruangan :</li>
            <ol>
                <li>Lobby lt. 1 Gedung Asrama</li>
                <li>Lobby lt. 2 Gedung Asrama</li>
                <li>Ruang makan Gedung Asrama</li>
                <li>Kamar Tidur</li>
            </ol>
        <li>Mengambalikan barang inventaris Gedung Diklat Prigen yang digunakan sesuai kondisi saat dipinjam kepada pegawai BKPSDM yang bertugas. Kerusakan dan kehilangan barang tersebut menjadi tanggung jawab saya dan tamu sebagaimana poin 2 selaku peminjam;</li>
        <li>Kehilangan barang milik saya dan tamu sebagaimana poin 2, bukan tanggung jawab Pemerintah Kota Surabaya;</li>
        <li>Kecelakaan atau luka yang terjadi pada saya dan tamu sebagaimana poin 2 di area Gedung Diklat Kepegawaian bukan tanggung jawab Pemerintah Kota Surabaya;</li>
        <li>Bersedia membantu menjaga keamanan dan ketertiban di lingkungan Gedung Diklat Prigen;</li>
        <li>Bersedia mengganti dan memperbaiki apabila terdapat kerusakan gedung dan fasilitas lainnya yang disebabkan oleh saya dan tamu sebagaimana poin 2;</li>
        <li>Tidak menggunakan Gedung Diklat Kepegawaian untuk kegiatan politik dan ormas yang melanggar hukum;</li>
        <li>Tidak memasang spanduk atau bendera organisasi diluar pagar atau di halaman Gedung Diklat Kepegawaian;</li>
        <li>Tidak melakukan barbeque tanpa persetujuan BKPSDM;</li>
        <li>Bersedia melaporkan kepada pegawai Badan Kepegawaian dan Pengembangan SDM yang bertugas saat akan meninggalkan Gedung Diklat Kepegawaian, baik untuk pergi sebentar ataupun saat check-out;</li>
        <li>Pemerintah Kota Surabaya berhak mengambil tindakan hukum apabila terdapat pelanggaran terhadap syarat dan ketentuan ini.</li>
        <li>Badan Kepegawaian dan Pengembangan SDM Kota Surabaya berhak untuk membatalkan jadwal peminjaman Gedung Diklat Kepegawaian Prigen, apabila digunakan untuk agenda atau kegiatan kedinasan Pemerintah Kota Surabaya yang mendesak, dengan pemberitahuan melalui surat maupun pesan elektronik (sms, line, whatsap. dll);</li>
        <li>Apabila terjadi sebagaimana poin 16, maka Saudara dapat mengajukan penjadwalan ulang pelaksanaan kegiatan yg tertunda di Gedung Diklat Kepegawaian - Prigen, dengan syarat dan ketentuan yang ditetapkan oleh Badan Kepegawaian dan Pengembangan SDM Kota Surabaya.</li>
    </ol>
    <p>Saya dengan sadar telah membaca, memahami dan menyetujui 17 (tujuh belas) poin syarat dan ketentuan tersebut. Apabila saya dan tamu sebagaimana poin 2 selaku peminjam, melanggar 17 (tujuh belas) poin tersebut, maka saya bersedia dituntut secara hukum.</p>
    <table style="width: 100%;margin-top:-20px">
        <tr>
            <td style="width: 50%;"></td>
            <td style="text-align: center;height:10px">Hormat saya, ........................................</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;height:180px"><?=$data['nama']?></td>
        </tr>
    </table>
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>