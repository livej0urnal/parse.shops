<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\AlexmeatProducts;
use Yii;

class UpdatesController extends AppController
{
    public function actionIndex($seller = null)
    {
        $id = Yii::$app->request->get('id');
        $seller = Yii::$app->request->get('seller');
        $products = AlexmeatProducts::find()->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();

        return $this->render('index', compact('products'));
    }
}