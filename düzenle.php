<?php
	include("baglan.php"); // veritabanı bağlantısı 
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>DÜZENLE</title>
		<link href="anasayfa.css" rel="stylesheet" />

	</head>
	<body>
		<?php 
			$sorgu = $baglanti->query("SELECT * FROM yorum1 WHERE id =".(int)$_GET['id']); //verileri veritabanından aldım
			$sonuc =$sorgu->fetch(PDO::FETCH_ASSOC); 
		?>
		<div class="container">
			<div class="düzen">
				<form action="" method="post">
					<table class="tablo">
						
						<tr>
							<td>İSİM</td>
							<td><input type="text" name="isim" class="form-düzen" value="<?php echo $sonuc['isim']; // verileri inputlara yazdırdım ?>" ></td>
						</tr>
						
						<tr>
							<td>YORUM</td>
							<td><input type="text" name="yorum" class="form-düzen" value="<?php echo $sonuc['yorum']; // verileri inputlara yazdırdım  ?>"></td>
						</tr>
						
						
						
						
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-primary" value="KAYDET"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
				<?php 

					if ($_POST) { // Post kontrolü
	
						$isim=$_POST['isim'];//postları degiskenlere attım
						$yorum=$_POST['yorum'];
						
						if ($isim<>"" && $yorum<>"" ) { // dolu mu buş mu diye kontrol ettim
		
							if ($baglanti->query("UPDATE yorum1 SET isim = '$isim', yorum = '$yorum' WHERE id =".$_GET['id'])) // Güncelleme sorgusu.
							{
								header("location:ekle.php"); //çalışırsa ekle sayfasına gitmesini istiyorum
							}
							else
							{
								echo "Hata oluştu"; // çalışmazsa hata yazdırdım
							}

						}
					}
				?>
			
	</body>
</html>