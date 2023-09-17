<?php 

if ( !defined("ADMIN") ) { die("Kullanıcı Girişi Yapın.."); }

if ( !get("id") ) {
	header("location:index.php");exit();
}

$id = (int)get("id");

$db->sql = "select * from duyuru where duyuru_id=?";
$db->data = array($id);

$duyuru = $db->select(1);

if ( $duyuru == false ) {
	header("location:index.php");exit();
}

$db->sql = "delete from duyuru where duyuru_id=?";
$db->data = array( $id );

$sil = $db->delete();

if ( $sil == true ) {
	header("location:index.php?url=duyurular&islem=silindi");
}else{
	header("location:index.php?url=duyurular&islem=silinemedi");
}
exit();