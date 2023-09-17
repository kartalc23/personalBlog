<style>

</style>

<section class="section-content ">
    <div class="container">
        <div class="row " style="height: 500px;">
            <div class="col-sm-12 col-md-12" style="margin-left: 15px;">
                <?php 
              $db->sql = "SELECT * from icerik order by icerik_id desc limit 10";
              $anasayfa_icerikler = $db->select();
              if ( $anasayfa_icerikler == false) {
              ?>
                <h1 class="err-text">BLOG YAZISI BULUNAMADI!</h1>
                <?php
              }else {
              ?>

                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
              foreach ($anasayfa_icerikler as $key => $value) { 
                // $id = (int)get("id");
                // $db->sql = "select * from kategori where kategori_id=".$id;
                // $kategori_baslik = $kategori->kategori_baslik;     
              ?>

                        <div class="swiper-slide">
                            <a href="index.php?url=icerik&id=<?=$value->icerik_id; ?>">
                                <div class="content">
                                    <div class="content-img">
                                        <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>" alt="">
                                        <div class="content-detail">
                                            <h1><a
                                                    href="index.php?url=icerik&id=<?=$value->icerik_id; ?>"><?=$value->icerik_baslik; ?></a>
                                            </h1>
                                            <div class="content-tags">
                                                <p><?=$value->tarih; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php
              }
              }
              ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>
        <?php 
          require_once 'sidebar.php';
        ?>
</section>
