<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; David Hurtado Chichande <?= date('Y') ?></a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
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
                    <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->

                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->