<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Three;
use app\models\ThreeProducts;
use app\models\ThreeUpdates;
use yii\db\Expression;
use yii\data\Pagination;

class ThreeController extends Controller
{
    public function actionLinks()
    {
        return $this->render('links');
    }

    public function actionParse()
    {
        $id = Yii::$app->request->get('id');
        $links = Three::find()->orderBy(['id' => SORT_DESC])->all();
        $parse_products = 1;
        $new_products = 0;
        $update_products = 0;
        foreach ($links as $link)
        {
            $htmlgmi = file_get_html($link->links);
            $articles = $htmlgmi->find('article');
            foreach ($articles as $product) {
                $product->sku = $product->find('div.item-tag ', 0)->getAttribute('onclick');
                $product->sku = preg_replace("/[^0-9]/", '', $product->sku);
                $product->price = trim($product->find('span.price1', 0)->plaintext);
                $find_product = ThreeProducts::findOne(['sku' => $product->sku]);
                if(!empty($find_product)) {
                    $need_update = ThreeUpdates::findOne(['sku_product' => $product->sku]);
                    if($need_update->price === $product->price) {
                        $product_update = ThreeProducts::findOne(['sku' => $product->sku]);
                        $product_update->price = $product->price;
                        $product_update->updated_at = new Expression('NOW()');
                        $product_update->save(false);
                    }
                    else{
                        $new_updates = new ThreeUpdates();
                        $new_updates->sku_product = htmlspecialchars($product->sku);
                        $new_updates->price = htmlspecialchars($product->price);
                        $product_update = ThreeProducts::findOne(['sku' => $product->sku]);
                        $product_update->price = $product->price;
                        $product_update->updated_at = new Expression('NOW()');
                        $product_update->save(false);
                        $new_updates->save(false);

                        $update_products++;
                    }

                }
                else{
                    $new_product = new ThreeProducts();
                    $new_product->sku = $product->sku;
                    $product->image = $product->find('img.catalog-img ', 0)->getAttribute('src');
                    $product->title = $product->find('div.product-title' , 0)->plaintext;
                    $product->article = $product->find('div.product-description', 0)->next_sibling('div')->plaintext;
                    $product->units = $product->find('div.description', 0)->plaintext;
                    $product->per = $product->find('div.description', 1)->plaintext;

                    $new_product->image = $product->image;
                    $new_product->title = $product->title;
                    $new_product->article = htmlspecialchars($product->article);
                    $new_product->price = htmlspecialchars($product->price);
                    $new_product->units = htmlspecialchars($product->units);
                    $new_product->per = htmlspecialchars($product->per);
                    $new_product->updated_at = new Expression('NOW()');
                    $new_product->save(false);

                    $new_updates = new ThreeUpdates();
                    $new_updates->sku_product = htmlspecialchars($product->sku);
                    $new_updates->price = htmlspecialchars($product->price);
                    $new_updates->save(false);

                    $new_products ++ ;
                }
                $parse_products ++ ;

            }
        }
        return $this->render('parse', compact('links', 'parse_products', 'update_products' , 'new_products'));
    }

    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $products = ThreeProducts::find()->orderBy(['id' => SORT_DESC])->limit(10)->all();
        $query = ThreeProducts::find()->orderBy(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 500, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = ThreeProducts::find()->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        return $this->render('index' , compact('products', 'pages', 'manufactures'));
    }

    public function actionSearch($q)
    {
        $q = Yii::$app->request->get('q');
        $products = ThreeProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orderBy(['id' => SORT_DESC])->all();
        $query = ThreeProducts::find()->where(['like', 'title', $q])->orWhere(['like', 'sku' , $q])->orderBy(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 50, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = ThreeProducts::find()->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        return $this->render('index' , compact('products', 'pages', 'q', 'manufactures'));
    }

    public function actionManufacture($q)
    {
        $q = Yii::$app->request->get('q');
        $products = ThreeProducts::find()->where(['like', 'article', $q])->orderBy(['id' => SORT_DESC])->all();
        $query = ThreeProducts::find()->where(['like', 'article', $q])->orderBy(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 50, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $manufactures = ThreeProducts::find()->select('article')->orderBy(['article' => SORT_DESC])->groupBy(['article'])->all();
        return $this->render('index' , compact('products', 'pages', 'q', 'manufactures'));
    }
}