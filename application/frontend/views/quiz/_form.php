<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Quiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\frontend\models\Section::find()->orderBy('sort_order')->all(), 'id', 'description'),
        ['prompt' => '---Select Section---']
    ) ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'options')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'input_type')->dropDownList(
                ['1' =>'Radio Buttons', '2' =>'Text Box', '3' => 'Text Area'], //'id','label'
                ['prompt' => '---Select Input Type---']
            ) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'sort_order')->textInput() ?>
        </div>
        <div class="col-md-4" style="padding-top: 38px;">
            <?= $form->field($model, 'active')->checkbox() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>