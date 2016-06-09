<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->titulo;
?>
<div class="post-view">

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
    <div class="jumbotron">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-10">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posteado en <?=$model->fecha?></p>

                <hr>

                <!-- Preview Image -->
                <!--img class="img-responsive" src="http://placehold.it/900x300" alt=""-->

                <hr>

                <!-- Post Content -->
                <p class="lead"> <?=$model->descripcion?></p>

            </div>

        <hr>

    </div>
    <!-- /.container -->
</div>
</div>
