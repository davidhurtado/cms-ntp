<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-3">
        <?= Html::a('Crear Post', ['create'], ['class' => 'btn btn-success']) ?>  
    </div>
    <div class="col-xs-3">
        <?= Html::dropDownList('estado', null, ['#' => 'Seleccione','hide'=>'Ocultar','show'=>'Mostrar','delete-multiple'=>'Eliminar'], ['label' => 'Dimension type', 'class' => 'form-control']) ?>
    </div>
    <div class="col-xs-3">
        <?= Html::tag('input', '', ['type' => 'button', 'value' => 'Aplicar', 'class' => 'btn btn-success', 'id' => 'btnaplicar']) ?>
    </div>
    <?php ActiveForm::end(); ?>
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

    $(document).ready(function(){
    $("#btnaplicar").click(function(){
    var keys = $("#grid").yiiGridView("getSelectedRows");
    if(keys==""){
    alert("No hay nada que aplicar");
    }else{
     $.ajax({
  type: "post",
  url: "index.php?r=post/"+$("select[name=estado]").val(),
  data: {pk: keys},
  });}
    });
    });', \yii\web\View::POS_READY);
?>


</div>
