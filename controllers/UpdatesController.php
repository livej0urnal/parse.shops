<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Products;
use Yii;

class UpdatesController extends AppController
{

//    public function behaviors()
//    {
//        return [
//
//            'cache' => [
//                'class' => 'yii\filters\PageCache',
//                'only' => ['index', 'gmi', 'baltic', 'megafood', 'grantefoods', 'eic', 'leader', 'three', 'euphoria', 'redoctober', 'tamani', 'mamta', 'lea',
//                    'zenith', 'psv', 'natars', 'stradiva', 'zakuson', 'sakhalin', 'royal'],
//                'duration' => 36000,
//            ],
//        ];
//    }

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
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Megafood'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEuphoria($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Euphoria'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionBaltic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Baltic'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRedoctober($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'RedOctober'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(7000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGrantefoods($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Grantefoods'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(7500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLea($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Lea'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMamta($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Mamta'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionThree($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Three'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionTamani($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Tamani'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionPsv($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Psv'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZenith($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Zenith'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionRoyal($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Royal'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(2000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionSakhalin($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Sakhalin'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionStradiva($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Stradiva'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(1500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionZakuson($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Zakuson'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY)'))->limit(2000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionNatars($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Natars'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(3500)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionEic($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(2000)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionLeader($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->where(['seller' => 'Leader'])->indexby('sku')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 2 DAY)'))->limit(900)->all();
        }, 3600);
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }
}