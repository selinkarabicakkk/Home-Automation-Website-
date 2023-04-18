<?php

include("baglanti.php");

$username_error = "";
$email_error = "";
$password_error = "";
$passwordrpt_error = "";


if (isset($_POST["submit"])) { //eğer submit butonuna basılıp da submit değeri gittiyse öyle işlemlere başlar

    //Username sorgulama basamakları
    if (empty($_POST["username"])) {
        $username_error = "This field is required.";
    } 
    
   
    else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["username"])) { //phpzag sayfasından bu kısmı aldım
        $username_error="Username must consist of upper and lower case letters and numbers." ;
    } 


    else {  //Bütün kontrollerden geçtiyse form elemanından veriyi alıp bir değişken içerisine attım
        $username=$_POST["username"];
    }


    //Email sorgulama basamakları 
    if(empty($_POST["email"])) {  
        $email_error="This field is required." ;

    }

    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { //W3schools'tan aldım
        $email_error = "Invalid email format.";
      }

    else {  //Bütün kontrollerden geçtiyse form elemanından veriyi alıp bir değişken içerisine attım
        $email=$_POST["email"];
     }



      //Parola sorgulama basamakları
    if(empty($_POST["password"])) {
        $password_error = "This field is required" ;
      }

    else if(mb_strlen($_POST["password"])<6) {
        $password_error = "Password must be at least 6 characters." ;
      }

    else{
        $password=password_hash($_POST["password"],PASSWORD_DEFAULT) ; //Database'ine kriptogtafik işler şifreni, güvenliği sağlar 
      }


      //Parola tekrarı sorgulama basamakları
    if(empty($_POST["passwordrpt"])) {
        $passwordrpt_error = "This field is required" ;
      }

    else if($_POST["password"]!=$_POST["passwordrpt"]) {
        $passwordrpt_error = "Passwords do not match" ;

    }  

    else {
        $passwordrpt=$_POST["parolarpt"] ;
    }


    
    if(isset($username) && isset($email) && isset($password) ) { //Geçersiz format girilince, doğrusunu girdirip değeri insertlemeyi düzeltmek için gerekli



    $ekle = "INSERT INTO kullanicilar (kullanici_adi, email, parola) VALUES('$username', '$email', '$password')" ; //kullanicilar table'ına eklemek için columnlarini belirttin (id belirtmedin autoincrement çünkü,kayit_tarihi de otomatik oluşuyor kaydolduğun gün)

    $calistirekle = mysqli_query($baglanti, $ekle);


    if ($calistirekle) {

        echo '<div class="alert alert-success" role="alert">
     The record has been successfully added.
 </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
     The record could not be added.
 </div>';
    }

    mysqli_close($baglanti);


} 
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<body>
<h1 style=" margin-top:+15px; margin-left:+10px" ;>Registration</h1>
    <div class="container p-5">
        <div class="card p-5">
            <form action="kayit.php" method="POST">

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
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control
                    
                    <?php
                      if(!empty($email_error)) {
                        echo "is-invalid" ;
                      }
                    ?>

                    " id="exampleInputEmail1" name="email">
                    <div class="invalid-feedback">
                        <?php
                        echo $email_error; 
                        ?>
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

                 
                <div class="mb-3">   <!-- Parola tekrar kismi -->
                    <label for="exampleInputPassword1" class="form-label">Password Repeat</label>
                    <input type="password" class="form-control 
                    
                    <?php
                      if(!empty($passwordrpt_error)) {
                        echo "is-invalid" ;
                      }

                    ?>
                    
                    "id="exampleInputPassword1" name="passwordrpt">
                    <div class="invalid-feedback">
                        <?php
                       echo $passwordrpt_error ;
                        ?>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>