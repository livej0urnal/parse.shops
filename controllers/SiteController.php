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
use app\models\Products;
use app\models\PsvProducts;
use app\models\RedoctoberProducts;
use app\models\RoyalProducts;
use app\models\SakhalinProducts;
use app\models\Setting;
use app\models\StradivaProducts;
use app\models\TamaniProducts;
use app\models\ThreeProducts;
use app\models\User;
use app\models\ZakusonProducts;
use app\models\ZenithProducts;
use Yii;
use yii\db\Expression;
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
            'cache' => [
                'class' => 'yii\filters\PageCache',
                'only' => ['', ''],
                'duration' => 36000,
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
        $users = User::find()->count();
        $products = Products::find()->count();
        $out_stock = Products::find()->indexBy('id')->where(['instock' => null])->count();
        $today = Products::find()->indexBy('id')->where(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY)'))->count();
        $this->setMeta('Dashboard Panel');
        return $this->render('index', compact('products', 'out_stock', 'today', 'users','products'));
    }

    public function actionSearch($q, $select, $seller = null)
    {
        $input = Yii::$app->request->get('q');
        $select = Yii::$app->request->get('select');
        $seller = Yii::$app->request->get('seller');
        $shops = explode(',', $seller);
        
        $words = explode(' ', $input);
        foreach ($words as $q) {
            foreach ($shops as $shop) {
                if(empty($select)) {
                    $products_alex = AlexmeatProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_baltic = BalticProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_eic = EicProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_euphoria = EuphoriaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_gmi = GmiProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_grantefoods = GrantefoodsProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_lea = LeaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_leader = LeaderProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_mamta = MamtaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_megafood = MegafoodProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_natars = MegafoodProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_psv = PsvProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_redoctober = RedoctoberProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_royal = RoyalProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_sakhalin = SakhalinProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_stradiva = StradivaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_tamani = TamaniProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_three = ThreeProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_zakuson = ZakusonProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_zenith = ZenithProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->all();
                    $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
                        $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
                }
                elseif($select === 'null') {
                    $products_alex = AlexmeatProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_baltic = BalticProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_eic = EicProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_euphoria = EuphoriaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_gmi = GmiProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_grantefoods = GrantefoodsProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_lea = LeaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_leader = LeaderProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_mamta = MamtaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_megafood = MegafoodProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_natars = MegafoodProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_psv = PsvProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_redoctober = RedoctoberProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_royal = RoyalProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_sakhalin = SakhalinProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_stradiva = StradivaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_tamani = TamaniProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_three = ThreeProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_zakuson = ZakusonProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_zenith = ZenithProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => null])->all();
                    $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
                        $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
                }
                else{
                    $products_alex = AlexmeatProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_baltic = BalticProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_eic = EicProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_euphoria = EuphoriaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_gmi = GmiProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_grantefoods = GrantefoodsProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_lea = LeaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_leader = LeaderProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_mamta = MamtaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_megafood = MegafoodProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_natars = MegafoodProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_psv = PsvProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_redoctober = RedoctoberProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_royal = RoyalProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_sakhalin = SakhalinProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_stradiva = StradivaProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_tamani = TamaniProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_three = ThreeProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_zakuson = ZakusonProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_zenith = ZenithProducts::find()->indexBy('sku')->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andFilterWhere([ 'like', 'seller', $shop])->andWhere(['instock' => '1'])->all();
                    $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
                        $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
                }
            }
            
        }


        $this->setMeta('Search - ' . $input . ' in ' . $seller);
        return $this->render('search', compact('products_all', 'q', 'select', 'input'));
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
