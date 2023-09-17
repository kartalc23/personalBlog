


<head>
    <title>
        ... | HAKKIMDA
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
        <?php
           $db->sql = "select * from hakkimda";
            $hakkimdayazi = $db->select();
            if ( $hakkimdayazi == false) {
            ?>
            <h1 class="err-text">BLOG YAZISI BULUNAMADI!</h1> 
            <?php
            }else {
            foreach ($hakkimdayazi as $key => $value) {
            ?>

            <article class="content-item">


              <div class="entry-media">
                <div class="about-title">
                  <h2>HAKKIMIZDA</h2>
                </div>
                <div class="bubble-line"></div>
                <div class="post-content about">
                  <h6>
                  <?=$value->hakkimda_detay; ?>
                  </h6>
                </div>
              </div>
            </article>
          </div>

          <?php
            }
            }
            ?>


          <?php require_once 'inc/sidebar_right.php'?>
			<!---->
          </div>
        </div>
      </div>
    </section>






<?php 
require_once 'inc/footer.php';
require_once 'inc/page_footer.php';
?>