<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Products;
use Yii;

class UpdatesController extends AppController
{

    public function behaviors()
    {
        return [

            'cache' => [
                'class' => 'yii\filters\PageCache',
                'only' => ['index', '', 'baltic', 'megafood', 'grantefoods', 'eic', 'leader', 'three', 'euphoria', 'redoctober', 'tamani', 'mamta', 'lea',
                    'zenith', 'psv', 'natars', 'stradiva', 'zakuson', 'sakhalin', 'royal'],
                'duration' => 36000,
            ],
        ];
    }
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Alexmeat'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(500)->all();
        }, 3600);
        $this->setMeta('Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGmi($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Gmi'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2800)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMegafood($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = MegafoodProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3000)->all();
        $products = MegafoodProducts::getDb()->cache(function (){
            return MegafoodProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEuphoria($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = EuphoriaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = EuphoriaProducts::getDb()->cache(function (){
            return EuphoriaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionBaltic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = BalticProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(700)->all();
        $products = BalticProducts::getDb()->cache(function (){
            return BalticProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRedoctober($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = RedoctoberProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(7000)->all();
        $products = RedoctoberProducts::getDb()->cache(function (){
            return RedoctoberProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(7000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGrantefoods($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = GrantefoodsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(7500)->all();
        $products = GrantefoodsProducts::getDb()->cache(function (){
            return GrantefoodsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(7500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLea($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = LeaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = LeaProducts::getDb()->cache(function (){
            return LeaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMamta($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = MamtaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = MamtaProducts::getDb()->cache(function (){
            return MamtaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionThree($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = ThreeProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = ThreeProducts::getDb()->cache(function (){
            return ThreeProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionTamani($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = TamaniProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = TamaniProducts::getDb()->cache(function (){
            return TamaniProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionPsv($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = PsvProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1000)->all();
        $products = PsvProducts::getDb()->cache(function (){
            return PsvProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZenith($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = ZenithProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = ZenithProducts::getDb()->cache(function (){
            return ZenithProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRoyal($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = RoyalProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        $products = RoyalProducts::getDb()->cache(function (){
            return RoyalProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(2000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionSakhalin($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = SakhalinProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = SakhalinProducts::getDb()->cache(function (){
            return SakhalinProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionStradiva($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = StradivaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        $products = StradivaProducts::getDb()->cache(function (){
            return StradivaProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZakuson($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = ZakusonProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        $products = ZakusonProducts::getDb()->cache(function (){
            return ZakusonProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(2000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionNatars($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = NatarsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3500)->all();
        $products = NatarsProducts::getDb()->cache(function (){
            return NatarsProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = EicProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        $products = EicProducts::getDb()->cache(function (){
            return EicProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLeader($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
//        $products = LeaderProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(900)->all();
        $products = LeaderProducts::getDb()->cache(function (){
            return LeaderProducts::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(900)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }
}