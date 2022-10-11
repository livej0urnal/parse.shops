<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "gmi".
 *
 * @property int $id
 * @property string $links
 */
class Gmi extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gmi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['links'], 'required'],
            [['links'], 'string', 'max' => 255],
            [['links'] , 'unique' , 'comboNotUnique' => 'Username already taken!',  'targetClass' => 'app\models\Gmi'],
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
