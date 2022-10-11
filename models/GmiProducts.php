<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gmi_products".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $sku
 * @property string $article
 * @property string $units
 * @property string $per
 * @property string $price
 */
class GmiProducts extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gmi_products';
    }

    public function getUpdates()
    {
        return $this->hasMany(GmiUpdates::className(), ['sku_product' => 'sku']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'title', 'sku', 'article', 'units', 'per', 'price'], 'required'],
            [['image', 'title', 'sku', 'article', 'units', 'per', 'price'], 'string', 'max' => 255],
            [['sku'] , 'unique' , 'comboNotUnique' => 'Username already taken!',  'targetClass' => 'app\models\GmiProducts'],
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
        ];
    }
}
