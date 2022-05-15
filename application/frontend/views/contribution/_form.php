<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contribution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contribution-form">

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'community')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ward')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(
        ['Male' => 'Male', 'Female' => 'Female'], //'id','label'
        ['prompt' => '---Select Gender---']
    ) ?>

    <?= $form->field($model, 'disability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age_range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_obtained')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employment_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_skill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'completed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>