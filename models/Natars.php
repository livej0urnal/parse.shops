<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "natars".
 *
 * @property int $id
 * @property string $links
 */
class Natars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'natars';
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
