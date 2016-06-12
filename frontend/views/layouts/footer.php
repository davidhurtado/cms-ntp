<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
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
                        <?php
                    } else {
                        if (Yii::$app->controller->action->id == 'error') {
                            ?>
                            <li><a  href="<?= yii\helpers\Url::to('index.php?#about') ?>">Acerca</a></li>
                            <li><a href="<?= yii\helpers\Url::to('index.php?#blog') ?>">Publicaciones</a></li> 
                        <?php } else {
                            ?>
                            <li><a href="#" class="gotoabout">Acerca</a></li>
                            <li><a href="#" class="gotoblog">Publicaciones</a></li> 
                            <?php }
                        } ?>
                    <li><?=
                        Html::a('Contacto', '#', [
                            'id' => 'actividad',
                            'data-toggle' => 'modal',
                            'data-target' => '#contacto',
                            'data-url' => Url::to(['site/contact']),
                            'data-pjax' => '0',
                        ]);
                        ?>

                    </li>
                    <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->

                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->