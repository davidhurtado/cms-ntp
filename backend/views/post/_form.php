<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yiidoc\redactor\widgets\Redactor;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php
    $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'descripcion')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['/uploads'],
        'fileUpload' => ['/uploads'],
        'lang' => 'es',
        'plugins' => ['clips', 'fontcolor','imagemanager']
    ]
])?>
    <?= $form->field($model, 'visible')->dropDownList(['0' => 'Oculto', '1' => 'Publico',]); ?>
    <!--?= $form->field($model, 'fecha')->textInput(['value' => date('Y/m/d H:i:s')]) ?-->

        <?php //$form->field($model, 'autor')->textInput(['value' => Yii::$app->user->id])  ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
