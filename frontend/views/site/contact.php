<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;
$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact" id="contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Si tu tienes alguna inquietud, o alguna pregunta, por favor llena el siguiente formulario para contactarme. Gracias!
    </p>
    <?= Alert::widget() ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->label('Nombres y Apellidos') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject')->label('Asunto') ?>

                <?=
                $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
                ])->label('Código de verificación')
                ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'body')->textArea(['rows' => 10, 'style' => 'resize:none'])->label('Mensaje') ?>
                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>