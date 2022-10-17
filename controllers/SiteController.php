<?php

namespace app\controllers;

use app\models\AlexmeatProducts;
use app\models\BalticProducts;
use app\models\EicProducts;
use app\models\EuphoriaProducts;
use app\models\GmiProducts;
use app\models\GrantefoodsProducts;
use app\models\LeaderProducts;
use app\models\LeaProducts;
use app\models\MamtaProducts;
use app\models\MegafoodProducts;
use app\models\PsvProducts;
use app\models\RedoctoberProducts;
use app\models\RoyalProducts;
use app\models\SakhalinProducts;
use app\models\StradivaProducts;
use app\models\TamaniProducts;
use app\models\ThreeProducts;
use app\models\ZakusonProducts;
use app\models\ZenithProducts;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\AppController;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
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
                    'logout' => ['post', 'get'],
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
     * @return string
     */
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $products = [];
        $products_alex = AlexmeatProducts::find()->all();
        $products_baltic = BalticProducts::find()->all();
        $products_eic = EicProducts::find()->all();
        $products_euphoria = EuphoriaProducts::find()->all();
        $products_gmi = GmiProducts::find()->all();
        $products_grantefoods = GrantefoodsProducts::find()->all();
        $products_lea = LeaProducts::find()->all();
        $products_leader = LeaderProducts::find()->all();
        $products_mamta = MamtaProducts::find()->all();
        $products_megafood = MegafoodProducts::find()->all();
        $products_natars = MegafoodProducts::find()->all();
        $products_psv = PsvProducts::find()->all();
        $products_redoctober = RedoctoberProducts::find()->all();
        $products_royal = RoyalProducts::find()->all();
        $products_sakhalin = SakhalinProducts::find()->all();
        $products_stradiva = StradivaProducts::find()->all();
        $products_tamani = TamaniProducts::find()->all();
        $products_three = ThreeProducts::find()->all();
        $products_zakuson = ZakusonProducts::find()->all();
        $products_zenith = ZenithProducts::find()->all();

        $products = count($products_baltic) + count($products_alex) + count($products_eic) + count($products_euphoria) + count($products_gmi) + count($products_grantefoods)
            + count($products_lea) + count($products_leader) + count($products_mamta) + count($products_megafood) + count($products_natars) + count($products_psv)
            + count($products_redoctober) + count($products_royal) + count($products_sakhalin) + count($products_stradiva) + count($products_tamani) + count($products_three)
            + count($products_zakuson) + count($products_zenith);

        $this->setMeta('Dashboard Panel');
        return $this->render('index', compact('products'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $this->layout = false;
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
