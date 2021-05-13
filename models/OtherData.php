<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "other_data".
 *
 * @property int $id
 * @property string|null $c1 Какие-то там данные типа строка
 * @property int|null $c2 Какие-то там данные типа int
 */
class OtherData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'other_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c2'], 'integer'],
            [['c1'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c1' => 'C1',
            'c2' => 'C2',
        ];
    }
}
