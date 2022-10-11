<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gmi_updates".
 *
 * @property int $id
 * @property string $sku_product
 * @property string $price
 * @property string $update_at
 */
class GmiUpdates extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gmi_updates';
    }

    public function getProduct()
    {
        return $this->hasOne(GmiProducts::className() , ['sku' => 'sku_product']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku_product', 'price'], 'required'],
            [['update_at'], 'safe'],
            [['sku_product', 'price'], 'string', 'max' => 255],
            [['price'], 'trim'],
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
