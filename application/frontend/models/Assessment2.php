<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "assessment".
 *
 * @property int $id
 * @property string $community
 * @property string $gender
 * @property string|null $stage
 * @property int $completed
 */
class Assessment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['community', 'gender'], 'required'],
            [['completed'], 'integer'],
            [['community'], 'string', 'max' => 500],
            [['gender'], 'string', 'max' => 10],
            [['stage'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'community' => 'Community',
            'gender' => 'Gender',
            'stage' => 'Stage',
            'completed' => 'Completed',
        ];
    }

//http://www.bsourcecode.com/yiiframework2/yii2-0-activeform-input-fields/
    // https://stackoverflow.com/questions/31447613/yii2-how-to-use-radio-button-value-in-controller-for-further-execution

    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';

    public static function getGenderList()
    {
        return [
            self::GENDER_MALE => self::GENDER_MALE,
            self::GENDER_FEMALE => self::GENDER_FEMALE,
            //other values
        ];
    }
//    <?= $form->field($model, 'gender')->radioList($model->getGenderList())




}

/*
You need to check $model->status attribute for this values.

if($model->status == 'Approved' || $model->status == 'Dispatch')
{
    //do stuff
}
To make it easy I suggest to you store your values as constants. E.g.

class MyActiveRecord extends \yii\db\ActiveRecord
{
    const STATUS_APPROVED = 1;
    const STATUS_DISPATCH = 2;
    //and so on

    public static function getStatusList()
    {
         return [
             self::STATUS_APPROVED => 'Approved',
             self::STATUS_DISPATCH => 'Dispatch',
             //other values
         ];
    }
}
And then in controller

if($model->status == MyActiveRecord::STATUS_APPROVED ||
   $model->status == MyActiveRecord::STATUS_DISPATCH)
{
    //do stuff
}
Also it will make your view more readable:

<?= $form->field($model, 'status')->radioList($model->getStatusList())?>
*/


/*
implode and explode to weok the array and comma seperating value
<?= $form->field($model, 'country')->checkboxList(['FR'=>'France', 'DE'=>'Germany']) ?>


if(isset($_POST['Admin_user_groups']))
{
    $model->attributes=implode(',',$_POST['Admin_user_groups']);
    if($model->save())
        $this->redirect(array('view','id'=>$model->group_id));
}
 */