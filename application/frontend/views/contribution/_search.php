<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContributionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contribution-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'lga') ?>

    <?php // echo $form->field($model, 'community') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'disability') ?>

    <?php // echo $form->field($model, 'age_range') ?>

    <?php // echo $form->field($model, 'education_obtained') ?>

    <?php // echo $form->field($model, 'employment_status') ?>

    <?php // echo $form->field($model, 'trade_skill') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'completed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
