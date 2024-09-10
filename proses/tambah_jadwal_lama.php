<?php 
    include '../koneksi.php';
    include '../session.php';


    $nama = htmlentities($_POST['nama']);
    $email = htmlentities($_POST['email']);
    $telp = htmlentities($_POST['telp']);
    $nama_instansi = htmlentities($_POST['nama_instansi']);
    $nama_kegiatan = htmlentities($_POST['nama_kegiatan']);
    $peserta_pria = htmlentities($_POST['peserta_pria']);
    $peserta_wanita = htmlentities($_POST['peserta_wanita']);
    $tgl_mulai = htmlentities($_POST['tgl_mulai']);
    $tgl_selesai = htmlentities($_POST['tgl_selesai']);
    $no_srt_permohonan = htmlentities($_POST['no_srt_permohonan']);
    $tgl_srt_permohonan = htmlentities($_POST['tgl_srt_permohonan']);
    $perihal_srt_permohonan = htmlentities($_POST['perihal_srt_permohonan']);
    $status = htmlentities($_POST['status']);
    $tgl_persetujuan = htmlentities($_POST['tgl_persetujuan']);
    $no_srt_persetujuan = htmlentities($_POST['no_srt_persetujuan']);
    $nip_approve = '196905101997022001';


    function re_name($nama){
        $file_name = htmlentities($_FILES[$nama]['name']);
        $file_size = htmlentities($_FILES[$nama]['size']);
        if(!empty($file_name)){
            if($file_size > 10000000){
                echo "<script>alert('Ukuran file $nama terlalu besar');history.go(-1);</script>";
            }else{
                $acak = rand(00000000, 99999999);
                $FileExt       = substr($file_name, strrpos($file_name, '.'));
                $FileExt       = str_replace('.','',$FileExt);
                $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                $NewFileName   = $acak.'_'.$file_name.'.'.$FileExt;
                $directory = 'upload/'.$nama.'/';

                move_uploaded_file($_FILES[$nama]['tmp_name'],$directory.$NewFileName);
                return $NewFileName;
            }
        }
    }

    $nama_surat_permohonan = re_name("surat_permohonan");

    $insert = $db->prepare("INSERT INTO booking_header (nama, email,telp, nama_instansi, nama_kegiatan, peserta_pria, peserta_wanita, tgl_mulai, tgl_selesai,no_srt_permohonan, tgl_srt_permohonan, perihal_srt_permohonan, surat_permohonan, status, tgl_persetujuan, no_srt_persetujuan, nip_approve) VALUES (:nama, :email, :telp, :nama_instansi, :nama_kegiatan, :peserta_pria, :peserta_wanita, :tgl_mulai, :tgl_selesai, :no_srt_permohonan, :tgl_srt_permohonan, :perihal_srt_permohonan, :surat_permohonan, :status, :tgl_persetujuan, :no_srt_persetujuan, :nip_approve)");
    $insert->bindParam(':nama',$nama);
    $insert->bindParam(':email',$email);
    $insert->bindParam(':telp',$telp);
    $insert->bindParam(':nama_instansi',$nama_instansi);
    $insert->bindParam(':nama_kegiatan',$nama_kegiatan);
    $insert->bindParam(':peserta_pria',$peserta_pria);
    $insert->bindParam(':peserta_wanita',$peserta_wanita);
    $insert->bindParam(':tgl_mulai',$tgl_mulai);
    $insert->bindParam(':tgl_selesai',$tgl_selesai);
    $insert->bindParam(':no_srt_permohonan',$no_srt_permohonan);
    $insert->bindParam(':tgl_srt_permohonan',$tgl_srt_permohonan);
    $insert->bindParam(':perihal_srt_permohonan',$perihal_srt_permohonan);
    $insert->bindParam(':surat_permohonan',$nama_surat_permohonan);
    $insert->bindParam(':status',$status);
    $insert->bindParam(':tgl_persetujuan',$tgl_persetujuan);
    $insert->bindParam(':no_srt_persetujuan',$no_srt_persetujuan);
    $insert->bindParam(':nip_approve',$nip_approve);
    $insert->execute();

    header('Location: ../user/admin/index.php?pages=index_pemohon')
?>