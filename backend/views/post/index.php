<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Post', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::tag('buttom','Eliminar Post', ['type'=>'submit','class' => 'btn btn-success', 'id' => 'delete']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'id' => 'grid',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'id'
            ],
            'titulo',
            //'descripcion:ntext',
            'fecha',
            //'autor',
            ['attribute' => 'visible',
                'content' => function($dataProvider) {
                    return $dataProvider['visible'] == 0 ? 'Oculto' : 'Publico';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php
    $this->registerJs('
        $("#delete").on("click", function(e){
    var keys = $("#grid").yiiGridView("getSelectedRows");
    $.post({
    url: "/cms/backend/web/index.php?r=post/delete", // your controller action
    dataType: "json",
    data: {keylist: keys},
    success: function(data) {
    alert("I did it! Processed checked rows.")
    },
    });
    });');
    ?>
</div>
