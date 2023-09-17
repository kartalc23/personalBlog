<?php
    require_once "inc/page_header.php";
?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
               <?php 
                require_once "inc/header.php";
                require_once "inc/left_sidebar.php";
               ?>
            </nav>

            <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hakkımda Yazısı Ekle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                        <?php 
                            if (pisset()) {
                                $hakkimda_yazi = post("hakkimda_yazi");
                                if (  $hakkimda_yazi=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli</div>';
                                }else{
                                    $db->sql = "insert into hakkimda set hakkimda_detay=?";
                                    $db->data = array($hakkimda_yazi);
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
                                            <form role="form" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <textarea name="hakkimda_yazi" id=""  rows="3" class="form-control ckeditor" ></textarea>
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
        <!-- /#wrapper -->
<?php 
    require_once "inc/footer.php";
?>
