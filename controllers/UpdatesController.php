<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\AlexmeatProducts;
use app\models\GmiProducts;
use app\models\MegafoodProducts;
use Yii;

class UpdatesController extends AppController
{
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $products = AlexmeatProducts::find()->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta('Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionGmi($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = GmiProducts::find()->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }

    public function actionMegafood($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = MegafoodProducts::find()->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        $this->setMeta($seller . ' - Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }
}