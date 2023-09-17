<?php 

if ( !defined("ADMIN") ) { die("Kullanıcı Girişi Yapın.."); }

if ( !get("id") ) {
	header("location:index.php");exit();
}

$id = (int)get("id");

$db->sql = "select * from hakkimda where hakkimda_id=?";
$db->data = array($id);

$icerik = $db->select(1);

if ( $icerik == false ) {
	header("location:index.php");exit();
}

$db->sql = "delete from hakkimda where hakkimda_id=?";
$db->data = array( $id );

$sil = $db->delete();

if ( $sil == true ) {
	header("location:index.php?url=hakkimda_sil&islem=silindi");
}else{
	header("location:index.php?url=hakkimda_sil&islem=silinemedi");
}
exit();