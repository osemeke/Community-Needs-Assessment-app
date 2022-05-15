<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$i = 0;
$sect = '';

$this->title = 'Community needs assessment questionnaire (2/2)';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr />

    <p>
        Please kindly provide the answers to the below listed questions as much as you know correctly
    </p>

    <div class="row">
        <div class="col-md-6">



            <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],]); ?>

            <?php foreach ($answers as $index => $answer) : ?>
                <?php $i++; ?>

                <?php if ($answer->section != $sect) : ?>
                    <strong><span style="color:grey;"><?= $answer->section ?></span></strong>
                    <?php $sect = $answer->section ?>
                <?php endif ?>

                <div class="form-group field-answer-<?= $index ?>-response required">
                    <label for="answer-<?= $index ?>-response"><span style="font-style:italic;"><?= $i; ?>. <?= $answer->question ?></span></label>
                    <?php
                    if ($answer->type == 1) echo $form->field($answer, "[$index]response")->radioList($answer->options)->label(false);
                    if ($answer->type == 2) echo $form->field($answer, "[$index]response")->label(false);
                    if ($answer->type == 3) echo $form->field($answer, "[$index]response")->textarea(['rows' => '3'])->label(false);
                    ?>
                </div>

            <?php endforeach ?>

            <div class="form-group">
                <?= Html::submitButton('Submit Questionnaire', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end() ?>

        </div>
    </div>

</div>