<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Assessment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assessment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'community')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList($model->getGenderList()) ?>

    <?= $form->field($model, 'stage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'completed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save and Continue', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

