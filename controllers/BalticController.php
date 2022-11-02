<?php

namespace app\controllers;

use app\models\Products;
use app\models\Updates;
use Yii;
use yii\data\Sort;
use yii\web\Controller;
use app\models\Baltic;
use yii\db\Expression;
use yii\data\Pagination;

class BalticController extends AppController
{
    public function actionLinks()
    {
        $links = Baltic::find()->all();
        foreach ($links as $link) {
            $link->delete();
        }
        $products = Products::find()->where(['seller' => 'Baltic'])->all();
        foreach ($products as $product)
        {
            $product->instock = null;
            $product->save(false);
        }
        return $this->render('links');
    }

    public function actionParse()
    {
        $id = Yii::$app->request->get('id');
        $links = Baltic::find()->orderBy(['id' => SORT_DESC])->all();
        $parse_products = 1;
        $new_products = 0;
        $update_products = 0;
        ini_set('max_execution_time', 900);
        foreach ($links as $link)
        {
            $htmlgmi = file_get_html($link->links);
            $articles = $htmlgmi->find('article');
            foreach ($articles as $product) {
                $product->sku = $product->find('div.item-tag ', 0)->getAttribute('onclick');
                $product->sku = preg_replace("/[^0-9]/", '', $product->sku);
                $product->price = trim($product->find('span.price1', 0)->plaintext);
                $product->price = preg_replace("/[^,.0-9]/", '', $product->price);
                $find_product = Products::findOne(['sku' => $product->sku, 'seller' => $product->seller]);
                if(!empty($find_product)) {
                    $need_update = Updates::find()->where(['sku_product' => $product->sku])->orderBy(['id' => SORT_DESC])->one();
                    if($need_update->price != $find_product->price) {
                        $product_update = Products::findOne(['sku' => $product->sku]);
                        $product_update->price = $product->price;
                        if(!empty($product->find('div.description', 1)->plaintext)) {
                            $product_update->per = $product->find('div.description', 1)->plaintext;
                        }
                        $product_update->instock = '1';
                        $product->updated_at = new Expression('NOW()');
                        $product_update->save(false);
                        $new_updates = new Updates();
                        $new_updates->price = $product->price;
                        $new_updates->sku_product = $product->sku;
                        $new_updates->update_at = $product->updated_at;
                        $new_updates->save(false);
                    }
                    else{
                        $find_product->instock = '1';
                        $find_product->save(false);
                    }

                }
                else{
                    $new_product = new Products();
                    $new_product->sku = $product->sku;
                    $product->image = $product->find('img.catalog-img ', 0)->getAttribute('src');
                    $product->title = $product->find('div.product-title' , 0)->plaintext;
                    if(empty($product->article = $product->find('div.product-description', 0)->next_sibling('div')->plaintext)) {
                        $product->article = $product->find('div.description', 0)->prev_sibling('div')->plaintext;
                    }
                    else{
                        $product->article = $product->find('div.product-title', 0)->next_sibling('div')->next_sibling('div')->next_sibling('div')->plaintext;
                    }
                    $product->units = $product->find('div.description', 0)->plaintext;
                    $product->per = $product->find('div.description', 1)->plaintext;

                    $new_product->image = $product->image;
                    $new_product->title = $product->title;
                    $new_product->article = htmlspecialchars($product->article);
                    $new_product->price = htmlspecialchars($product->price);
                    $new_product->units = htmlspecialchars($product->units);
                    $new_product->per = htmlspecialchars($product->per);
                    $new_product->updated_at = new Expression('NOW()');
                    $new_product->instock = '1';
                    $new_product->seller = 'Baltic';
                    $new_product->save(false);
                }
                $parse_products ++ ;

            }
        }
        return $this->render('parse', compact('links', 'parse_products', 'update_products' , 'new_products'));
    }
}