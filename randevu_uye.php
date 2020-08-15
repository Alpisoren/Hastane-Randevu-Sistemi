
<?php 

					$baglanti = mysqli_connect("localhost","root","","hastanerand");

?>
<!doctype html>


<html>
<head>
<style  type="text/css">
#tab {
border-collapse: collapse;
width: 100%;
}
 
#tab td, #tab th {
border: 1px solid #ddd;
padding: 8px;
}
 
#tab tr:nth-child(even){background-color: #f2f2f2;}
 
#tab tr:hover {
background-color: #2ecc71;
color:#fff;
}
 
#tab th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #2c3e50;
color: white;
}
</style>
<link rel="stylesheet" type="text/css" href="style/randevu.css" />

<meta charset="utf-8">
<title>RANDEVU AL</title>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  
<script type="text/javascript">
$(document).ready(function(){

$('#poliklinkler').change(function(){
	var po=$("#poliklinkler option:selected").attr('value');
	$('#doktorlar').load('verial.php?po='+po);
});


$('#datepicker').change(function(){
	
	var po=$("#datepicker").val();
	var po2=$("#doktorlar option:selected").attr('value');
	
	//alert(po);
	$('#saatler').load('verial2.php?po='+po+'&po2='+po2);
	
});



});
</script>
</head>

<body>

<?php
session_start();
 $u= $_SESSION["uye_tc_cerez"];
 $tc= $_SESSION["TCNO"];

?>
			<div id="container2">
                	
                    <div id="baslik">YENİ RANDEVU</div> 
                    
                    <div id="solblok">
                    
                    <div class="u_txt">Poliklinik</div>
                    <div style="margin-top:5px;" class="u_txt">Doktor</div>
                    <div style="margin-top:20px;" class="u_txt">Tarih</div>
                    <div style="margin-top:13px;" class="u_txt">Saat</div>
					<div style="margin-top:13px;" class="u_txt"><?php echo "TC:".$tc;?></div>
				
                   
                    </div>
                    
                    <div id="sagblok">
                   
					<form action="" method="post">
			<select class="select" name="poli" id="poliklinkler">
			<option value="secim yapılmadı" selected>Lütfen Poliklinik Seçiniz</option>
			<?php
			
				$sonuc=mysqli_query($baglanti,"SELECT * FROM poliklinik_tbl ORDER BY poliklinik_ad ASC");
				while($veri=mysqli_fetch_array($sonuc)){
				echo "<option value=$veri[poliklinik_id]>$veri[poliklinik_ad]</option>";} 

  
			?>
			</select>
          

		
			<select style class="select" name="dokto" id="doktorlar"> 
			<option value="secim yapilmadi">--Doktor Seçiniz--</option>
			<option value="-1">-- ONCE Poliklinik SECINIZ--</option>		

			</select>



                       <input style="text-align:center;" id="datepicker" type="text" class="u_txt1" name="tar" value="Tarih Seçimi İçin Tıklayınız"/>
				
				<select class="select" name="sa" id="saatler">
			<option value="secim yapılmadı" selected>Lütfen Saat Seçiniz</option>
            
			<?php
		
		
		
/* 				$sonuc3=mysqli_query($baglanti,"SELECT * FROM saatler_tbl ORDER BY saat_id ASC");
				while($veri3=mysqli_fetch_array($sonuc3)){
				echo "<option value=$veri3[saat_id]>$veri3[saat]</option>";
				} 
				 

				mysqli_close($baglanti);
 */			?>

			<input type="submit"   style="margin-top:10px;"  class="buton" name="gir" value="&nbsp;&nbsp;RANDEVU AL&nbsp;&nbsp;"/>
			<input type="button" onclick="location.href='inde.php'"  style="margin-top:10px;"  class="buton" name="cik" value="&nbsp;&nbsp; ÇIKIŞ&nbsp;&nbsp;"/>
					</form>
					
					
					
					
					<br>
					<br>
					<br>
					<br>
					
<table id="tab">
					<tr >
                    <td>DOKTOR ADI:</td>
                    <td>POLİKLİNİK ADI:</td>
					<td>SAAT</td>
                    <td>TARİH</td>
                </tr>
							<?php
					 $ran = mysqli_query($baglanti,"select * from randevu_tbl");
               
 
				
				
                while ($b=mysqli_fetch_array($ran)){
                     if($b['kullanici_id']==$u)
					 {
                    $dob = $b['doktor_id'];
                    $polb = $b['pol_id'];
					 $saatb = $b['saat_id'];
                    $tarihb = $b['tarih_id'];
                     	$son=mysqli_query($baglanti,"SELECT * FROM poliklinik_tbl WHERE poliklinik_id=".$polb." ORDER BY poliklinik_ad ASC");
		while($ver=mysqli_fetch_array($son))
		{
			$son2=mysqli_query($baglanti,"SELECT * FROM doktorlar_tbl WHERE doktor_id=".$dob." ORDER BY doktor_adi ASC");
			while($ver2=mysqli_fetch_array($son2))
			{
				$son3=mysqli_query($baglanti,"SELECT * FROM saatler_tbl WHERE saat_id=".$saatb." ORDER BY saat ASC");
					while($ver3=mysqli_fetch_array($son3))
					{
					
                    echo "
					<tr >
                    <td>$ver2[doktor_adi]</td>
                    <td>$ver[poliklinik_ad]</td>
					<td>$ver3[saat]</td>
                    <td>$tarihb</td>
                </tr>
				
				";
					}
			}
		}  
                }	
				}
				?>
				</table>
                    </div>
			
					</div>
</body>
</html>

<?php

 

$baglanti = mysqli_connect("localhost","root","","hastanerand");
if(mysqli_connect_errno($baglanti)){echo "veritabanı bağlanti hatası". mysqli_connect_error();}

 if(isset($_POST["gir"]))
{
	$kul=$u;
	$pol=$_POST["poli"];
	$dok=$_POST["dokto"];
	$ta=$_POST["tar"];
	$s=$_POST["sa"];	
	
	$date = new DateTime($ta);
	$ta=$date->format('Y-m-d H:i:s');
	
	$varmi = mysqli_num_rows(mysqli_query($baglanti, "select * from randevu_tbl where kullanici_id = '$kul' and doktor_id='$dok' and pol_id='$pol' and saat_id='$s' and tarih_id='$ta'" ));
		if ($varmi > 0){
		
			
		}
	else  {
	$sorgu = "INSERT  INTO randevu_tbl(kullanici_id ,doktor_id , pol_id,saat_id,tarih_id) VALUES (".$kul.",".$dok.",".$pol.",".$s.",'".$ta."')";
						/*echo $sorgu;*/
						
						 if ($sqli = mysqli_query($baglanti,$sorgu)) 
						{
							echo "<script type='text/javascript'> alert(' Randevu Alındı!');</script> ";
															//@header('Location: randevu_uye.php');
															@header("Refresh: 3;");



						}
						else
						{
							echo "<script type='text/javascript'> alert(' Hata Oluştu!');</script> ";
						}
						/*
	
	$son=mysqli_query($baglanti,"SELECT * FROM poliklinik_tbl WHERE poliklinik_id=".$pol." ORDER BY poliklinik_ad ASC");
		while($ver=mysqli_fetch_array($son))
	
		{ 
		
			$son2=mysqli_query($baglanti,"SELECT * FROM doktorlar_tbl WHERE doktor_id=".$dok." ORDER BY doktor_adi ASC");
			while($ver2=mysqli_fetch_array($son2))
			{
				$son3=mysqli_query($baglanti,"SELECT * FROM saatler_tbl WHERE saat_id=".$s." ORDER BY saat ASC");
					while($ver3=mysqli_fetch_array($son3))
					{
						
							 		
				
				
					}
			

			}


		}
*/
}

}


/*if(isset($_POST["cik"]))
{
	@header('Location: inde.php');
		session_destroy();

}*/
 mysqli_close($baglanti);
?>
