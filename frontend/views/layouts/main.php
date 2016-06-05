<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Post;

AppAsset::register($this);
$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <?= $this->render('header.php', ['baseUrl' => $baseUrl]) ?>
        <?php if(Yii::$app->controller->id=='site'){?>
        <?= $this->render('slider.php', ['baseUrl' => $baseUrl]) ?>
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
                ?>
        <?php }?>
        <section id="about">
        <?= $content ?> 
            </section>
         <?php if(Yii::$app->controller->id=='site'){?>
        <?= $this->render('servicios.php', ['baseUrl' => $baseUrl]) ?>
        <?=$this->render('blog.php', ['baseUrl' => $baseUrl]) ?>
        <?= $this->render('bottom.php', ['baseUrl' => $baseUrl]) ?>
        <?php }?>
        <?= $this->render('footer.php', ['baseUrl' => $baseUrl]) ?>
        
<!--        <div class="control-sidebar-bg"></div>
        <div class="container">

        </div>-->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>