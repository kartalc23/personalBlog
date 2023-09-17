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
                    <h1 class="page-header">Haberler</h1>
                    <?php 
                    $db->sql = " select * from haber order by haber_id desc ";
                    $haberler = $db->select();
                    if ( $haberler == false ) {
                        echo '<p>Haber Bulunamadı</p>';
                    }else{
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tüm Haberler
                            </div>
                            <div class="panel-body">
                                <?php 
                                if (get("islem")=="silindi") {
                                    echo '<div class="alert alert-success"><strong>Başarılı</strong> Bilgiler Silindi</div>';
                                }elseif (get("islem")=="silinemedi") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız</strong> Bilgiler Silinemedi</div>';
                                }
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Haber Başlık</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($haberler as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?=$no++; ?></td>
                                                    <td><?php echo $value->haber_baslik; ?></td>
                                                    <td>
                                                        <a href="index.php?url=haber_guncelle&id=<?=$value->haber_id; ?>" class="btn btn-info">Düzelt</a>
                                                        <a href="index.php?url=haber_sil&id=<?=$value->haber_id; ?>" class="btn btn-danger"onclick="return confirm('Silinecek Eminmisiniz ?');">Sil</a>
                                                    </td>
                                                </tr>
                                                <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
<?php 
    require_once "inc/footer.php";
?>
