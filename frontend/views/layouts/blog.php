<?php

use app\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\User;

$posts = Post::find()->All();
?>
<div id="blog" style="margin-bottom: 50px"></div>
<section  class="container">
    <h1 class="center">PUBLICACIONES</h1>
    <div class="row">
        <aside class="col-sm-4 col-sm-push-8">
            <div class="widget search">
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                        </span>
                    </div>
                </form>
            </div><!--/.search-->

            <!--div class="widget ads">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad1.png" alt=""></a>
                    </div>

                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad2.png" alt=""></a>
                    </div>
                </div>
                <p> </p>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad3.png" alt=""></a>
                    </div>

                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad4.png" alt=""></a>
                    </div>
                </div>
            </div--><!--/.ads-->     

            <div class="widget categories">
                <h3>Blog Categories</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="arrow">
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Updates</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="arrow">
                            <li><a href="#">Joomla</a></li>
                            <li><a href="#">Wordpress</a></li>
                            <li><a href="#">Drupal</a></li>
                            <li><a href="#">Magento</a></li>
                            <li><a href="#">Bootstrap</a></li>
                        </ul>
                    </div>
                </div>                     
            </div><!--/.categories-->
            <div class="widget tags">
                <h3>Tag Cloud</h3>
                <ul class="tag-cloud">
                    <li><a class="btn btn-xs btn-primary" href="#">CSS3</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">HTML5</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">WordPress</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Joomla</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Drupal</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Bootstrap</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">jQuery</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Tutorial</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Update</a></li>
                </ul>
            </div><!--/.tags-->

            <div class="widget facebook-fanpage">
                <h3>Facebook Fanpage</h3>
                <div class="widget-content">
                    <div class="fb-like-box" data-href="https://www.facebook.com/shapebootstrap" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                </div>
            </div>
        </aside>        
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                <div class="archive site-index">

                    <?php if ($posts): ?>
                        <?php foreach ($posts as $post): if($post['visible']):?>
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
                                    <p><?= $post['descripcion'] ?></p>
                                    <a class="btn btn-default" href="blog-item.html">Read More <i class="icon-angle-right"></i></a>
                                </div>

                            </div>
                        <?php endif; endforeach ?>
                        <nav id="archive-pagination">


                        </nav>
                    <?php endif ?>

                </div>


                <ul class="pagination pagination-lg">
                    <li><a href="#"><i class="icon-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="icon-angle-right"></i></a></li>
                </ul><!--/.pagination-->
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->