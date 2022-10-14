<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sakhalin".
 *
 * @property int $id
 * @property string $links
 */
class Sakhalin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sakhalin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['links'], 'required'],
            [['links'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'links' => 'Links',
        ];
    }
}
