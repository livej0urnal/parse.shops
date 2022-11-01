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
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->where(['seller' => $seller])->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $seller = $shop->short;
        $this->setMeta($shop->value);
        return $this->render('category', compact('products', 'sort', 'manufactures' , 'pages', 'seller'));
    }

    public function actionSearch($q, $seller)
    {
        $q = Yii::$app->request->get('q');
        $shop = Shops::findOne(['short' => $seller]);
        $seller = Yii::$app->request->get('seller');
        $products = Products::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->andWhere(['seller' => $seller])->orderBy(['id' => SORT_DESC])->all();
        $sort = new Sort([
            'attributes' => [
                'updated_at',
                'price',
                'instock',
            ],
            'defaultOrder' => ['updated_at' => SORT_DESC]
        ]);
        $query = Products::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->andWhere(['seller' => $seller])->orderBy($sort->orders);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 50, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $this->setMeta($shop->value);
        return $this->render('category' , compact('products', 'pages', 'q', 'manufactures', 'sort', 'shop'));
    }

    public function actionManufacture($q, $seller)
    {
        $q = Yii::$app->request->get('q');
        $seller = Yii::$app->request->get('seller');
        $shop = Shops::findOne(['short' => $seller]);
        $products = Products::find()->where(['like', 'article', $q])->andWhere(['seller' => $seller])->orderBy(['id' => SORT_DESC])->all();
        $sort = new Sort([
            'attributes' => [
                'updated_at',
                'price',
                'instock',
            ],
            'defaultOrder' => ['updated_at' => SORT_DESC]
        ]);
        $query = Products::find()->where(['like', 'article', $q])->andWhere(['seller' => $seller])->orderBy($sort->orders);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->select('article')->where(['seller' => $seller])->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $this->setMeta($shop->value);
        return $this->render('category' , compact('products', 'pages', 'q', 'manufactures' , 'sort', 'shop'));
    }

    public function actionChange()
    {
//        ini_set('max_execution_time', 900);
        $products = Products::find()->where(['seller' => 'Zakuson'])->indexBy('sku')->all();
        foreach ($products as $product)
        {
            $updates = Updates::find()->where(['sku_product' => $product->sku])->andWhere(['price' => $product->price])->andWhere(('update_at >= DATE_SUB(CURRENT_DATE, INTERVAL 10 DAY)'))
                        ->orderBy(['update_at' => SORT_DESC])->all();
            foreach ($updates as $update)
            {
                $update->delete();
            }
        }
    }
}