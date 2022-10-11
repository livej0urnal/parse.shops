<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "redoctober".
 *
 * @property int $id
 * @property string $links
 */
class Redoctober extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'redoctober';
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
