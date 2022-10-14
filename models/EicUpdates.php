<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eic_updates".
 *
 * @property int $id
 * @property string $sku_product
 * @property string $price
 * @property string $update_at
 */
class EicUpdates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eic_updates';
    }

    public function getProduct()
    {
        return $this->hasOne(EicProducts::className() , ['sku' => 'sku_product']);
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
