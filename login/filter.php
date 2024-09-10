<?php
require_once("../koneksi.php");

$login_status = $login->cek_login();
if($login_status){
	if ($_SESSION['role'] == 'admin') {
        echo "<script>window.location='../user/admin/index.php'</script>";
	}elseif ($_SESSION['role'] == 'pemohon'){
        echo "<script>window.location='../user/pemohon/index.php'</script>";
	}

}
else{
	//include form log in jika belum log in
	include "login_page.php";
}
?>