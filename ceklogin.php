<?php
 	include 'koneksi.php';

 	$nama  = $_POST ['username'];
 	$pass  = $_POST ['password'];
 	
 	$query = mysqli_query($koneksi,"select * from akun_sepatu where nama_akun='$nama' and password='$pass' ");
 	$cek = mysqli_num_rows($query);

 	$data=mysqli_fetch_array($query);
	$lvl=$data['status'];
    $iid=$data['id_akun'];
 	if($cek>0){
 		session_start();
 		echo'<script>alert("login sukses!");</script>';
 		$_SESSION['user']=$nama;
 		$_SESSION['id']=$iid;
 		$_SESSION['kls']=$lvl;
 		if($lvl=="admin"||$lvl=="Admin"){
 			echo'<script>location.href="indexA.php";</script>';
 		}
 		else if($lvl=="user"){
 			echo'<script>location.href="beranda.php";</script>';

 		}
 	}
 	else{
 	echo'<script>alert("login gagal!");
 		location.href="form_login1.php";</script>';
 		}
 

?>