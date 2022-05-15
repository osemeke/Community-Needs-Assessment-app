<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property int $section_id
 * @property string $question
 * @property string|null $options
 * @property int $input_type
 * @property int $sort_order
 * @property int $active
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'question'], 'required'],
            [['section_id', 'input_type', 'sort_order', 'active'], 'integer'],
            [['question', 'options'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section',
            'question' => 'Question',
            'options' => 'Options (comma seperated)',
            'input_type' => 'Input Type',
            'sort_order' => 'Sort Order',
            'active' => 'Active',
        ];
    }


    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }

    public function getOptionsArray()
    {
        $arr = explode(",", $this->options);
        $result = [];
        foreach ($arr as $key => $value) $result[$value] = $value;
        return $result;
    }
}
