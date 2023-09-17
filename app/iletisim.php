


<head>
    <title>
        ... | İLETİŞİM
    </title>
</head>

<?php 
require 'inc/page_header.php';
require 'inc/header.php';
?>



<section class="section-content">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-8">
            <article class="contact-media">
              <article class="content-item" style="border: none !important;">
                <div class="about-title">
                  <h2>İLETİŞİM</h2>
                </div>
              </article>
              <div class="bubble-line"></div>
              <div class="contact-content">
                <h3>
                  Aşağıdaki form'u doldurarak bizimle iletişime geçebilirsiniz!
                </h3>
              <div class="bubble-line"></div>
                <div class="contact-row">
                  <form action="" method="POST">
                    <div class="contact-form">
                      <p>İSİM</p>
                      <input type="text" name="name" placeholder="" required/>
                      <p>E-POSTA</p>
                      <input type="email" name="name" placeholder="" required/>
                      <p>KONU</p>
                      <input type="text" name="name" placeholder="" required/>
                      <p>MESAJ</p>
                      <textarea placeholder="" required></textarea>
                    </div>
                    <div class="contact-submit">
                      <input type="submit" placeholder="GÖNDER">
                    </div>
                  </form>
                </div>
              </div>
            </article>
          </div>
          <?php 
            require_once 'inc/sidebar_right.php';
          ?>
      </div>
    </section>

<?php 
require 'inc/footer.php';
require 'inc/page_footer.php';
?>