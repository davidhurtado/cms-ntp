<?php

use frontend\models\ContactForm;

$model = new ContactForm();
if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
    } else {
        Yii::$app->session->setFlash('error', 'There was an error sending email.');
    }
}
?>
<section id="bottom" class="wet-asphalt">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <?= $this->render('/site/contact', ['model' => $model,]); ?>
            </div><!--/.col-md-3-->
            <div class="col-md-6 col-lg-4 center">
                <h1>Información de contacto</h1>
                <address>
                    <strong>David Hurtado Chichande</strong><br>
                    <b>Direccion: </b>Nuevos Horizontes | Cdla La Fontana<br>
                    <b>Calle: </b>Manabí y 5 de Agosto<br>
                    Esmeraldas - Ecuador<br>
                    <abbr title="Telefono">P:</abbr> (593) 986 699 220
                </address>
            </div><!--/.col-md-3-->
        </div>
    </div>
</section><!--/#bottom-->