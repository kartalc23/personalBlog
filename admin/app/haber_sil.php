<?php 

if ( !defined("ADMIN") ) { die("Kullanıcı Girişi Yapın.."); }

if ( !get("id") ) {
	header("location:index.php");exit();
}

$id = (int)get("id");

$db->sql = "select * from haber where haber_id=?";
$db->data = array($id);

$haber = $db->select(1);

if ( $haber == false ) {
	header("location:index.php");exit();
}

$db->sql = "delete from haber where haber_id=?";
$db->data = array( $id );

$sil = $db->delete();

if ( $sil == true ) {
	header("location:index.php?url=haberler&islem=silindi");
}else{
	header("location:index.php?url=haberler&islem=silinemedi");
}
exit();