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
                    <h1 class="page-header">Hakkımda Yazısı Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from hakkimda where hakkimda_id=".$id;
                            //$db->data = array( $id );

                            $hakkimnda = $db->select(1);

                            if ( $hakkimnda == false ) {
                                header("location:index.php");exit();
                            }

                            $hakkimda = $hakkimnda->hakkimda_detay;

                            if (pisset()) {
                                $hakkimda_yazi = post("hakkimda_yazi");
                                if (  $hakkimda_yazi=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli</div>';
                                }else{
                                    $db->sql = "insert into hakkimda set hakkimda_detay=?";
                                    $db->data = array($hakkimda);
                                    $ekle = $db->insert();
                                    if ( $ekle ) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Bilgiler Eklendi</div>';
                                        header("Refresh:0");
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Başarısız </strong><br> Bilgiler Eklenemedi</div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Hakkımda bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Hakkımda Detay</label>
                                                    <textarea name="hakkimda_yazi" id=""  rows="3" class="form-control ckeditor" ><?=$hakkimda; ?></textarea>
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
