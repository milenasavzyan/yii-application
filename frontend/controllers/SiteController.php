<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Posts;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($categoryId = null)
    {
        $categories = Category::find()->all();
        $query = Posts::find()->joinWith('categoryPosts');

        if ($categoryId !== null) {
            $query->andWhere(['category_post.category_id' => $categoryId]);
        }

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'selectedCategory' => $categoryId,
        ]);
    }


    public function actionView($id)
    {
        $model = Posts::findOne($id);
        $categories = Category::find()->all();

        $otherNews = Posts::find()
            ->where(['!=', 'id', $id])
            ->limit(4)
            ->all();


        $categoryIds = \yii\helpers\ArrayHelper::getColumn($model->categoryPosts, 'category_id');

        $sameNews = Posts::find()
            ->joinWith('categoryPosts')
            ->where(['category_post.category_id' => $categoryIds])
            ->andWhere(['!=', 'posts.id', $id])
            ->limit(6)
            ->all();


        if ($model === null) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'model' => $model,
            'categories' => $categories,
            'otherNews' => $otherNews,
            'sameNews' => $sameNews,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionSearch()
    {
        $query = Yii::$app->request->get('query');
        $dataProvider = new ActiveDataProvider([
            'query' => Posts::find()->where(['like', 'title', $query]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $categories = Category::find()->all();

        return $this->render('search', [
            'dataProvider' => $dataProvider,
            'query' => $query,
            'categories' => $categories,
        ]);
    }
}
