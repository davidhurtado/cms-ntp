<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;

/*
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar; */
use yii\widgets\Breadcrumbs;
\dmstr\web\AdminLteAsset::register($this);
AppAsset::register($this);
$asset = backend\assets\AppAsset::register($this);
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
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="wrap">
                <?= $this->render('header.php', ['baseUrl' => $baseUrl]) ?>
                <?= $this->render('leftmenu.php', ['baseUrl' => $baseUrl]) ?>
                <div class="content-wrapper">
                    <section class="content-header">
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                    </section>
                <?php } ?>
                <section class="content container col-lg-12">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </section>
                <?php if (!Yii::$app->user->isGuest) { ?>
                </div>

                <?= $this->render('footer.php', ['baseUrl' => $baseUrl]) ?>
                <?= $this->render('rightside.php', ['baseUrl' => $baseUrl]) ?>
                <div class="control-sidebar-bg"></div>
                <div class="container">

                </div>
            </div>
        <?php } ?>
        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>
