<?php  
  if ( !get("id") ) {
    header("location:index.php");exit();
  }
  
  $id = (int)get("id");

  $db->sql = "select * from  icerik where icerik_id=".$id;
  //$db->data = array( $id );
  $icerik = $db->select(1);

  if ( $icerik== false) {
    header("location:index.php");exit();
  }

  $hit = $icerik->hit;
  $hit++;
  $db->sql = "update icerik set hit=".$hit." where icerik_id=".$id;
  //$db->data = array($hit,$id);
  $db->insert();
?>


<head>
    <title>
        <?=$icerik->icerik_baslik; ?>
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
                                <a style="cursor: pointer;"><?=$icerik->icerik_baslik; ?></a>
                            </h2>
                            <div class="entry-date">
                                <ul>
                                    <li><?php echo $icerik->tarih; ?></li>
                                    <li>Görüntülenme <?=$hit; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content">
                            <img src="<?php echo URL;?>/public/uploads/<?=$icerik->image; ?>" alt="not image" />
                            <p>
                                <?=$icerik->icerik_aciklama; ?>
                            </p>

                            <p>
                                <?=$icerik->icerik_detay; ?>
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
                            <h2><a href="javascript:;">Önerilen İçerikler</a></h2>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content related">
                            <div class="row">
                                <?php 
                                $db->sql = "select * from icerik order by icerik_id desc limit 3";
                                $anasayfa_icerikler = $db->select();
                                if ( $anasayfa_icerikler == false) {
                                ?>
                                <h1 class="err-text">BLOG YAZISI BULUNAMADI!</h1>
                                <?php
                                }else {
                                  
                                  foreach ($anasayfa_icerikler as $key => $value) {
                                ?>

                                <div class="col-sm-6 col-md-4">
                                    <div class="related-post">
                                        <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>"" alt=" related
                                            post" />
                                        <h4><a
                                                href="index.php?url=icerik&id=<?=$value->icerik_id; ?>"><?=$value->icerik_baslik; ?></a>
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