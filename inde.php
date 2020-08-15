<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<html>
<head>
<title>GİRİŞ</title>
</head>

<link rel="stylesheet" type="text/css" href="style/index.css" />



<body>
<center><img src="style/logo.png" width="120px" ></center>
			<div id="container">
            
            <div id="üsttxt">
           
<h2>T.C SAĞLIK BAKANLIĞI</h2><h3>MERKEZİ RANDEVU SİSTEMİ </h3></div>
            <div id="input">
            		<div id="input1">
            <div id="tc">T.C KİMLİK NUMARASI</div>
            <div id="tcno">
             <form action="" method="post">
            <input type="text" class="textbox" name="tc" value=""/>
           
            </div>
            		</div>
                    
                    <div id="input1">
                      <div id="tc">PAROLA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div id="tcno">
             
            <input type="password" class="textbox" name="si" value=""/>
            
                    </div>
            </div>
            <div id="btn">
            		<div class="buton">
                    <input onclick="location.href='uye_kayit.php'" type="button" class="buton" name="yuye" value="Yeni üye"/>
                    </div>
                    <div class="buton1">
                                     <input onclick="location.href='sifremi_unuttum.html'" type="button" class="buton" name="pu" value="Parolamı Unuttum"/>
                    </div>
                    <div id="giris">
                                     <blockquote>
                                       <p>
                                         <input type="submit"   style="margin-top:10px;"  class="buton" name="login" value="&nbsp;&nbsp;Giriş&nbsp;&nbsp;"/>
										 </form>
                                       </p>
                                     </blockquote>
                    </div>
                   
            </div>
            
</div>
</body>

</html>

<?php
session_start();

$baglanti = mysqli_connect("localhost","root","","hastanerand");

if(isset($_POST["login"]))
{
$kullanad=$_POST["tc"];
$sifrela=$_POST["si"];

if(strlen($kullanad)!=11)
{
echo "<script type='text/javascript'> alert(' TC Kimlik no 11 rakam olmak zorundadır !');</script> ";
}else{
$varmi = mysqli_fetch_array(mysqli_query($baglanti, "select * from kullanicitab where tc = '$kullanad' and   sifre = '$sifrela'"));
		if ($varmi !="")
		{ 
			$_SESSION["TCNO"]=$kullanad;
			$_SESSION["uye_tc_cerez"]=$varmi[id];
			@header('Location: randevu_uye.php');
		}
	else
	{
		echo "<script type='text/javascript'> alert(' TC Kimlik no veya Şifre Yanlış !');</script> ";
	}
}
}



 mysqli_close($baglanti);
 
 
?>