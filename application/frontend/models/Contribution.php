<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contribution".
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string|null $email
 * @property string $lga
 * @property string $community
 * @property string $ward
 * @property string $unit
 * @property string $gender
 * @property string $disability
 * @property string $age_range
 * @property string $education_obtained
 * @property string $employment_status
 * @property string $trade_skill
 * @property int $date_created
 * @property int $completed
 */
class Contribution extends \yii\db\ActiveRecord
{

    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contribution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone_number', 'lga', 'community', 'ward', 'unit', 'gender', 'disability', 'age_range', 'education_obtained', 'employment_status', 'trade_skill', 'date_created'], 'required'],
            [['date_created', 'completed'], 'integer'],
            [['name', 'phone_number', 'email', 'trade_skill'], 'string', 'max' => 100],
            [['lga', 'community', 'ward', 'unit'], 'string', 'max' => 500],
            [['gender', 'age_range'], 'string', 'max' => 10],
            [['disability'], 'string', 'max' => 5],
            [['education_obtained'], 'string', 'max' => 20],
            [['employment_status'], 'string', 'max' => 100],

            ['email', 'email'],
            ['phone_number', 'match', 'pattern' => '/^\d{11}$/', 'message' => 'Must contain exactly 11 digits mobile number like 08012345678'],

            ['verifyCode', 'captcha'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'lga' => 'LGA',
            'community' => 'Community',
            'ward' => 'Ward',
            'unit' => 'Unit',
            'gender' => 'Gender',
            'disability' => 'Disability',
            'age_range' => 'Age Range',
            'education_obtained' => 'Education Obtained',
            'employment_status' => 'Employment Status',
            'trade_skill' => 'Trade Skill',
            'date_created' => 'Date Created',
            'completed' => 'Completed',
            
            'verifyCode' => 'Verification Code',

        ];
    }

    public $quizAnswers;
    public $answersArray = array();

    public function getQuizAnswer($id)
    {
        if ($this->answersArray == null) {
            $this->quizAnswers = Answer::find()->where(['contribution_id'=> $this->id])->asArray()->all();
            foreach ($this->quizAnswers as $key => $value) {
                $this->answersArray[$value['quiz_id']] = $value['response'];
            }
        }
        return $this->answersArray[$id] ?? 'n/a';
    }
    
}
