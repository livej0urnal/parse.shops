<?php

namespace app\controllers;

use app\controllers\AppController;
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
use app\models\NatarsProducts;
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

class UpdatesController extends AppController
{
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        ini_set('max_execution_time', 900);
        $products = AlexmeatProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(500)->all();
        $this->setMeta('Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGmi($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = GmiProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2800)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMegafood($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = MegafoodProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3000)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEuphoria($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = EuphoriaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionBaltic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = BalticProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(700)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRedoctober($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = RedoctoberProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(7000)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGrantefoods($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = GrantefoodsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(7500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLea($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = LeaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMamta($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = MamtaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionThree($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = ThreeProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionTamani($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = TamaniProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionPsv($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = PsvProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1000)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZenith($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = ZenithProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRoyal($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = RoyalProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionSakhalin($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = SakhalinProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionStradiva($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = StradivaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZakuson($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = ZakusonProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionNatars($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = NatarsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3500)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = EicProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLeader($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = LeaderProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(900)->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }
}