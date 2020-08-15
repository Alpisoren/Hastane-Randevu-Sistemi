<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<?php
$baglanti = mysqli_connect("localhost","root","","hastanerand");

	$date = new DateTime($_GET['po']);
	$ta=$date->format('Y-m-d H:i:s');
$sorgu = "SELECT * FROM saatler_tbl where saat_id NOT IN (SELECT saat_id FROM randevu_tbl WHERE tarih_id='".$ta."' AND doktor_id='".$_GET['po2']."')";
$sonuc=mysqli_query($baglanti,$sorgu);

while($veri=mysqli_fetch_array($sonuc))
{ 
	echo "<option value=".$veri[saat_id].">".$veri[saat]."</option>";
}


/*
if($_GET["po"]==1)
{
	echo "<option value=1>1</option>";
	
}*/
?>
