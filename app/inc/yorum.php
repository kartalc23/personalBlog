<article class="content-item">

    <?php

    if (isset($_POST['submit'])) {
        $yorum = $_POST["yorum"];
        $adsoyad = $_POST["isim"];
        $eposta = $_POST["eposta"];
        $web = $_POST["web"];
        if ($adsoyad == "" or $eposta == "") {
            $yorum_kaydet = '<div class="alert alert-warning"><strong>Uyarı </strong>Gerekli Alanları Doldurun.</div>';
        } else {
            $db->sql = "INSERT into yorum SET yorum_adsoyad=?, yorum_icerik=?, yorum_email=?, yorum_web=?, yorum_icerik_id=?";
            $db->data = array($adsoyad, $yorum, $eposta, $web, $id);
            $ekle = $db->insert();
            if ($ekle) {
                $yorum_kaydet = '<div class="alert alert-success"><strong>Başarılı </strong>Yorumunuz Kaydedildi.</div>';
            } else {
                $yorum_kaydet = '<div class="alert alert-danger"><strong>Başarısız </strong>Yorumunuz Kaydedilemedi.</div>';
            }
        }
    }

    $db->sql = "SELECT * FROM yorum WHERE yorum_icerik_id=? AND yorum_onay=? ORDER BY yorum_id DESC";
    $db->data = array($id, 1);
    $yorumlar = $db->select();
    $adet = $db->adet();
    ?>
    <div class="entry-media">
        <div class="post-title comment-title">
            <?php if ($yorumlar != false) { ?>
            <h3><?= $adet ?> Yorum Bulundu</h3>
            <?php } else { ?>
            <h3>Yorum Bulunamadı</h3>
            <?php } ?>
        </div>
        <div class="bubble-line"></div>
        <div id="comments" class="comments-area">
            <div class="comments-wrapper">
                <ol class="comment-list">
                    <div class="kutu">
                        <?php if ($yorumlar !== false) {
                            foreach ($yorumlar as $key => $value) { ?>
                        <strong><?= $value->yorum_adsoyad; ?></strong>
                        <p><?= $value->yorum_icerik; ?></p>
                        <?php }
                        } ?>
                    </div>
                </ol>
            </div>
        </div>
    </div>
</article>
<article class="content-item">
    <div class="entry-media">
        <div class="post-title">
            <?php if (isset($yorum_kaydet)) {
                echo $yorum_kaydet;
            } ?>
            <h2>Bir yorum bırak</h2>
        </div>
        <div class="bubble-line"></div>
        <div class="post-content comment">
            <form method="POST">
                <div class="comment-form">
                    <p class="input-name">İSİM</p>
                    <input type="text" name="isim" placeholder="" />
                    <p class="input-name">E-POSTA</p>
                    <input type="text" name="eposta" placeholder="" />
                    <p class="input-name">İNTERNET SİTESİ (Zorunlu Değil!)</p>
                    <input type="text" name="web" placeholder="" />
                    <p class="input-name">YORUM</p>
                    <textarea name="yorum" placeholder=""></textarea>
                </div>
                <div class="comment-submit">
                    <input type="submit" value="YORUM GÖNDER" name="submit">
                </div>
            </form>
        </div>
    </div>
</article>