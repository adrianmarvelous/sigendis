<?php
require_once "../../koneksi.php";
$login->login_redir();
//require_once "../../session.php";
/*session_start();
if (!isset($_SESSION['nama'])) {
    header("location: login.php");
}*/
include "../assets/header.php";

/*$nip = htmlentities($_SESSION['nip']);
$query_nik = $db->prepare("SELECT nip, nik FROM user_master_asn WHERE nip = '$nip'");
$query_nik->execute();
$nik_ = $query_nik->fetch(PDO::FETCH_ASSOC);
$nik = $nik_['nik'];

$query_resume_rapat = $db->prepare("SELECT * FROM narsum_daftar_hadir_umum WHERE nik_peserta = '$nik'");
$query_resume_rapat->execute();*/
//$check = mysqli_num_rows($query_resume_rapat);
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <?php 
                        //if($query_resume_rapat->rowCount() > 0){
                    ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Balai Diklat
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <!--<a class="nav-link" href="?pages=index_pemohon">Data Pemohon</a>-->
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <b><?php echo $_SESSION['username']; ?></b>
            </div>
        </nav>
    </div>
    <?php 
        $actual_link = "http://$_SERVER[REQUEST_URI]";
        if (strrpos($actual_link, $_SESSION['role']) !== false){ //cek path role sesuai login_user
          if($_SESSION['role'] == 'pemohon'){
            if (@$_GET['pages'] == '') { 
                include 'balai_diklat/index.php';
            }elseif(htmlentities($_GET['pages'] == 'detail_permohonan')){
                include 'balai_diklat/detail_pemohon.php';
            }
            include "../assets/footer.php";
        }}
?>