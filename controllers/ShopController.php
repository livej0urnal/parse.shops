<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;
use app\models\Products;
use app\models\Updates;

class ShopController extends AppController
{
    public function actionCategory($seller)
    {
        $seller = Yii::$app->request->get('seller');
        return $this->render('category');
    }
}