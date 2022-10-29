<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_updates".
 *
 * @property int $id
 * @property string $sku_product
 * @property string $price
 * @property int $update_at
 */
class ProductsUpdates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_updates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sku_product', 'price', 'update_at'], 'required'],
            [['id', 'update_at'], 'integer'],
            [['price'], 'string'],
            [['sku_product'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku_product' => 'Sku Product',
            'price' => 'Price',
            'update_at' => 'Update At',
        ];
    }
}
