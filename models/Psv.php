<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "psv".
 *
 * @property int $id
 * @property string $links
 */
class Psv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psv';
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
