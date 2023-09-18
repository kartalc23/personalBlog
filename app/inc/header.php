<nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL; ?>"><strong>KARTAL</strong></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarColor02" style="">
            <ul class="navbar-nav mr-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="blog">Tüm Yazılar</a>
                </li>

                <?php
                $id = (int) get("id");
                $db->sql = "select * from kategori limit 6";
                $db->data = array();
                $sag_kategoriler = $db->select();
                if ($sag_kategoriler != false) {
                    foreach ($sag_kategoriler as $key => $value) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?url=kategori&id=<?= $value->kategori_id; ?>">
                                <?= $value->kategori_baslik; ?>
                            </a>
                        </li>
                        <?php
                    }
                } else {
                    echo 'kategori bulunamadı';
                }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                <li class="nav-item highlight">
                    <a class="nav-link" href="iletisim">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->