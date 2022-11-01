<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;
use app\models\Products;
use app\models\Updates;
use app\models\Shops;
use yii\data\Pagination;
use yii\data\Sort;

class ShopController extends AppController
{
    public function actionCategory($seller)
    {
        $seller = Yii::$app->request->get('seller');
        $shop = Shops::findOne(['short' => $seller]);
        $sort = new Sort([
            'attributes' => [
                'updated_at',
                'price',
                'instock',
            ],
            'defaultOrder' => ['updated_at' => SORT_DESC]
        ]);
        $products = Products::find()->where(['seller' => $seller])->indexBy('id')->orderBy(['updated_at' => SORT_DESC])->all();
        $query = Products::find()->where(['seller' => $seller])->indexBy('id')->orderBy($sort->orders);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 100, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->where(['seller' => $seller])->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $this->setMeta($shop->value);
        return $this->render('category', compact('products', 'sort', 'manufactures' , 'pages'));
    }
}