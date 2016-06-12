<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
//use common\models\LoginForm;
//use frontend\models\PasswordResetRequestForm;
//use frontend\models\ResetPasswordForm;
//use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Post;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $query = Post::find()->where(['visible' => 1])->orderBy(['fecha' => SORT_DESC]);
        if(isset($_GET['busqueda'])){
          $query = Post::find()->where(['visible' => 1])
                  ->andFilterWhere(['like', 'titulo', $_GET['busqueda']])
                  ->orFilterWhere(['like', 'descripcion', $_GET['busqueda']])
                  //->andFilterWhere(['like', 'autor', $_GET['busqueda']])
                  ->orderBy(['fecha' => SORT_DESC]);
        }
        
       // $query = Post::find()->where(['visible' => 1])->orderBy(['fecha' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([ 'defaultPageSize' => 2, 'totalCount' => $countQuery->count()]);
        $model = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        Yii::$app->params['paginas'] = $pages;
        Yii::$app->params['modelPost'] = $model;
        return $this->render('index', [
                    'model' => $model,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact($submit = false) {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            $success = false;
            $error = [];
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                $success = true;
            } else {
                $error = $model->getErrors();       //get validation error messages
            }
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json');
            echo json_encode(['success' => $success, 'error' => $error]);

            Yii::$app->end();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
        /* //$model = new ContactForm();
          if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
          Yii::$app->response->format = Response::FORMAT_JSON;
          return ActiveForm::validate($model);
          }
          if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
          Yii::$app->response->format = Response::FORMAT_JSON;
          //Yii::$app->session->setFlash('success', 'Gracias por contactarte conmigo, te escribiré pronto.');
          return [
          'message' => '¡Gracias por contactarte conmigo, te escribiré pronto.!',
          ];
          } else {
          //Yii::$app->session->setFlash('error', 'Hubo un error al enviar, intenta de nuevo.');
          Yii::$app->response->format = Response::FORMAT_JSON;
          return ActiveForm::validate($model);
          }
          // return $this->refresh();
          } else {
          return $this->renderAjax('contact', [
          'model' => $model,
          ]);
          } */
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
