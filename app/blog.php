<head>
  <title>
    ... | YAZILAR
  </title>
</head>

<?php
		require_once 'inc/page_header.php';
		require_once 'inc/header.php';
	?>


   
   <section class="section-content">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-8">

          <article class="content-item">
            <div class="entry-media">
              <div class="about-title">
                <h2>YAZILAR</h2>
              </div>
              <div class="bubble-line" style="visibility: hidden;"></div>
            </div>
          </article>


          <?php 
            $db->sql = "select * from icerik order by icerik_id desc limit 10";
            $anasayfa_icerikler = $db->select();
            if ( $anasayfa_icerikler == false) {
            ?>
            <div class="kutu"><p><div class="container">içerik bulunamadı</div></p></div>
            <?php
            }else {
            foreach ($anasayfa_icerikler as $key => $value) {
            ?>


            <article class="content-item">
              <div class="entry-media">
                <div class="post-ribbon">
                  <i class="fa fa-star"></i>
                </div>
                <div class="post-title">
                  <h2><a href="index.php?url=icerik&id=<?=$value->icerik_id; ?>"><?=$value->icerik_baslik; ?></a></h2>
                  <div class="entry-date">
                    <ul>
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
                          <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>"" alt="image"
                        /></a>
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
                      <a href="index.php?url=icerik&id=<?=$value->icerik_id; ?>" class="button">Okumaya devam et</a>
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