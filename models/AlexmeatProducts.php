<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alexmeat_products".
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
class AlexmeatProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alexmeat_products';
    }

    public function getUpdates()
    {
        return $this->hasMany(AlexmeatUpdates::className(), ['sku_product' => 'sku']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'title', 'sku', 'article', 'units', 'per', 'price', 'updated_at'], 'required'],
            [['price'], 'string'],
            [['image', 'title', 'sku', 'article', 'units', 'per', 'updated_at'], 'string', 'max' => 255],
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
        ];
    }
}
