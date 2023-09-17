<style>
    @media screen and (max-width: 780px) {
        .ozlu_soz {
            font-size: 16px !important;
        }
        
        .post-content2 {
            padding: 10px 20px !important;
        }
        
        .post-icon {
            margin-right: 10px !important;
        }
    }
</style>


<?php
           $db->sql = "select * from ozlu_soz";
            $ozlusoz = $db->select();
            if ( $ozlusoz == false) {
            ?>
            <?php
            }else {
            foreach ($ozlusoz as $key => $value) {
            ?>

            <div class="container">
            <article class="content-item">
                <div class="entry-media">
                <div class="post-content post-content2">
                    <div class="post-icon post-icon2">
                    <p></p>
                    </div>
                    <h3 class="ozlu_soz"><?=$value->ozlu_soz_baslik; ?></h3>
                    <br />
                </div>
                </div>
            </article>
            </div>

          <?php
            }
            }
            ?>



