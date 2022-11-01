<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $sku
 * @property string $article
 * @property string $units
 * @property string $per
 * @property string $price
 * @property string $updated_at
 * @property string|null $instock
 * @property string|null $seller
 */
class Products extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    public function getUpdates()
    {
        return $this->hasMany(Updates::className(), ['sku_product' => 'sku']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'title', 'sku', 'article', 'units', 'per', 'price', 'updated_at'], 'required'],
            [['price', 'instock'], 'string'],
            [['image', 'title', 'sku', 'article', 'units', 'per', 'updated_at', 'seller'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'title' => 'Title',
            'sku' => 'Sku',
            'article' => 'Article',
            'units' => 'Units',
            'per' => 'Per',
            'price' => 'Price',
            'updated_at' => 'Updated At',
            'instock' => 'Instock',
            'seller' => 'Seller',
        ];
    }
}
