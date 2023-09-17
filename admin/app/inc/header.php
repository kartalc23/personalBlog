<div class="navbar-header"></div>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<ul class="nav navbar-nav navbar-left navbar-top-links">
    <li><a href="<?php echo URL; ?>" target="_blank"><i class="fa fa-home fa-fw"></i> Website</a></li>
</ul>

<ul class="nav navbar-right navbar-top-links">                  
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["uye_adsoyad"]; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> Profilim</a>
            </li>
            <li class="divider"></li>
            <li><a href="index.php?url=logout"><i class="fa fa-sign-out fa-fw"></i> Çıkış Yap</a>
            </li>
        </ul>
    </li>
</ul>