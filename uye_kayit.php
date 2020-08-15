
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ÜYE KAYIT</title>
<link href="style/index.css" rel="stylesheet" type="text/css">


</head>

<body>

				<div id="container2">
                	
                    <div id="baslik">YENİ ÜYE KAYDI</div> 
                    
                    <div id="solblok">
                    
                    <div class="u_txt">TC</div>
                    <div class="u_txt">AD</div>
                    <div class="u_txt">SOYAD</div>
                    <div class="u_txt">PAROLA</div>
                    <div class="u_txt">GSM</div>
                       <form action="" method="post">
                       <input  type="submit"   style="margin-top:10px;"  class="buton" name="btn" value="KAYDET"  />
					   <input  type="button"  onclick="location.href='inde.php'" style="margin-top:10px;"  class="buton" name="btn" value="GİRİŞE GİT"  />
                    </div>
                    
                    <div id="sagblok">
                    
                     <input type="text" class="u_txt1" name="u_tc" value=""/>
                     
                      <input type="text" class="u_txt1" name="u_ad" value=""/>
                      
                       <input type="text" class="u_txt1" name="u_soyad" value=""/>
                       
                        <input type="text" class="u_txt1" name="u_sif" value=""/>
                        
                         <input type="text" class="u_txt1" name="u_gsm" value=""/>
                  </form>
                    </div>
               
					</div>
</body>
</html>
<?php
$baglanti = mysqli_connect("localhost","root","","hastanerand");

 if(isset($_POST["btn"]))
{
$ad=$_POST["u_ad"];
$soyad=$_POST["u_soyad"];
$tc=$_POST["u_tc"];
$sifrela=$_POST["u_sif"];
$gsm=$_POST["u_gsm"];

$varmi = mysqli_num_rows(mysqli_query($baglanti, "select * from kullanicitab where tc = '$tc' "));
		if ($varmi > 0){ echo "<script type='text/javascript'> alert(' BU TC NUMARASI İLE KAYIT MEVCUT.EĞER ŞİFRENİZİ HATRILAMIYORSANIZ LÜTFEN ŞİFRE SIFIRLAMA İŞLEMİNİ KULLANINIZ..');</script>" ;
		
			
		}
		
		else{
if(strlen($tc)!=11)
{
echo "<script type='text/javascript'> alert(' TC Kimlik no 11 rakam olmak zorundadır !');</script> ";

}else if(strlen($ad)>=255)
{
echo "<script type='text/javascript'> alert(' Ad 255 karakterden az olmak zorundadır !');</script> ";
 
}
else if(strlen($soyad)>=255)
{
echo "<script type='text/javascript'> alert(' Soyad 255 karakterden az olmak zorundadır !');</script> ";

}
else if(strlen($gsm)!=11)
{
echo "<script type='text/javascript'> alert(' GSM 11 rakam olmak zorundadır !');</script> ";

}else{

$sql = mysqli_query($baglanti,"insert into kullanicitab(ad , soyad , tc,sifre,gsm) values ('".$ad."','".$soyad."','".$tc."','".$sifrela."','".$gsm."')");

header('Location: inde.php');
}
}
 	
}





 mysqli_close($baglanti);
?>