<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sakhalin_updates".
 *
 * @property int $id
 * @property string $sku_product
 * @property string $price
 * @property string $update_at
 */
class SakhalinUpdates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sakhalin_updates';
    }

    public function getProduct()
    {
        return $this->hasOne(SakhalinProducts::className() , ['sku' => 'sku_product']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku_product', 'price'], 'required'],
            [['price'], 'string'],
            [['update_at'], 'safe'],
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
