<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo URL; ?>admin/index.php?url=dashboard"><i class="fa fa-dashboard fa-fw"></i> Admin Panel</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Kategori<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="index.php?url=kategori_ekle">Kategori Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?url=kategoriler">Kategoriler</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Özlü Söz<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="index.php?url=ozlu_soz_ekle">Özlü Söz Ekle</a>
                    </li>
                    <li>
                    <a href="index.php?url=ozlu_sozler">Özlü Sözler</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> İçerik<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="index.php?url=icerik_ekle">İçerik Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?url=icerikler">İçerikler</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Haber<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="index.php?url=haber_ekle">Haber Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?url=haberler">Haberler</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Duyuru<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="index.php?url=duyuru_ekle">Duyuru Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?url=duyurular">Duyurular</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Hakkımda<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                    <a href="index.php?url=hakkimda_ekle">Hakkımda Ekle</a>
                    </li>
                    <li>
                    <a href="index.php?url=hakkimda_yazilari">Hakkımda Yazıları</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?url=yorumlar"><i class="fa fa-bar-chart-o fa-fw"></i> Yorumlar</a>
            </li>
            <?php 
            if ($_SESSION["uye_yetki"]=="admin") 
            {
                ?>
                <li>
                    <a href="index.php?url=settings"><i class="fa fa-dashboard fa-fw"></i> Ayarlar</a>
                </li>
                <?php 
            }
            ?>

        </ul>
    </div>
</div>