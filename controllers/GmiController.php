<?php

namespace app\controllers;

use app\models\Gmi;
use yii\web\Controller;
use Yii;
use app\models\GmiUpdates;
use app\models\GmiProducts;

class GmiController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionParse()
    {
        $id = Yii::$app->request->get('id');
        $links = Gmi::find()->orderBy(['id' => SORT_DESC])->all();
        $parse_products = 1;
        $new_products = 0;
        $update_products = 0;
        foreach ($links as $link)
        {
            $htmlgmi = file_get_html($link->links);
            $articles = $htmlgmi->find('article');
            foreach ($articles as $product) {
                $product->sku = trim($product->find('div.product-description', 0)->innertext);
                $product->price = trim($product->find('span.price1', 0)->plaintext);
                $find_product = GmiProducts::findOne(['sku' => $product->sku]);
                if(!empty($find_product)) {
                    $need_update = GmiUpdates::findOne(['sku_product' => $product->sku]);
                    if($need_update->price === $product->price) {

                    }
                    else{
                        $new_updates = new GmiUpdates();
                        $new_updates->sku_product = htmlspecialchars($product->sku);
                        $new_updates->price = htmlspecialchars($product->price);
                        $product_update = GmiProducts::findOne(['sku' => $product->sku]);
                        $product_update->price = $new_updates->price;
                        $product_update->save(false);
                        $new_updates->save(false);

                        $update_products++;
                    }

                }
                else{
                    $new_product = new GmiProducts();
                    $new_product->sku = $product->sku;
                    $product->image = $product->find('img.catalog-img ', 0)->getAttribute('src');
                    $product->title = $product->find('div.product-title' , 0)->plaintext;
                    $product->article = $product->find('div.product-description', 1)->next_sibling('div')->plaintext;
                    $product->units = $product->find('div.description', 0)->plaintext;
                    $product->per = $product->find('div.description', 1)->plaintext;

                    $new_product->image = $product->image;
                    $new_product->title = htmlspecialchars($product->title);
                    $new_product->article = htmlspecialchars($product->article);
                    $new_product->price = htmlspecialchars($product->price);
                    $new_product->units = htmlspecialchars($product->units);
                    $new_product->per = htmlspecialchars($product->per);
                    $new_product->save(false);

                    $new_updates = new GmiUpdates();
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

    public function actionLinks()
    {
        return $this->render('links');
    }
}