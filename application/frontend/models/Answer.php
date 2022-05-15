<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property int $contribution_id
 * @property int $quiz_id
 * @property string|null $response
 */
class Answer extends \yii\db\ActiveRecord
{

    public $section;
    public $question;
    public $type;
    public $options;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contribution_id', 'quiz_id', 'response'], 'required'],
            [['contribution_id', 'quiz_id'], 'integer'],
            [['response'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contribution_id' => 'Contribution ID',
            'quiz_id' => 'Quiz ID',
            'response' => 'Response',
        ];
    }


    public function getQuiz()
    {
        return $this->hasOne(Quiz::className(), ['id' => 'quiz_id']);
    }

}
