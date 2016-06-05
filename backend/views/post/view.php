<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'titulo',
            'descripcion:ntext',
            'fecha',
            //'autor',
            ['label' => 'Autor',
                'value' => Html::a( User::findOne(['id' => $model->autor])->username, ['/user/profile/show', 'id' => $model->autor]),
                'format' => 'raw'
            ]
        ],
    ])
    ?>

</div>
