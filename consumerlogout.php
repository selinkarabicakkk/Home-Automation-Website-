<?php

session_start(); //Oturum başlatıldı

$_SESSION=array();  //Verilerin hepsi boşaltılıyor
session_destroy(); 
header("location:consumerlogin.php") ; //Oturumdan çıkış yapınca consumerlogin sayfasına geri dönüldü

 

?>