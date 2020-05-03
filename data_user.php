<?php 
$r1=1;
$r6=10;
$hal=1;
if(isset($_GET['hal'])){
$hal=$_GET['hal'];
$r6=$hal*10;$r1=$r6-9;
$hill=$hal-1;
}
$hall=$hal+1;
?><html>
<head>
	<title>WELCOME | MADDAR STATION</title>
	<link rel="stylesheet" type="text/css" href="jualan.css">
</head>
<body><div id="datauser">
	<div id="menu"> 
		<br>
		<a href="indexA.php"> HOME</a>
		<a href="RT.php"> DATA TRANSAKSI</a>	
		<a href="data_sepatu.php"> DATA SEPATU</a>
		<a href="tambah_sepatu.php"> TAMBAH SEPATU</a>

	
	<div id="logout">
<a href="index.php">LOGOUT</a>
   </div>
</div>
<?php
include'koneksi.php';
$semua=mysqli_query($koneksi,"select * from akun_sepatu where status='user'");
$respon=mysqli_num_rows($semua);
if($respon){
	echo'<table id="user" width=70% border=1px>';
	echo'<th>id akun</th>';
	echo'<th>username</th>';
	echo'<th>password</th>'; 
	echo'<th>alamat</th>'; 
	echo'<th>tipe</th>';
	echo'<th>act</th>';
	while($row=mysqli_fetch_assoc($semua)){
		$par=$row['id_akun'];
		if($par>=$r1&&$par<=$r6){
			echo"<tr> <td>".$row['id_akun']."</td>";
			echo"<td>".$row['nama_akun']." </td><td>".$row['password']."</td>";
			echo" <td>".$row['alamat']."</td>";
			echo"<td>".$row['status'].'</td><td><a href="editU.php?id='.$row['id_akun'].'">edit</a></td></tr>';
		}
	}
}
?>
<?php
	if($respon<$r6 && $hal<2){
		
	}
	else if($hal==1){
	echo '<a href="data_user.php?hal='.$hall.'" > selanjutnya</a>';
}
	else if($r6<$respon){
		echo'<a href="data_user.php?hal='.$hill.'" > sebelumnya</a>';
		echo'<a href="data_user.php?hal='.$hall.'" > selanjutnya</a>';
	}
	else{
		echo'<a href="data_user.php?hal='.$hill.'" >sebelumnya</a>';
	}
?>
</div>
</body>
</html>