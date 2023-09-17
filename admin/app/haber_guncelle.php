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
                    <h1 class="page-header">Haber Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from haber where haber_id=".$id;
                            //$db->data = array( $id );

                            $haber = $db->select(1);

                            if ( $haber == false ) {
                                header("location:index.php");exit();
                            }

                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);

                            $haber_baslik = $haber->haber_baslik;
                            $haber_aciklama = $haber->haber_aciklama;
                            $haber_detay = $haber->haber_detay;
                            $haber_kategori_id = $haber->haber_kategori_id;
                            $image = $haber->image;

                            if (isset($_POST['submit'])) { 


                                if(isset($_FILES['file'])) {

                                    $target_dir =  "../public/uploads/";
                                    $target_file = $target_dir . basename($_FILES["file"]["name"]);

                                    if (!file_exists($target_dir)) {
                                    echo "Hedef klasör bulunamadı!";
                                    exit;
                                    }
                                    
                                    // Move uploaded file to target directory
                                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Dosya Güncellendi</div>';
                                    } else {
                                        echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> Lütfen tüm bilgilerin doldurulduğundan emin olun!</div>';
                                        exit; // Exit the script if file upload fails
                                    }
                                } else {
                                    echo "Dosya test2 hatası.";
                                    exit; // Exit the script if file upload fails
                                }
                            
                                $filename = $_FILES['file']['name'];
                                $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                                $file_mime_type = $_FILES['file']['type'];
                                
                                $allowed_extensions = array('jpg', 'png', 'jpeg');
                                $allowed_mime_types = array('image/jpeg', 'image/png');
                                
                                $tarih = date("Y-m-d");
                                $haber_kategori = $_POST["haber_kategori"];
                                $haber_baslik = $_POST["haber_baslik"];
                                $haber_aciklama = $_POST["haber_aciklama"];
                                $haber_detay = $_POST["haber_detay"];

                               if (empty($haber_baslik) || !in_array($file_extension, $allowed_extensions) || !in_array($file_mime_type, $allowed_mime_types)) {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli ve Yüklediğiniz görselin JPG, PNG ve JPEG dosyası olduğundan emin olun!</div>';
                                } else {
                                    $data = array($haber_baslik,$haber_aciklama,$haber_detay,$haber_kategori,$tarih,$filename,$id);
                                    $db->sql = "UPDATE haber SET haber_baslik=?, haber_aciklama=?, haber_detay=?, haber_kategori_id=?, tarih=?, image=? WHERE haber_id=?";
                                    $db->data = $data;

                                    // Veritabanı güncelleme işlemini gerçekleştirin ve sonucunu kontrol edin
                                    $update_result = $db->update();
                                    if ($update_result) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Değişiklikler Eklendi</div>';
                                        header("Refresh:0");
                                    } else {
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
                                            <form role="form" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="haber_kategori">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        $db->sql = " select * from kategori ";
                                                        $kategoriler = $db->select();
                                                        if ( $kategoriler != false ) {

                                                            foreach ($kategoriler as $key => $value) {
                                                                if( $haber_kategori_id == $value->kategori_id){
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
                                                    <input class="form-control" name="haber_baslik"
                                                        value="<?=$haber_baslik; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Açıklama</label>
                                                    <textarea name="haber_aciklama" id="" rows="3"
                                                        class="form-control"><?=$haber_aciklama; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Detay</label>
                                                    <textarea name="haber_detay" id="" rows="3"
                                                        class="form-control ckeditor"><?=$haber_detay; ?></textarea>
                                                </div>

                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <img src="<?php echo URL;?>/public/uploads/<?=$image; ?>" width="50"
                                                        height="50" alt="">
                                                    <div class="group" style="padding: 0 20px;">
                                                        <label>Öne Çıkan Görsel</label>
                                                        <input type="file" name="file">
                                                    </div>
                                                </div>
                                                <input type="submit" name="submit" value="Güncelle"
                                                    class="btn btn-info">
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