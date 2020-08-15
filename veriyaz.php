<?php
$baglanti = mysqli_connect("localhost","root","","hastanerand");

 if(isset($_POST["gir"]))
{
	$kul=$u;
	$pol=$_POST["poli"];
	$dok=$_POST["dokto"];
	$ta=$_POST["tar"];
	$s=$_POST["sa"];



	
	$son=mysqli_query($baglanti,"SELECT * FROM poliklinik_tbl WHERE poliklinik_id='".$pol."' ORDER BY poliklinik_ad ASC");
		while($ver=mysqli_fetch_array($son))
	
		{ 
		
			$son2=mysqli_query($baglanti,"SELECT * FROM doktorlar_tbl WHERE doktor_id='".$dok."' ORDER BY doktor_adi ASC");
			while($ver2=mysqli_fetch_array($son2))
			{
				$son3=mysqli_query($baglanti,"SELECT * FROM saatler_tbl WHERE saat_id='".$s."' ORDER BY saat ASC");
					while($ver3=mysqli_fetch_array($son3))
					{
					$sqli = mysqli_query($baglanti,"insert into rand(kullanıcı_id ,doktor_id , pol_id,saat_id,tarih_id) values (('".$kul."','".$dok."','".$pol."','".$s."','".$ta."')");
				
				
					}
			

			}


		}
	?>
