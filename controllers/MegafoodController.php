<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\Megafood;

class MegafoodController extends Controller
{
    public function actionLinks()
    {
        return $this->render('links');
    }
}