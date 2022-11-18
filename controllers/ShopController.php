<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;
use app\models\Products;
use app\models\Updates;
use app\models\Shops;
use yii\data\Pagination;
use yii\data\Sort;
use yii\db\Expression;

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
        $products = Products::find()->where(['seller' => $seller])->indexBy('id')->with('updates', 'last')->orderBy(['updated_at' => SORT_DESC])->all();
        $query = Products::find()->where(['seller' => $seller])->indexBy('id')->with('updates', 'last')->orderBy($sort->orders);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 200, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->where(['seller' => $seller])->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $seller = $shop->short;
        $this->setMeta($shop->value);
        return $this->render('category', compact('products', 'sort', 'manufactures' , 'pages', 'seller'));
    }

    public function actionSearch($q, $seller)
    {
        $q = trim(Yii::$app->request->get('q'));
        $shop = Shops::findOne(['short' => $seller]);
        $seller = Yii::$app->request->get('seller');
        $products = Products::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->andWhere(['seller' => $seller])->with('updates', 'last')->orderBy(['id' => SORT_DESC])->all();
        $sort = new Sort([
            'attributes' => [
                'updated_at',
                'price',
                'instock',
            ],
            'defaultOrder' => ['updated_at' => SORT_DESC]
        ]);
        $query = Products::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->andWhere(['seller' => $seller])->with('updates', 'last')->orderBy($sort->orders);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 50, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $this->setMeta($shop->value);
        return $this->render('category' , compact('products', 'pages', 'q', 'manufactures', 'sort', 'shop'));
    }

    public function actionManufacture($q = null, $seller = null)
    {
        $q = Yii::$app->request->get('q');
        $seller = Yii::$app->request->get('seller');
        $shop = Shops::findOne(['short' => $seller]);
        $products = Products::find()->filterWhere(['like', 'article', $q])->andFilterWhere(['seller' => $seller])->orderBy(['id' => SORT_DESC])->all();
        $sort = new Sort([
            'attributes' => [
                'updated_at',
                'price',
                'instock',
            ],
            'defaultOrder' => ['updated_at' => SORT_DESC]
        ]);
        $query = Products::find()->filterWhere(['like', 'article', $q])->andFilterWhere(['seller' => $seller])->orderBy($sort->orders);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = Products::find()->select('article')->where(['seller' => $seller])->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        $this->setMeta($shop->value);
        return $this->render('category' , compact('products', 'pages', 'q', 'manufactures' , 'sort', 'shop'));
    }

    public function actionImage()
    {
        $products = Products::find()->indexBy('id')->all();
        foreach ($products as $product)
        {
            if($product->image != '/Content/Images/NoImage.png') {
                $product->image = '/uploads/'.$product->sku . '.png';
                $product->save(false);
            }
        }
    }

    public function actionMegafood()
    {
        $id = Yii::$app->request->get('id');
        $products = Products::find()->where(['seller' => 'MegaFood'])->andWhere(['like', 'title', '/'])->all();
        foreach ($products as $product) {
            echo $product->title . '<br>';
            $string = $product->title;
            $result = explode("/", $string);
            if(strlen($result[1]) > 3) {
                $result_number = strstr($result[1], ' ', true);
            }
            else{
                $result_number = $result[1];
            }
            $per = (int)$result_number;
            $result_price = $product->price / $per;
            echo $product->price . '/' . (int)$result_number . '=' . $result_price . '<br>';
            $product->per = '$'. round($result_price,1);
            $product->save(false);
        }

        return $this->render('regular', compact('products'));
    }


    public function actionStock()
    {
        $id = Yii::$app->request->get('id');
        $products = Products::find()->where(['instock' => null])->all();
        foreach ($products as $product) {
            if($product->price != 0) {
                $product->price = 0;
                $product->save(false);
                $update = new Updates();
                $update->sku_product = $product->sku;
                $update->price = 0;
                $update->update_at = new Expression('NOW()');
                $update->save(false);
            }

        }
        return $this->render('stock', compact('products'));
    }

    public function actionResult()
    {

    }


}