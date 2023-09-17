<style>
@media (max-width: 996px) {
    .widget-content {
        display: block !important;
    }
}
</style>

<div class="col-sm-12 sidebar">
    <div class="widget col-md-12 col-sm-12">
        <h3 class="widget-title">Popüler Yazılar</h3>
        <div class="bubble-line"></div>

        <div class="widget-content" style="padding: 15px !important; display: flex;">
            <?php 
      $db->sql = "select * from icerik order by hit desc limit 4";
      $en_cok_gorunenler = $db->select(); if ( $en_cok_gorunenler != false ) {
      foreach ($en_cok_gorunenler as $key => $value) { ?>

            <div class="widget-recent " style="padding: 0 10px">
                <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>" alt="not image"
                    style="border-radius: 10px 10px 0 0;" />
                <div style="
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            border-radius: 0 0 10px 10px;
            height: 200px;
            margin-bottom: 30px;
          ">
                    <h4>
                        <a style="
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
              " href="index.php?url=icerik&id=<?php echo $value->icerik_id; ?>"><?php echo $value->icerik_baslik; ?></a>
                    </h4>
                    <span><?php echo $value->hit; ?> Okunma</span>
                    <p style="margin-top: 5px;"><?=$value->icerik_aciklama; ?></p>
                </div>
            </div>

            <?php
                }
                }
                ?>
        </div>
    </div>














    <div class="widget col-md-12 col-sm-12">
        <h3 class="widget-title">Popüler Haberler</h3>
        <div class="bubble-line"></div>

        <div class="widget-content" style="padding: 15px !important; display: flex;">
            <?php 
      $db->sql = "select * from haber order by hit desc limit 4";
      $en_cok_gorunen_haberler = $db->select(); if ( $en_cok_gorunen_haberler != false ) {
      foreach ($en_cok_gorunen_haberler as $key => $value) { ?>

            <div class="widget-recent " style="padding: 0 10px">
                <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>" alt="not image"
                    style="border-radius: 10px 10px 0 0;" />
                <div style="
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            border-radius: 0 0 10px 10px;
            height: 200px;
            margin-bottom: 30px;
          ">
                    <h4>
                        <a style="
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
              " href="index.php?url=haber_icerik&id=<?php echo $value->haber_id; ?>"><?php echo $value->haber_baslik; ?></a>
                    </h4>
                    <span><?php echo $value->hit; ?> Okunma</span>
                    <p style="margin-top: 5px;"><?=$value->haber_aciklama; ?></p>
                </div>
            </div>

            <?php
                }
                }
                ?>
        </div>
    </div>
</div>