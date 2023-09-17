<?php

   if ( !defined("ADMIN")) {
       die("Lütfen Giriş Yaparak Kimliğnizi Doğrulayın!");
   }

   session_destroy();
   header("location:index.php?url=login");

?>