<?php

include("baglanti.php");

$username_error = "";
$password_error = "";


if (isset($_POST["consumerlogin"])) { //eğer submit butonuna basılıp da submit değeri gittiyse öyle işlemlere başlar

    //Username sorgulama basamakları
    if (empty($_POST["username"])) {
        $username_error = "This field is required.";
    } 
     

    else {  //Bütün kontrollerden geçtiyse form elemanından veriyi alıp bir değişken içerisine attım
        $username=$_POST["username"];
    }


      //Parola sorgulama basamakları
    if(empty($_POST["password"])) {
        $password_error = "This field is required" ;
      }

    else{
        $password=($_POST["password"]) ; 

    }
}
    
    if(isset($username) && isset($password) ) { //Geçersiz format girilince, doğrusunu girdirip değeri insertlemeyi düzeltmek için gerekli
        $secim = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$username'" ; //girilen username, databaseimde kullanici_adi columnumda geçiyor mu geçmiyor mu bakıyorum
        $calistir=mysqli_query($baglanti,$secim) ; //db'ye bağlandım
        $numOfRecords = mysqli_num_rows($calistir) ; //kayıt kaç kere var

        if($numOfRecords>0) //kayıt bulunduysa 
        {
            $ilgilikayit = mysqli_fetch_assoc($calistir) ; //mevcut elemanın tüm bilgilerini getirir
            $hashlisifre=$ilgilikayit["parola"] ;  //hashli password'e ulaşıp atadım

            if(password_verify($password,$hashlisifre))  //girilen şifre ile hashli sifre uyuşuyor mu kontrol ediyorum
            {
                session_start(); //oturum başlatıldı
                $_SESSION["username"]=$ilgilikayit["kullanici_adi"] ;
                $_SESSION["email"]=$ilgilikayit["email"] ;
                header("location:consumerprofile.php") ; //üye girişi yapıldıktan sonra yönlendirilecek sayfa

            }

            else {
                echo '<div class="alert alert-danger" role="alert">
                Incorrect password
                </div>' ;
            }


        }

        else {  //kayıt bulunamadıysa
            echo '<div class="alert alert-danger" role="alert">
            Incorrect username
            </div>' ;



        }

}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<body>
<h1 style=" margin-top:+15px; margin-left:+10px" ;>Login</h1>
    <div class="container p-5">
        <div class="card p-5">
            <form action="consumerlogin.php" method="POST">

                <div class="mb-3">
                   <label for="exampleInputUsername1" class="form-label">Username</label>
                    <input type="text" class="form-control 

                    <?php  //Hata varsa error almanı öyle sağlar bu classi eklemek bu şekilde
                      if(!empty($username_error)) {
                        echo "is-invalid" ;
                      }

                    ?>
                    "id="exampleInputUsername1" name="username">
                    <div class="invalid-feedback">
                        <?php
                        echo $username_error; //php ile hata mesajını dinamikleştirdim.
                        ?>
                        <!-- //iki classa sahip oldu. 1'i form-control,diğeri is-invalid(bootstrap class'i). Çünkü hatali giriş yapildiğinda uyariyi göstermesi için bu class'a ihtiyacim var. -->
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control
                    
                    <?php
                      if(!empty($password_error)) {
                        echo "is-invalid" ;
                      }
                    ?>
                    
                    " id="exampleInputPassword1" name="password">
                    <div class="invalid-feedback">
                        <?php
                        echo $password_error ; 
                        ?>
                    </div>
                </div>

                 
                <button type="submit" name="consumerlogin" class="btn btn-primary">Log in</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>