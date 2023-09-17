<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>


    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/login.css">
</head>

<body>




    <div class="login">
        <div class="text-side">
            <h1>Bilişim Teknolojileri</h1>
            <p>Tüketim için değil, üretim için Bilişim</p>
        </div>
        <div class="form-side">
            <form id="login-form" class="form bg-primary" action="index.php?url=login" method="post">
                <h3 class="text-center text-white mb-4" style="font-size: 30px;">Login</h3>
                <div class="form-group">
                    <label for="username" class="text-white mb-2">Username:</label><br>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="text-white mb-2">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="submit-btn">
                    <input type="submit" name="submit" class="btn btn-outline-white" value="Giriş">
                </div>

                <div>
                    <?php

                     if (pisset()) {

                                    $username = post("username");
                                    $password = post("password");
                                    //echo 'girdiğiniz şifre :: '.$password ."<br>";
                                    $npassword = md5($password);
                                    //echo 'girdiğiniz şifre (güvenli) :: '.$npassword ."<br>";

                                    if ($username=="" or $password=="") {
                                        echo '<div class="alert alert-warning"> Lütfen Bilgileri Doldurunuz<div>';
                                    }else{
                                        $db-> sql = " select * from uye where uye_kullanici = ? and uye_sifre = ? and uye_onay = ? and (uye_yetki = ? or uye_yetki = ?)";
                                        $db->data = array($username, $npassword, 1, "admin", "editor");
                                        $uye = $db->select(1);

                                        if ($uye ==true) {
                                            echo '<div class="alert alert-success">Giriş Başarılı<div>';
                                        $_SESSION['admin']=true;
                                        $_SESSION["uye_adsoyad"] = $uye->uye_adsoyad;
                                        $_SESSION["uye_yetki"] = $uye->uye_yetki;
                                        header("location:index.php");
                                        exit();
                                        }
                                        else {
                                            echo '<div class="alert alert-danger"> Kullanıcı adı veya Şifre Hatalı!<div>';
                                        }
                                    }
                                }
                                ?>

                </div>
            </form>
        </div>
    </div>


</body>

</html>
