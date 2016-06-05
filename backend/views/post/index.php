<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'titulo',
            //'descripcion:ntext',
            'fecha',
            //'autor',
            ['attribute' => 'visible',
                'content'=> function($dataProvider){
                    return $dataProvider['visible']==0?'Oculto':'Publico';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>