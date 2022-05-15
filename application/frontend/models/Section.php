<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property string $description
 * @property int $sort_order
 * @property int $active
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['sort_order', 'active'], 'integer'],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'sort_order' => 'Sort Order',
            'active' => 'Active',
        ];
    }
    
    public function getQuizzes()
    {
        return $this->hasMany(Quiz::className(), ['section_id' => 'id']);
    }
    
}
