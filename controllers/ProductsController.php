<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\AlexmeatProducts;
use app\models\Products;
use Yii;

class ProductsController extends AppController
{
    public function actionChange()
    {
        $id = Yii::$app->request->get('id');
        $changes = AlexmeatProducts::find()->all();
        foreach ($changes as $change)
        {
            $product = new Products();
            $product->attributes = $change->attributes;
            $product->save();
            echo $product->id . '<br>';
            $change->delete();
        }
        return $this->render('change');

    }
}