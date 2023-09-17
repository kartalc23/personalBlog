<?php  
  if ( !get("id") ) {
    header("location:index.php");exit();
  }
  
  $id = (int)get("id");

  $db->sql = "select * from  duyuru where duyuru_id=".$id;
  //$db->data = array( $id );
  $duyuru = $db->select(1);

  if ( $duyuru== false) {
    header("location:index.php");exit();
  }

?>


<head>
    <title>
        <?=$duyuru->duyuru_baslik; ?>
    </title>
</head>

<?php 
require 'inc/page_header.php';
require 'inc/header.php';
?>


<?php 

?>

<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <article class="content-item">
                    <div class="entry-media">
                        <div class="post-title">
                            <h2>
                                <a style="cursor: pointer;"><?=$duyuru->duyuru_baslik; ?></a>
                            </h2>
                            <div class="entry-date">
                                <ul>
                                    <li><?php echo $duyuru->tarih; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content">
                            <p>
                                <?=$duyuru->duyuru_aciklama; ?>
                            </p>

                            <p>
                                <?=$duyuru->duyuru_detay; ?>
                            </p>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-footer">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </article>
                <article class="content-item">
                    <div class="entry-media">
                        <div class="post-title">
                            <h2><a href="javascript:;">Önerilen Haberler</a></h2>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content related">
                            <div class="row">
                                <?php 
                                $db->sql = "select * from haber order by haber_id desc limit 3";
                                $anasayfa_haberler = $db->select();
                                if ( $anasayfa_haberler == false) {
                                ?>
                                <h1 class="err-text">Haber BULUNAMADI!</h1>
                                <?php
                                }else {
                                  
                                  foreach ($anasayfa_haberler as $key => $value) {
                                ?>

                                <div class="col-sm-6 col-md-4">
                                    <div class="related-post">
                                        <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>" alt="related post" />
                                        <h4><a
                                                href="index.php?url=haber&id=<?=$value->haber_id; ?>"><?=$value->haber_baslik; ?></a>
                                        </h4>
                                        <p><i class="fa fa-clock-o"></i> <?=$value->tarih;?></p>
                                    </div>
                                </div>
                                <?php
                                }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php 
                    require_once 'inc/yorum.php';
                ?>
            </div>
            <?php 
            require_once 'inc/sidebar_right.php';
            ?>
        </div>
    </div>
</section>



<?php 
require 'inc/footer.php';
require 'inc/page_footer.php';
?>