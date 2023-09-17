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
                    <h1 class="page-header">İçerik Ekle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            if (isset($_POST['submit'])) {

                                     
                            // Check if file is uploaded
                            if(isset($_FILES['file'])) {

                                $target_dir =  "../public/uploads/";
                                $target_file = $target_dir . basename($_FILES["file"]["name"]);

                                if (!file_exists($target_dir)) {
                                echo "Hedef klasör bulunamadı!";
                                exit;
                            }
                                    
                            // Move uploaded file to target directory
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                echo "Dosya başarıyla yüklendi.";
                            } else {
                                echo "Dosya test hatası.";
                                exit; // Exit the script if file upload fails
                            }

                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);

                            $tarih = date("Y-m-d");
                            $icerik_kategori = $_POST["icerik_kategori"];
                            $icerik_baslik = $_POST["icerik_baslik"];
                            $icerik_aciklama = $_POST["icerik_aciklama"];
                            $icerik_detay = $_POST["icerik_detay"];
                                                        
                            $allowed_extensions = array('jpg', 'png', 'jpeg');
                            $allowed_mime_types = array('image/jpeg', 'image/png');

                            $filename = $_FILES['file']['name'];
                            $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                            $file_mime_type = $_FILES['file']['type'];

                            if (empty($icerik_baslik) || !in_array($file_extension, $allowed_extensions) || !in_array($file_mime_type, $allowed_mime_types)) {
                                echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli ve Yüklediğiniz görselin JPG, PNG ve JPEG dosyası olduğundan emin olun!</div>';
                            } else {
                                $db->sql = "insert into icerik set icerik_baslik=?,icerik_aciklama=?,icerik_detay=?,icerik_kategori_id=?,tarih=?, image=?";
                                $db->data = array($icerik_baslik,$icerik_aciklama,$icerik_detay,$icerik_kategori,$tarih, $filename);
                                $ekle = $db->insert();
                                if ( $ekle ) {
                                    echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Bilgiler Eklendi</div>';
                                    header("Refresh:0");
                                } else {
                                    echo '<div class="alert alert-danger"><strong>Başarısız </strong><br> Bilgiler Eklenemedi</div>';
                                }
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
                                                    <label>İçerik başlık</label>
                                                    <input class="form-control" name="icerik_baslik">
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Açıklama</label>
                                                    <textarea name="icerik_aciklama" id="" rows="3"
                                                        class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Detay</label>
                                                    <textarea name="icerik_detay" id="" rows="3"
                                                        class="form-control ckeditor"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Öne Çıkan Görsel</label>
                                                    <input type="file" name="file" id="fileToUpload">
                                                </div>
                                                <input type="submit" name="submit" value="Ekle" class="btn btn-info">
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