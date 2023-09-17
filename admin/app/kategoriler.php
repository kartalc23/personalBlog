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
                    <h1 class="page-header">Kategoriler</h1>
                        <?php 
                            $db->sql = " select * from kategori ";
                            $kategoriler = $db->select();
                            if ($kategoriler == false) {
                                echo '<p>Kategori Bulunamadı</p>';
                            }else {    
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tüm Kategoriler
                            </div>
                            <div class="panel-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Kategori Başlık</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                                foreach ($kategoriler as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?=$no++; ?></td>
                                                <td><?php echo $value->kategori_baslik; ?></td>
                                                <td>
                                                    <a href="index.php?url=kategori_guncelle&id=<?=$value->kategori_id; ?>" class="btn btn-warning">Düzelt</a>
                                                    <a href="index.php?url=kategori_sil&id=<?=$value->kategori_id; ?>" class="btn btn-danger">Sil</a>
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
