<?php

namespace app\controllers;

use yii\web\Controller;

class GmiController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionParse()
    {
        return $this->render('parse');
    }
}