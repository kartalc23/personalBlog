<!--------------------------------------
HEADER
--------------------------------------->


<?php
$db->sql = "SELECT * from icerik order by icerik_id desc limit 1";
$anasayfa_icerikler = $db->select();
if ($anasayfa_icerikler == false) {
    ?>
<h1 class="err-text">Blog Bulunamadı!</h1>
<?php
} else {
    ?>

        <?php
        foreach ($anasayfa_icerikler as $key => $value) {
            // $id = (int)get("id");
            // $db->sql = "select * from kategori where kategori_id=".$id;
            // $kategori_baslik = $kategori->kategori_baslik;     
            ?>

        <div class="container">
            <div class="jumbotron jumbotron-fluid mb-3 pt-0 pb-0 bg-lightblue position-relative">
                <div class="pl-4 pr-0 tofront">
                    <div class="row justify-content-between">
                        <div class="col-md-6 pt-6 pb-6 align-self-center">
                            <h1 class="secondfont mb-3 font-weight-bold">
                                <?= $value->icerik_baslik; ?>
                            </h1>
                            <p class="mb-3">
                                <?= $value->icerik_aciklama; ?>

                            </p>
                            <a href="index.php?url=icerik&id=<?= $value->icerik_id; ?>" class="btn btn-dark">Okumaya
                                devam et</a>
                        </div>
                        <div class="col-md-6 d-none d-md-block pr-0"
                            style="background-size:cover;background-image:url('<?php echo URL; ?>/public/uploads/<?= $value->image; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
}
?>
        <!-- End Header -->


        <!--------------------------------------
MAIN
--------------------------------------->

        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-0 mb-4 box-shadow h-xl-300">
                        <div
                            style="background-image: url(./assets/img/demo/1.jpg); height: 150px;    background-size: cover;    background-repeat: no-repeat;">
                        </div>
                        <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
                            <h2 class="h4 font-weight-bold">
                                <a class="text-dark" href="./article.html">Brain Stimulation Relieves Depression
                                    Symptoms</a>
                            </h2>
                            <p class="card-text">
                                Researchers have found an effective target in the brain for electrical stimulation to
                                improve mood in people suffering from depression.
                            </p>
                            <div>
                                <small class="d-block"><a class="text-muted" href="./author.html">Favid Rick</a></small>
                                <small class="text-muted">Dec 12 &middot; 5 min read</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="flex-md-row mb-4 box-shadow h-xl-300">
                        <div class="mb-3 d-flex align-items-center">
                            <img height="80" src="./assets/img/demo/blog4.jpg">
                            <div class="pl-3">
                                <h2 class="mb-2 h6 font-weight-bold">
                                    <a class="text-dark" href="./article.html">Nasa's IceSat space laser makes height
                                        maps of Earth</a>
                                </h2>
                                <div class="card-text text-muted small">
                                    Jake Bittle in LOVE/HATE
                                </div>
                                <small class="text-muted">Dec 12 &middot; 5 min read</small>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <img height="80" src="./assets/img/demo/blog5.jpg">
                            <div class="pl-3">
                                <h2 class="mb-2 h6 font-weight-bold">
                                    <a class="text-dark" href="./article.html">Underwater museum brings hope to Lake
                                        Titicaca</a>
                                </h2>
                                <div class="card-text text-muted small">
                                    Jake Bittle in LOVE/HATE
                                </div>
                                <small class="text-muted">Dec 12 &middot; 5 min read</small>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <img height="80" src="./assets/img/demo/blog6.jpg">
                            <div class="pl-3">
                                <h2 class="mb-2 h6 font-weight-bold">
                                    <a class="text-dark" href="./article.html">Sun-skimming probe starts calling
                                        home</a>
                                </h2>
                                <div class="card-text text-muted small">
                                    Jake Bittle in LOVE/HATE
                                </div>
                                <small class="text-muted">Dec 12 &middot; 5 min read</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-8">
                    <h5 class="font-weight-bold spanborder"><span>All Stories</span></h5>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="pr-3">
                            <h2 class="mb-1 h4 font-weight-bold">
                                <a class="text-dark" href="./article.html">Nearly 200 Great Barrier Reef coral species
                                    also live in the deep sea</a>
                            </h2>
                            <p>
                                There are more coral species lurking in the deep ocean that previously thought.
                            </p>
                            <div class="card-text text-muted small">
                                Jake Bittle in SCIENCE
                            </div>
                            <small class="text-muted">Dec 12 &middot; 5 min read</small>
                        </div>
                        <img height="120" src="./assets/img/demo/blog8.jpg">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="pr-3">
                            <h2 class="mb-1 h4 font-weight-bold">
                                <a class="text-dark" href="./article.html">East Antarctica's glaciers are stirring</a>
                            </h2>
                            <p>
                                Nasa says it has detected the first signs of significant melting in a swathe of glaciers
                                in East Antarctica.
                            </p>
                            <div class="card-text text-muted small">
                                Jake Bittle in SCIENCE
                            </div>
                            <small class="text-muted">Dec 12 &middot; 5 min read</small>
                        </div>
                        <img height="120" src="./assets/img/demo/1.jpg">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="pr-3">
                            <h2 class="mb-1 h4 font-weight-bold">
                                <a class="text-dark" href="./article.html">50 years ago, armadillos hinted that DNA
                                    wasn’t destiny</a>
                            </h2>
                            <p>
                                Nasa says it has detected the first signs of significant melting in a swathe of glaciers
                                in East Antarctica.
                            </p>
                            <div class="card-text text-muted small">
                                Jake Bittle in SCIENCE
                            </div>
                            <small class="text-muted">Dec 12 &middot; 5 min read</small>
                        </div>
                        <img height="120" src="./assets/img/demo/5.jpg">
                    </div>
                </div>
                <div class="col-md-4 pl-4">
                    <h5 class="font-weight-bold spanborder"><span>Popular</span></h5>
                    <ol class="list-featured">
                        <li>
                            <span>
                                <h6 class="font-weight-bold">
                                    <a href="./article.html" class="text-dark">Did Supernovae Kill Off Large Ocean
                                        Animals?</a>
                                </h6>
                                <p class="text-muted">
                                    Jake Bittle in SCIENCE
                                </p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h6 class="font-weight-bold">
                                    <a href="./article.html" class="text-dark">Humans Reversing Climate Clock: 50
                                        Million Years</a>
                                </h6>
                                <p class="text-muted">
                                    Jake Bittle in SCIENCE
                                </p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h6 class="font-weight-bold">
                                    <a href="./article.html" class="text-dark">Unprecedented Views of the Birth of
                                        Planets</a>
                                </h6>
                                <p class="text-muted">
                                    Jake Bittle in SCIENCE
                                </p>
                            </span>
                        </li>
                        <li>
                            <span>
                                <h6 class="font-weight-bold">
                                    <a href="./article.html" class="text-dark">Effective New Target for Mood-Boosting
                                        Brain Stimulation Found</a>
                                </h6>
                                <p class="text-muted">
                                    Jake Bittle in SCIENCE
                                </p>
                            </span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <!--------------------------------------
FOOTER
--------------------------------------->
        <div class="container mt-5">
            <footer class="bg-white border-top p-3 text-muted small">
                <div class="row align-items-center justify-content-between">
                    <div>
                        <span class="navbar-brand mr-2"><strong>Mundana</strong></span> Copyright &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        . All rights reserved.
                    </div>
                    <div>
                        Made with <a target="_blank" class="text-secondary font-weight-bold"
                            href="https://www.wowthemes.net/mundana-free-html-bootstrap-template/">Mundana Theme</a> by
                        WowThemes.net.
                    </div>
                </div>
            </footer>
        </div>
        <!-- End Footer -->

        <!--------------------------------------
JAVASCRIPTS
--------------------------------------->
        <script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
        <script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
        <script src="./assets/js/functions.js" type="text/javascript"></script>
        </body>

        </html>




        <section class="section-content ">
            <div class="container">
                <div class="row " style="height: 500px;">
                    <div class="col-sm-12 col-md-12" style="margin-left: 15px;">
                        <?php
                        $db->sql = "SELECT * from icerik order by icerik_id desc limit 10";
                        $anasayfa_icerikler = $db->select();
                        if ($anasayfa_icerikler == false) {
                            ?>
                        <h1 class="err-text">BLOG YAZISI BULUNAMADI!</h1>
                        <?php
                        } else {
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
                                    <a href="index.php?url=icerik&id=<?= $value->icerik_id; ?>">
                                        <div class="content">
                                            <div class="content-img">
                                                <img src="<?php echo URL; ?>/public/uploads/<?= $value->image; ?>"
                                                    alt="">
                                                <div class="content-detail">
                                                    <h1><a href="index.php?url=icerik&id=<?= $value->icerik_id; ?>">
                                                            <?= $value->icerik_baslik; ?>
                                                        </a>
                                                    </h1>
                                                    <div class="content-tags">
                                                        <p>
                                                            <?= $value->tarih; ?>
                                                        </p>
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