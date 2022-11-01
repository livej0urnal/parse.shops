<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\LeaProducts;
use app\models\Products;
use Yii;

class ProductsController extends AppController
{
    public function actionChange()
    {
        $id = Yii::$app->request->get('id');
        $changes = LeaProducts::find()->all();
        foreach ($changes as $change)
        {
            $product = new Products();
            $product->attributes = $change->attributes;
            $product->seller = 'Lea';
            $product->save();
            echo $product->id . '<br>';
            $change->delete();
        }
        return $this->render('change');

    }
}