<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ThreeController extends Controller
{
    public function actionLinks()
    {
        $id = Yii::$app->request->get('id');
        return $this->render('links');
    }
}