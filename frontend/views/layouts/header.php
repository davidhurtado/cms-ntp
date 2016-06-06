<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="<?= $baseUrl ?>/images/logo.png" height="50" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Inicio</a></li>
                <?php
                if (Yii::$app->controller->id == 'post') {
                    ?>
                    <li><a  href="<?= yii\helpers\Url::to('index.php?#about') ?>">Acerca</a></li>
                    <li><a href="<?= yii\helpers\Url::to('index.php?#blog') ?>">Publicaciones</a></li> 
                    <li><a href="<?= yii\helpers\Url::to('index.php?#bottom') ?>">Contacto</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="#" class="gotoabout">Acerca</a></li>
                    <li><a href="#" class="gotoblog">Publicaciones</a></li> 
                    <li><a href="#" class="gotocontact">Contacto</a></li>
                    <?php } ?>
                <!--li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paginas <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="career.html">Career</a></li>
                        <li><a href="blog-item.html">Blog Single</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="registration.html">Registration</a></li>
                        <li class="divider"></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                        <li><a href="terms.html">Terms of Use</a></li>
                    </ul>
                </li-->
            </ul>
        </div>
    </div>
</header>