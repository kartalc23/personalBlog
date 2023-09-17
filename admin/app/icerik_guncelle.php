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
                    <h1 class="page-header">İçerik Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from icerik where icerik_id=".$id;
                            //$db->data = array( $id );

                            $icerik = $db->select(1);

                            if ( $icerik == false ) {
                                header("location:index.php");exit();
                            }

                            $icerik_baslik = $icerik->icerik_baslik;
                            $icerik_aciklama = $icerik->icerik_aciklama;
                            $icerik_detay = $icerik->icerik_detay;
                            $icerik_kategori_id = $icerik->icerik_kategori_id;
                            $image = $icerik->image;


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

                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);
                            
                                $filename = $_FILES['file']['name'];
                                $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                                $file_mime_type = $_FILES['file']['type'];
                                

                                $allowed_extensions = array('jpg', 'png', 'jpeg');
                                $allowed_mime_types = array('image/jpeg', 'image/png');

                                $tarih = date("Y-m-d");
                                $icerik_kategori = $_POST["icerik_kategori"];
                                $icerik_baslik = $_POST["icerik_baslik"];
                                $icerik_aciklama = $_POST["icerik_aciklama"];
                                $icerik_detay = $_POST["icerik_detay"];

                                if (empty($icerik_baslik) || !in_array($file_extension, $allowed_extensions) || !in_array($file_mime_type, $allowed_mime_types)) {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli ve Yüklediğiniz görselin JPG, PNG ve JPEG dosyası olduğundan emin olun!</div>';
                                } else {
                                    $db->sql = "update icerik set icerik_baslik=?,icerik_aciklama=?,icerik_detay=?,icerik_kategori_id=?,tarih=?,image=? where icerik_id=?";
                                    $db->data = array($icerik_baslik,$icerik_aciklama,$icerik_detay,$icerik_kategori,$tarih,$filename,$id);
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
                                            <form role="form" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="icerik_kategori">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        $db->sql = " select * from kategori ";
                                                        $kategoriler = $db->select();
                                                        if ( $kategoriler != false ) {

                                                            foreach ($kategoriler as $key => $value) {
                                                                if( $icerik_kategori_id == $value->kategori_id){
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
                                                    <input class="form-control" name="icerik_baslik"
                                                        value="<?=$icerik_baslik; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Açıklama</label>
                                                    <textarea name="icerik_aciklama" id="" rows="3"
                                                        class="form-control"><?=$icerik_aciklama; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Detay</label>
                                                    <textarea name="icerik_detay" id="" rows="3"
                                                        class="form-control ckeditor"><?=$icerik_detay; ?></textarea>
                                                </div>

                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <img src="<?php echo URL;?>/public/uploads/<?=$image; ?>" width="50"
                                                        height="50" alt="">
                                                    <div class="group" style="padding: 0 20px;">
                                                        <label>Öne Çıkan Görsel</label>
                                                        <input type="file" name="file">
                                                    </div>
                                                </div>

                                                <input type="submit" value="Güncelle" name="submit"
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