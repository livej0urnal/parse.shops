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
        $products = AlexmeatProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta('Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGmi($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = GmiProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMegafood($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = MegafoodProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEuphoria($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = EuphoriaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionBaltic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = BalticProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRedoctober($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = RedoctoberProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGrantefoods($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = GrantefoodsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLea($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = LeaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMamta($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = MamtaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionThree($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = ThreeProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionTamani($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = TamaniProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionPsv($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = PsvProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZenith($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = ZenithProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRoyal($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = RoyalProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionSakhalin($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = SakhalinProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionStradiva($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = StradivaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZakuson($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = ZakusonProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionNatars($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = NatarsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = EicProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLeader($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = LeaderProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionAll($sku, $seller)
    {
        $sku = Yii::$app->request->get('sku');
        $seller = Yii::$app->request->get('seller');

    }
}