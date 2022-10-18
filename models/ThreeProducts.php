<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "three_products".
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
 */
class ThreeProducts extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'three_products';
    }
    public function getUpdates()
    {
        return $this->hasMany(ThreeUpdates::className(), ['sku_product' => 'sku']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'title', 'sku', 'article', 'units', 'per', 'price', 'updated_at', 'instock', 'seller'], 'required'],
            [['price', 'seller'], 'string'],
            [['instock'], 'integer'],
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
            'instock' => 'In stock',
            'seller' => 'Seller',
        ];
    }
}
