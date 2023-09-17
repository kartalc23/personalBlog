<?php
    require_once "inc/page_header.php";
?>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
               <?php 
                require_once "inc/header.php";
                require_once "inc/left_sidebar.php";
               ?>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                if ($_SESSION["uye_yetki"]=="admin"){
                            ?>
                            <h1 class="page-header">Ayarlar</h1>          
                            <?php 
                            }else {
                                echo '<h1 class="page-header text-danger">UYARI!</h1>';
                                echo '<p>Bu sayfayı görmek için yetkiniz yok!</p>';   
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<?php 
    require_once "inc/footer.php";
?>
