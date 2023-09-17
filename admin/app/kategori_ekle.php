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
                    <h1 class="page-header">Kategori Ekle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            if (pisset()) {                                
                                $kategori_baslik = post("kategori_baslik");
                                if ( $kategori_baslik == "") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> Kategori Başlık Gerekli <a href="#" class="alert-link">Yeni ekle</a></div>';
                                }else{
                                    $db->sql = " insert into kategori set kategori_baslik=? ";
                                    $db->data = array($kategori_baslik);
                                    $ekle = $db->insert();
                                    if ( $ekle ) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Bilgiler Eklendi <a href="#" class="alert-link">Yeni ekle</a></div>';
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Başarısız </strong><br> Bilgiler Eklenemedi <a href="#" class="alert-link">Yeni ekle</a></div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Kategori bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kategori başlık</label>
                                                    <input class="form-control" name="kategori_baslik">
                                                </div>
                                                <input type="submit" value="Ekle" class="btn btn-info">
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
<?php 
require 'inc/footer.php';
?>
