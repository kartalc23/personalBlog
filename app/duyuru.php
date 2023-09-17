<head>
  <title>
    ... | DUYURULAR
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
                <h2>DUYURULAR</h2>
              </div>
              <div class="bubble-line" style="visibility: hidden;"></div>
            </div>
          </article>


          <?php 
            $db->sql = "select * from duyuru order by duyuru_id desc limit 10";
            $anasayfa_duyurular = $db->select();
            if ( $anasayfa_duyurular == false) {
            ?>
            <div class="kutu"><p><div class="container">Duyuru bulunamadı</div></p></div>
            <?php
            }else {
            foreach ($anasayfa_duyurular as $key => $value) {
            ?>


            <article class="content-item">
              <div class="entry-media">
                <div class="post-ribbon">
                  <i class="fa fa-star"></i>
                </div>
                <div class="post-title">
                  <h2><a href="index.php?url=duyuru_icerik&id=<?=$value->duyuru_id; ?>"><?=$value->duyuru_baslik; ?></a></h2>
                  <div class="entry-date">
                    <ul>
                      <li><?=$value->tarih;?></li>
                    </ul>
                  </div>
                </div>
                <div class="post-content">
                  <p>
                  <?=$value->duyuru_aciklama; ?>
                  </p>
                </div>
                <div class="bubble-line"></div>
                <div class="post-footer">
                  <div class="row">
                    <div class="col-sm-5">
                      <a href="index.php?url=duyuru_icerik&id=<?=$value->duyuru_id; ?>" class="button">Okumaya devam et</a>
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