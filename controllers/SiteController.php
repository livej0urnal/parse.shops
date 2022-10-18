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
        $products = Setting::findOne(['name' => 'products']);
        $today = Setting::findOne(['name' => 'today']);
        $users = User::find()->all();
        $out_stock = Setting::findOne(['name' => 'out_stock']);
        $products_alex = AlexmeatProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_baltic = BalticProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_eic = EicProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_euphoria = EuphoriaProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_gmi = GmiProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_grantefoods = GrantefoodsProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_lea = LeaProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_leader = LeaderProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_mamta = MamtaProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_megafood = MegafoodProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_natars = MegafoodProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_psv = PsvProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_redoctober = RedoctoberProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_royal = RoyalProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_sakhalin = SakhalinProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_stradiva = StradivaProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_tamani = TamaniProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_three = ThreeProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_zakuson = ZakusonProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_zenith = ZenithProducts::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->all();
        $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
            $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
        $this->setMeta('Dashboard Panel');
        return $this->render('index', compact('products', 'out_stock', 'today', 'users', 'products_alex', 'products_all'));
    }

    public function actionSearch($q, $select)
    {
        $q = Yii::$app->request->get('q');
        $select = Yii::$app->request->get('select');
        if(empty($select)) {
            $products_alex = AlexmeatProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_baltic = BalticProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_eic = EicProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_euphoria = EuphoriaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_gmi = GmiProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_grantefoods = GrantefoodsProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_lea = LeaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_leader = LeaderProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_mamta = MamtaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_megafood = MegafoodProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_natars = MegafoodProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_psv = PsvProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_redoctober = RedoctoberProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_royal = RoyalProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_sakhalin = SakhalinProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_stradiva = StradivaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_tamani = TamaniProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_three = ThreeProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_zakuson = ZakusonProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_zenith = ZenithProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->all();
            $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
                $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
        }
        elseif($select === 'null') {
            $products_alex = AlexmeatProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_baltic = BalticProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_eic = EicProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_euphoria = EuphoriaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_gmi = GmiProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_grantefoods = GrantefoodsProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_lea = LeaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_leader = LeaderProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_mamta = MamtaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_megafood = MegafoodProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_natars = MegafoodProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_psv = PsvProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_redoctober = RedoctoberProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_royal = RoyalProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_sakhalin = SakhalinProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_stradiva = StradivaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_tamani = TamaniProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_three = ThreeProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_zakuson = ZakusonProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_zenith = ZenithProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => null])->all();
            $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
                $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
        }
        else{
            $products_alex = AlexmeatProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_baltic = BalticProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_eic = EicProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_euphoria = EuphoriaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_gmi = GmiProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_grantefoods = GrantefoodsProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_lea = LeaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_leader = LeaderProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_mamta = MamtaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_megafood = MegafoodProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_natars = MegafoodProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_psv = PsvProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_redoctober = RedoctoberProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_royal = RoyalProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_sakhalin = SakhalinProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_stradiva = StradivaProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_tamani = TamaniProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_three = ThreeProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_zakuson = ZakusonProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_zenith = ZenithProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orWhere(['like', 'article' , $q])->andWhere(['instock' => '1'])->all();
            $products_all = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
                $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
        }

        $this->setMeta('Search - ' . $q);
        return $this->render('search', compact('products_all', 'q', 'select'));
    }

    public function actionUpdate()
    {
        $total = Setting::find()->where(['name' => 'products'])->one();
        $products = array();
        $products_alex = AlexmeatProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_baltic = BalticProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_eic = EicProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_euphoria = EuphoriaProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_gmi = GmiProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_grantefoods = GrantefoodsProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_lea = LeaProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_leader = LeaderProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_mamta = MamtaProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_megafood = MegafoodProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_natars = MegafoodProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_psv = PsvProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_redoctober = RedoctoberProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_royal = RoyalProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_sakhalin = SakhalinProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_stradiva = StradivaProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_tamani = TamaniProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_three = ThreeProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_zakuson = ZakusonProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products_zenith = ZenithProducts::find()->select(['id', 'instock' , 'updated_at'])->all();
        $products = array_merge($products_baltic, $products_alex, $products_eic, $products_euphoria, $products_gmi, $products_grantefoods, $products_lea, $products_leader, $products_mamta, $products_megafood,
            $products_natars, $products_psv, $products_redoctober, $products_royal, $products_sakhalin, $products_stradiva, $products_tamani, $products_three, $products_zakuson, $products_zenith);
        $new_total = Setting::findOne(['name' => 'products']);
        $new_total->value = count($products);
        $new_total->save();

        $out_stock = 0;
        $today = 0;
        $date_today = Yii::$app->formatter->asDate('now', 'php:Y-m-d');
        foreach ($products as $product) {
            if($product->instock === null) {
                $out_stock += 1;
            }
            if( Yii::$app->formatter->asDate($product->updated_at, 'php:Y-m-d') === $date_today) {
                $today += 1;
            }
        }
        $outstock = Setting::findOne(['name' => 'out_stock']);
        $outstock->value = $out_stock;
        $outstock->update();
        return $this->redirect(['site/index']);
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
