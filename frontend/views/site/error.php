<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $name;

?>
 <section id="error" class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="alert alert-danger"><p><?= nl2br(Html::encode($message))?></p></div>
        <a class="btn btn-success" href="<?=Url::To(['index'])?>">IR A LA PAGINA PRINCIPAL</a>
    </section><!--/#error-->