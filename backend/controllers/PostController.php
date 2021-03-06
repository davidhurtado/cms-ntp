<?php

namespace backend\controllers;

use Yii;
use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        /* if(!Yii::$app->user->can('autor')){
          return 0;
          } */
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'index', 'view', 'delete', 'delete-multiple', 'show', 'hide'],
                        'allow' => true,
                        'roles' => ['admin', 'autor'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete-multiple' => ['POST'],
                    'show' => ['POST'],
                    'hide' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex() {
        $query;
        if (!empty(Yii::$app->request->post('pk'))) {
            die();
        }
        if (Yii::$app->user->can('superadmin') || Yii::$app->user->can('admin')) {
            $query = Post::find();
        } else {
            if (Yii::$app->user->can('autor')) {
                $query = Post::find()->where(['autor' => Yii::$app->user->identity->id]);
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
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
        $model->autor = Yii::$app->user->identity->id;
        $model->fecha = date('Y/m/d H:i:s');
        $model->save();
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
        // Post::find()->where(['autor'=>Yii::$app->user->identity->id]);
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if (Yii::$app->user->can('admin') || Yii::$app->user->can('superadmin')) {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
            if ($model->autor != Yii::$app->user->identity->id) {
                return $this->redirect(['index']);
            }
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionShow() {

        if (!isset($_POST['pk'])) {
            return $this->redirect(['index']);
        } else {
            $pk = $_POST['pk'];
            foreach ($pk as $id) {
                Post::updateAll(['visible' => 1], 'id=' . $id);
            }
            return $this->redirect(['index']);
        }
    }

    public function actionHide() {
        if (!isset($_POST['pk'])) {
            return $this->redirect(['index']);
        } else {
            $pk = $_POST['pk'];
            foreach ($pk as $id) {
                Post::updateAll(['visible' => 0], 'id=' . $id);
            }
            return $this->redirect(['index']);
        }

        //return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteMultiple() {

        $pk = $_POST['pk'];
        //$pk=Yii::$app()->request->getPost('pk');
        //if (empty($pk)) {
        Post::deleteAll(['id' => $pk]);
        //}
        return $this->redirect(['index']);
    }

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

}
