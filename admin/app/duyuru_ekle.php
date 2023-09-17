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
                    <h1 class="page-header">Duyuru Ekle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                        <?php 
                            if (pisset()) {
                                $tarih = date("Y-m-d");
                                $duyuru_kategori = post("duyuru_kategori");
                                $duyuru_baslik = post("duyuru_baslik");
                                $duyuru_aciklama = post("duyuru_aciklama");
                                $duyuru_detay = post("duyuru_detay");
                                if (  $duyuru_baslik=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br>  Duyuru Başlık Gerekli</div>';
                                }else{
                                    $db->sql = "insert into duyuru set duyuru_baslik=?,duyuru_aciklama=?,duyuru_detay=?,duyuru_kategori_id=?,tarih=?";
                                    $db->data = array($duyuru_baslik,$duyuru_aciklama,$duyuru_detay,$duyuru_kategori,$tarih);
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
                                    duyuru bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="icerik_kategori">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        // $kategoriler=0;
                                                        $db->sql = " select * from kategori ";
                                                        $kategoriler = $db->select();
                                                        if ( $kategoriler != false ) {
                                                            foreach ($kategoriler as $key => $value) {
                                                                echo '<option value="'. $value->kategori_id .'">'. $value->kategori_baslik .'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Duyuru başlık</label>
                                                    <input class="form-control" name="duyuru_baslik">
                                                </div>
                                                <div class="form-group">
                                                    <label>Duyuru Açıklama</label>
                                                    <textarea name="duyuru_aciklama" id=""  rows="3" class="form-control" ></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Duyuru Detay</label>
                                                    <textarea name="duyuru_detay" id=""  rows="3" class="form-control ckeditor" ></textarea>
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
