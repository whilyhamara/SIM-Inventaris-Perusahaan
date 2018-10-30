<!DOCTYPE html>
<html>
<head>
	<title>Cara Membuat Captcha dengan php | WWW.MALASNGODING.COM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Cara Membuat Captcha dengan php | WWW.MALASNGODING.COM</h1>	
	<div class="kotak">		

		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "salah"){
				echo "<p>Captcha tidak sesuai.</p>";
			}
		}
		?>

		<p>Isi Captcha Dengan Benar</p>		
		<form action="periksa_captcha.php" method="post">
			<table align="center">						
				<tr>
					<td>Captcha</td>				
					<td><img src="captcha.php" alt="gambar" /> </td>
				</tr>
				<td>Isikan captcha </td>
				<td><input name="nilaiCaptcha" value=""/></td>
				<tr>
					<td><input type ="submit" value="Cek Captcha"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>