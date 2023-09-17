<?php 
require 'inc/page_header.php'; 
?>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php 
        require 'inc/header.php'; 
        require 'inc/left_sidebar.php';
        ?>                
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Duyuru Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from duyuru where duyuru_id=".$id;
                            //$db->data = array( $id );

                            $duyuru = $db->select(1);

                            if ( $duyuru == false ) {
                                header("location:index.php");exit();
                            }

                            $duyuru_baslik = $duyuru->duyuru_baslik;
                            $duyuru_aciklama = $duyuru->duyuru_aciklama;
                            $duyuru_detay = $duyuru->duyuru_detay;
                            $duyuru_kategori_id = $duyuru->duyuru_kategori_id;

                            if (pisset()) {
                                $tarih = date("Y-m-d");
                                $duyuru_kategori = post("duyuru_kategori");
                                $duyuru_baslik = post("duyuru_baslik");
                                $duyuru_aciklama = post("duyuru_aciklama");
                                $duyuru_detay = post("duyuru_detay");
                                if ( $duyuru_kategori=="" and $duyuru_baslik=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli</div>';
                                }else{
                                    $db->sql = "update duyuru set duyuru_baslik=?,duyuru_aciklama=?,duyuru_detay=?,duyuru_kategori_id=?,tarih=? where duyuru_id=?";
                                    $db->data = array($duyuru_baslik,$duyuru_aciklama,$duyuru_detay,$duyuru_kategori,$tarih,$id);
                                    $guncelle = $db->update();
                                    if ( $guncelle ) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Değişiklikler Eklendi</div>';
                                        header("Refresh:0");
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Başarısız </strong><br> Değişiklikler Eklenemedi</div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    İçerik bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="duyuru_kategori">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        $db->sql = " select * from kategori ";
                                                        $kategoriler = $db->select();
                                                        if ( $kategoriler != false ) {

                                                            foreach ($kategoriler as $key => $value) {
                                                                if( $duyuru_kategori_id == $value->kategori_id){
                                                                    $selected = "selected";
                                                                }else{
                                                                    $selected ="";
                                                                }
                                                                echo '<option value="'. $value->kategori_id .'"'.$selected.'>'. $value->kategori_baslik .'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik başlık</label>
                                                    <input class="form-control" name="duyuru_baslik" value="<?=$duyuru_baslik; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Açıklama</label>
                                                    <textarea name="duyuru_aciklama" id=""  rows="3" class="form-control" ><?=$duyuru_aciklama; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Detay</label>
                                                    <textarea name="duyuru_detay" id=""  rows="3" class="form-control ckeditor" ><?=$duyuru_detay; ?></textarea>
                                                </div>
                                                <input type="submit" value="Güncelle" class="btn btn-info">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php 
require 'inc/footer.php';
?>
