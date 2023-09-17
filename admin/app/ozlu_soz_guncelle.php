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
                    <h1 class="page-header">Özlü söz Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from ozlu_soz where ozlu_soz_id=".$id;
                            //$db->data = array( $id );

                            $ozlu_soz = $db->select(1);

                            if ( $ozlu_soz == false ) {
                                header("location:index.php");exit();
                            }

                            $ozlu_soz = $ozlu_soz->ozlu_soz_baslik;
                        
                            if (pisset()) {
                                $ozlu_soz = post("ozlu_soz_baslik");
                                if ( $ozlu_soz=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> Özlü Söz Gerekli</div>';
                                }else{
                                    $db->sql = "update ozlu_soz set ozlu_soz_baslik=?";
                                    $db->data = array($ozlu_soz);
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
                                    Özlü söz
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Özlü söz</label>
                                                    <input class="form-control" name="ozlu_soz_baslik" value="<?=$ozlu_soz; ?>">
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
