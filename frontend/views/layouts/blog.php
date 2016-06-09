<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\User;
use yii\widgets\Pjax;


?>
<div id="blog" style="margin-bottom: 50px"></div>
<section  class="container">
    <h1 class="center">PUBLICACIONES</h1>
    <div class="row">
    <?=$this->render('rightblog');?>       
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                <div class="archive site-index">

                    <?php if (Yii::$app->params['model']): ?>
                        <?php \yii\widgets\Pjax::begin(); ?>
                        <?=LinkPager::widget(['pagination' => Yii::$app->params['paginas'],]);?>
                        <?php foreach (Yii::$app->params['model'] as $post): if($post['visible']):?>
                            <div class="blog-item">
                                <div class="blog-content">
                                    <?= Html::a(Html::tag('h3', $post['titulo']), ['/post/view', 'id' => $post['id']]); ?></span>

                                    <div class="entry-meta">
                                        <span><i class="icon-user"></i> 
                                            <?= Html::a(User::findOne(['id' => $post['autor']])->username, ['/user/profile/show', 'id' => $post['autor']]); ?></span>
                                        <span><i class="icon-folder-close"></i> <a href="#">Bootstrap</a></span>
                                        <span><i class="icon-calendar"></i> <?= $post['fecha'] ?></span>
                                        <span><i class="icon-comment"></i> <a href="blog-item.html#comments">3 Comments</a></span>
                                    </div>
                                <p><?= substr($post['descripcion'],0,400)?></p><br>
                                    <?=Html::a('Leer más '.Html::tag('i','',['class'=>'icon-angle-right']), ['/post/view', 'id' => $post['id']],['class'=>'btn btn-default'])?>
                                </div>

                            </div>
                        <?php endif; endforeach ?>
                        <?=LinkPager::widget(['pagination' => Yii::$app->params['paginas'],]);?><!--/.pagination-->
                      <?php \yii\widgets\Pjax::end(); ?>
                        <nav id="archive-pagination">


                        </nav>
                    <?php endif ?>

                </div>

                
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->