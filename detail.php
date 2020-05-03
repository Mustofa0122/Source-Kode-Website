<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
		<link rel="stylesheet" type="text/css" href="jualan.css">

</head>
<body>
	<?php
include 'koneksi.php';
$id=$_POST['size'];
$ambil=mysqli_query($koneksi,"select * from isi_sepatu where id_sepatu='$id'");
$coba=mysqli_fetch_array($ambil);
session_start();
?>
<script>
	function plg(){
		location.href="pilihan.php";
	}
	function beli(){
		location.href="tr.php?id=<?php echo $id;?>";
	}
</script>
<div id="detail">
	<div id="menu"> 
		<br>
		<ul><li><a href="pilihan.php"> GENRE</a></li>
		<li><a href="pilihan.php?kategori=basket">sepatu basket</a></li>
		<li><a href="pilihan.php?kategori=lari">sepatu lari</a></li>
		<li><a href="pilihan.php?kategori=bola">sepatu bola</a></li></ul>
	<div id="logout">
<a href="index.php">LOGOUT</a>
   </div>
	</div>
	<div id="kotaks">
	<p><?php echo '<center>'.$coba['nama_sepatu'].'</center>';?></p>
	<hr width:40%>
	<?php 
	$gab='<img width="200px" height="200px" src="data:image/jpeg;base64,'.base64_encode($coba['Gambar']).'"/>';
	echo $gab;
	echo "<p> ukuran:".$coba['ukuran']."</p>"."<p> merk:".$coba['Merk']."</p>"."<p> kategori:".$coba['kategori']."</p><p> harga:".$coba['harga']."</p>"."</p><p> stok:".$coba['stok']."</p>";
	
	?>
	 <input type="button" onclick="beli();" name="BELI" value="BELI" id="sub">
    <input type="button" onclick="plg();" name="KEMBALI" value="KEMBALI" id="sub"><br>
</div>
</div>
</body>
</html>