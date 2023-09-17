<?php 
require_once 'inc/page_header.php';
require_once 'inc/header.php';
?>

<head>
    <title>
        Kategori
    </title>
</head>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <?php 
              if (!get("id")) {
                header("location:index.php");exit();
              }
              $id = (int)get("id");

              $db->sql = "SELECT * from icerik where icerik_kategori_id=? order by icerik_id desc";

              $db->data = array( $id );
              $kategori_icerikler = $db->select();

              if ( $kategori_icerikler==false ) {
                ?>
                <h1 class="err-text" style="font-size: 16px; padding: 20px 0;">BLOG YAZISI BULUNAMADI!</h1>
                <?php
            }else {
            foreach ($kategori_icerikler as $key => $value) {
                $db->sql = "SELECT * from kategori where kategori_id=?";
                $db->data = array( $value->icerik_kategori_id );
                $kategori = $db->select(1);
                $kategori_baslik = $kategori->kategori_baslik;
            ?>
                <article class="content-item">
                    <div class="entry-media">
                        <div class="post-ribbon">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="post-title">
                            <h2><a
                                    href="index.php?url=icerik&id=<?=$value->icerik_id; ?>"><?=$value->icerik_baslik; ?></a>
                            </h2>
                            <div class="entry-date">
                                <ul>
                                    <li><a href="#"><?=$kategori_baslik;?></a></li>
                                    <li><?=$value->tarih;?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-content">
                            <div class="container gallery">
                                <div class="row">
                                    <div class="col-xs-12 photos">
                                        <a class="photos">
                                            <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>"
                                                alt="image" /></a>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <?=$value->icerik_aciklama; ?>
                            </p>
                        </div>
                        <div class="bubble-line"></div>
                        <div class="post-footer">
                            <div class="row">
                                <div class="col-sm-5">
                                    <a href="index.php?url=icerik&id=<?=$value->icerik_id; ?>" class="button">Okumaya
                                        devam et</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <?php
					}
				}
				?>
            </div>


            <?php 
          require_once 'inc/sidebar_right.php';
        ?>
        </div>
    </div>
</section>


<?php 
require_once 'inc/footer.php';
require_once 'inc/page_footer.php';
?>