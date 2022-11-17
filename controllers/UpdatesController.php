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
                'only' => ['index'],
                'duration' => 36000,
            ],
        ];
    }

    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        ini_set('max_execution_time', 900);
        $products = Products::getDb()->cache(function (){
            return Products::find()->indexby('id')->with('updates', 'last')->orderBy(['updated_at' => SORT_DESC])->andWhere(('updated_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->all();
        }, 3600);
        $this->setMeta('Last Updates from 7 Days');
        return $this->render('index', compact('products'));
    }
}