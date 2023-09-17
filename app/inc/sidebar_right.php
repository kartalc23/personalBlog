<div class="col-sm-4 sidebar">

    <div class="widget">
        <h3 class="widget-title">Kategoriler</h3>
        <div class="bubble-line"></div>
        <div class="widget-content">
            <ul>

                <?php 
                    $id = (int)get("id");
                    $db->sql = "select * from kategori limit 6";
                    $db->data = array();
                    $sag_kategoriler = $db->select();
                    if ($sag_kategoriler != false) { 
                     foreach ($sag_kategoriler as $key => $value) {
                     ?>
                <li><a href="index.php?url=kategori&id=<?=$value->kategori_id; ?>"><?=$value->kategori_baslik; ?></a>
                </li>
                <?php
                    }
                    }else {
                         echo 'kategori bulunamadı';
                    }
                     ?>

            </ul>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Popüler Yazılar</h3>
        <div class="bubble-line"></div>
        <div class="widget-content">
            <?php 
                    $db->sql = "select * from icerik order by hit desc limit 3";
                    $en_cok_gorunenler = $db->select();
                    if ( $en_cok_gorunenler != false ) {
                    foreach ($en_cok_gorunenler as $key => $value) {
                    ?>
            <div class="widget-recent">
                <img src="<?php echo URL;?>/public/uploads/<?=$value->image; ?>" alt="not image" />
                <h4><a href="index.php?url=icerik&id=<?php echo $value->icerik_id; ?>"><?php echo $value->icerik_baslik; ?>
                        (<?php echo $value->hit; ?>)</a></h4>
                <p>
                    <?=$value->icerik_aciklama; ?>
                </p>
            </div>
            <?php
                }
                }
                ?>
        </div>
    </div>


</div>