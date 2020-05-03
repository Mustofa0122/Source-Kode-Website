<?php 
$r1=1;
$r6=7;
$hal=1;
if(isset($_GET['hal'])){
$hal=$_GET['hal'];
$r6=$hal*7;$r1=$r6-6;
$hill=$hal-1;
}
$hall=$hal+1;
?><html>
<head>
	<title>WELCOME | MADDAR STATION</title>
	<link rel="stylesheet" type="text/css" href="jualan.css">
</head>
<body><div id="badut">
	<div id="menu"> 
		<br>
		<a href="data_user.php"> DATA USER</a>
		<a href="RT.php"> DATA TRANSAKSI</a>	
		<a href="indexA.php"> HOME</a>
		<a href="tambah_sepatu.php"> TAMBAH SEPATU</a>

	
	<div id="logout">
<a href="index.php">LOGOUT</a>
   </div>
</div>
<?php
include'koneksi.php';
$semua=mysqli_query($koneksi,"select * from isi_sepatu ");
$respon=mysqli_num_rows($semua);
if($respon){
	echo'<table id="user" width=70% border=1px>';
	echo'<th>id sepatu</th>';
	echo'<th>nama sepatu</th>';
	echo'<th>merk sepatu</th>'; 
	echo'<th>ukuran sepatu</th>'; 
	echo'<th>harga</th>';
	echo'<th>kategori</th>';
	echo'<th>review</th>';
	echo'<th>act</th>';
	$par=1;
	while($row=mysqli_fetch_assoc($semua)){
		$par++;
		if($par>=$r1&&$par<=$r6){
			$gab='<img width="140px" height="70px" src="data:image/jpeg;base64,'.base64_encode($row['Gambar']).'"/>';
			echo"<tr> <td>".$row['id_sepatu']."</td>";
			echo"<td>".$row['nama_sepatu']." </td><td>".$row['Merk']."</td>";
			echo" <td>".$row['ukuran']."</td>";
			echo"<td>".$row['harga'].'</td><td>'.$row['kategori']."</td><td>".$gab.
			'</td><td><a href="editS.php?id='.$row['id_sepatu'].'">edit</a></td></tr>';
		}
	}
}
?>
</table>
<div id="Mbutton" >
<?php
	if($respon<$r6 && $hal<2){
		
	}
	else if($hal==1){
	echo '<a href="data_sepatu.php?hal='.$hall.'" > SELANJUTNYA</a>';
}
	else if($r6<$respon){
		echo'<a href="data_sepatu.php?hal='.$hill.'" > SEBELUMNYA</a></br>';
		echo'<a href="data_sepatu.php?hal='.$hall.'" > SELANJUTNYA</a>';
	}
	else{
		echo'<a href="data_sepatu.php?hal='.$hill.'" >SEBELUMNYA</a>';
	}
?>
</div>
</div>
</body>
</html>