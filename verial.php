<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<?php
$baglanti = mysqli_connect("localhost","root","","hastanerand");

$sonuc=mysqli_query($baglanti,"SELECT * FROM doktorlar_poliklinikler WHERE poliklinik_id='".$_GET['po']."' ORDER BY doktor_id ASC");//poliklinik_id si' po ' olan sonuçları döndürüyor

while($veri=mysqli_fetch_array($sonuc))
	
{ 
$sonuc2=mysqli_query($baglanti,"SELECT * FROM doktorlar_tbl WHERE doktor_id='".$veri['doktor_id']."' ORDER BY doktor_id ASC");
while($veri2=mysqli_fetch_array($sonuc2)){
	
echo "<option value=$veri[doktor_id]>$veri2[doktor_adi]</option>";

}


}


/*
if($_GET["po"]==1)
{
	echo "<option value=1>1</option>";
	
}*/
?>
