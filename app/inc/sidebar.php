<div class="col-sm-12 sidebar" style="padding-top: 40px">

    <div class="widget col-sm-12 col-md-6 ">
        <h3 class="widget-title">Kategoriler</h3>
        <div class="bubble-line"></div>
        <div class="widget-content">
            <ul>

                <?php 
                 $id = (int)get("id");

                    $db->sql = "select * from kategori limit 6";
                    $sag_kategoriler = $db->select();
                    if ($sag_kategoriler!=false) { 
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
    <div class="widget col-sm-12 col-md-6">
        <h3 class="widget-title">Duyurular</h3>
        <div class="bubble-line"></div>
        <div class="widget-content">
            <ul>

                <?php 
                 $id = (int)get("id");

                    $db->sql = "select * from duyuru limit 6";
                    $sag_duyurular = $db->select();
                    if ($sag_duyurular!=false) { 
                     foreach ($sag_duyurular as $key => $value) {
                     ?>
                <li><a href="index.php?url=duyuru_icerik&id=<?=$value->duyuru_id; ?>"><?=$value->duyuru_baslik; ?></a>
                </li>
                <?php
                    }
                    }else {
                         echo 'Duyuru bulunamadı';
                    }
                     ?>

            </ul>
        </div>
    </div>



</div>


<?php 
            require_once "widget.php"
          ?>