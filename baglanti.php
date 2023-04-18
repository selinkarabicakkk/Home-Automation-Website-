<?php

$host="localhost";
$kullanici="root"; //phpmyadmin değerleri
$parola="";        //phpmyadmin değerleri
$vt="login";  //vt=veritabanı

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);   //tanımlanmış fonk. , değerleri çekmemizi sağlayacak
mysqli_set_charset($baglanti,"UTF8"); //veritabanına eklenecek verilerin düzgün bir şekilde görüntülenmesini sağlar




?>