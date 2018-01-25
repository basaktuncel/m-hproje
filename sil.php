<?php
	if ($_GET)
	{
		include("baglan.php");
		
		if ($baglanti->query("DELETE FROM yorum1 WHERE id =".(int)$_GET['id']))
		{
			header("location:ekle.php");
		}
	}
?>