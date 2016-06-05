<?php

use yii\helpers\Html;
use yii\helpers\Url;
use dmstr\widgets\Menu;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $baseUrl ?>/dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <?= Html::tag('p', Yii::$app->user->identity->username) ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php
        $menuAdmin='';
        $menuAutor='';
        if (Yii::$app->user->can('admin') || Yii::$app->user->can('superadmin')) {
            $menuAdmin = ['label' => 'Administrador',
                    'url' => ['#'],
                    'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                    'items' => [
                        ['label' => 'Usuarios', 'url' => Url::to(['user/admin'])],
                    ],
                ];
        }
        /*       ['label' => 'Menu 1', 'url' => ['/a/index']],
          ['label' => 'Menu 2', 'url' => ['/link2/index']], */
        if (Yii::$app->user->can('autor')) {
                        $menuAutor = ['label' => 'Publicaciones',
                    'url' => ['#'],
                    'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                    'items' => [
                        ['label' => 'Mis Posts', 'url' => Url::to(['/post'])],
                    ],
                ];
        }
        echo Menu::widget([
            'options' => ['class' => 'sidebar-menu treeview'],
            'items' => [
                $menuAdmin,
                $menuAutor,
            ],
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
            'encodeLabels' => false, //allows you to use html in labels
            'activateParents' => true,]);
        ?>
    </section>
    <!-- /.sidebar -->
</aside>