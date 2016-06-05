<?php

namespace frontend\controllers;

use Yii;
use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex($id=null) {
        $render = 'index';

        if ($id) {
            $postType = $this->findModel($id);
        }/* elseif ($slug) {
            $postType = $this->findPostTypeBySlug($slug);
        }*/ else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $query = new ActiveDataProvider([
          'query' => Post::find(),
          ]);
                /*$postType->getPosts()
                ->andWhere(['status' => 'publish'])
                ->andWhere(['<=', 'date', date('Y-m-d H:i:s')])
                ->orderBy(['id' => SORT_DESC]);*/
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            //'pageSize' => Option::get('posts_per_page'),
        ]);
        $query->offset($pages->offset)->limit($pages->limit);
        $posts = $query->all();

        if ($posts) {
            if (is_file($this->view->theme->basePath . '/post/index-' . $postType->name . '.php')) {
                $render = 'index-' . $postType->name . '.php';
            }

            return $this->render($render, [
                        'postType' => $postType,
                        'posts' => $posts,
                        'pages' => $pages,
            ]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');

        /*  $dataProvider = new ActiveDataProvider([
          'query' => Post::find(),
          ]);

          return $this->render('index', [
          'dataProvider' => $dataProvider,
          ]); */
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function relations() {
    return array(
        'user' => array(self::BELONGS_TO, 'User', 'id')
    );
}

}
