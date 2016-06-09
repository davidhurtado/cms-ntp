<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;
?>
    <p>
        Si tu tienes alguna inquietud, o alguna pregunta, por favor llena el siguiente formulario para contactarme. Gracias!
    </p>
    <?= Alert::widget() ?>
                <?php $form = ActiveForm::begin(['id' => 'contact-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

                <?= $form->field($model, 'name')->label('Nombres y Apellidos',['class'=>'col-lg-12']) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject')->label('Asunto') ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 10, 'style' => 'resize:none'])->label('Mensaje') ?>
                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary col-lg-3', 'name' => 'contact-button']) ?>
                </div>
                 <?=
                $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-4">{input}</div></div>',
                ])->label('&nbsp;Código de verificación')
                ?>
            <?php ActiveForm::end(); ?>
            <?php
$this->registerJs('
        $("form#contact-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#contact-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
?>