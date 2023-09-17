<?php
ob_start();

require_once 'system/const.php';
require_once 'system/functions.php';
require_once 'system/database.php';

if (get("url")) {

	$file = "app/".get("url").".php";

}else{

	$file = 'app/anasayfa.php';

}

if (file_exists($file)) {
	require_once $file;
}else{
	echo "Dosya Bulunamadı..";
	exit();		
}

ob_end_flush();