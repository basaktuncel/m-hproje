<?php


$servername = "localhost";//veritabanına erişim bilgileri
 $username = "root";
 $password = "";
 // Veritabanı bağlantısı
try {
    @$baglanti = new PDO("mysql:host=$servername;dbname=yorum", $username, $password);
 
  @$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Baglantı Başarılı."; 
    }
catch(PDOException $e)
    {
    echo "Baglantı yapılamadı.: " . $e->getMessage();
    }
@$baglanti->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");// 

?>
