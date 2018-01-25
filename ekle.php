<?php
include("baglan.php");//veritabanına bağlandığımız sayfayı ekliyoruz
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		 <title>YORUM EKLEME</title>
		<link href="anasayfı.css" rel="stylesheet" />
	</head>
	<body>
	<form id="form1" runat="server">
    <div>
	<!-- -->
        <div class="anasayfı">
            <div class="baslik">
                <h1>YORUM EKLE</h1></div>
            
		</form>	
		<div class="container">
			<div class="düzen">
				<form action="" method="post">
					<table class="tablo">
						<tr>
							<td>İSİM</td>
							<td><input type="text" name="isim" class="form-düzen" ></td>
						</tr>
						
						<tr>
							<td>YORUM</td>
							<td><input type="text" name="yorum" class="form-düzen" ></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="ekleme"  type="submit" value="EKLE"></td>
						</tr>
						
					</table>
					
				</form>
				<?php
					if($_POST) { //post kontrolü
						$isim=$_POST['isim'];//değerleri değişkenlere attım.
						$yorum=$_POST['yorum'];
						
						if($isim<>"" && $yorum<>""){//degiskenlerin dolu olup olmadığı kontrol ettim.
							if($baglanti->query("insert into yorum1(isim,yorum) values ('$isim','$yorum')"))//ekleme sorgusunu yazdım
							{
								echo "Ekleme Başarılı..";
							}
							else
							{
								echo "Ekleme Başarısız.. ";
							}
						}						
					}
				?>
			</div>
			<div class="düzen">
				<table class="tablo">
					<tr>
					
						<th> NO  </th>
						<th> İSİM </th>
						<th> YORUM </th>
						
					</tr>
					<?php 
						$sorgu = $baglanti->query("SELECT * FROM yorum1"); //  tablodaki tüm verileri çektim.
						while ($sonuc=$sorgu->fetch(PDO::FETCH_ASSOC)){
							$id=$sonuc['id'];
							$isim=$sonuc['isim'];
							$yorum=$sonuc['yorum'];
						
						
					?>
							<tr>
								<td><?php echo $id;?></td>
								<td><?php echo $isim;?></td>
								<td><?php echo $yorum;?></td>
								
								<td><a href="düzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">DÜZENLE</a></td>
								<td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">SİL</a></td>
							</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>