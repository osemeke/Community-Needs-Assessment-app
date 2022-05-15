<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Community needs assessment questionnaire (1/2)';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr />

    <p>
        Thank you for taking the step to contribute. Fill your personal details an proceed to the next page of the questionnaire to complete the process.
    </p>

    <div class="row">
        <div class="col-md-6">

            <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Your Name') ?>

            <?= $form->field($model, 'gender')->dropDownList(
                ['Male' => 'Male', 'Female' => 'Female'],
                ['prompt' => '---Select Gender---']
            ) ?>

            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'disability')->dropDownList(
                ['Yes' => 'Yes', 'No' => 'No'],
                ['prompt' => '---Select---']
            )->label('Physical Disability') ?>

            <!-- </div>
        <div class="col-md-4"> -->

            <?= $form->field($model, 'lga')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'community')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ward')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>
            <!-- 
        </div>
        <div class="col-md-4"> -->

            <?= $form->field($model, 'age_range')->dropDownList(
                ['18-24' => '18-24', '25-34' => '25-34', '35-44' => '35-44', '45-54' => '45-54', '55-64' => '55-64', '65-74' => '65-74', '75+' => '75+'],
                ['prompt' => '---Select---']
            ) ?>

            <?= $form->field($model, 'education_obtained')->dropDownList(
                ['Primary' => 'Primary', 'Secondary' => 'Secondary', 'Diploma' => 'Diploma', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate'],
                ['prompt' => '---Select---']
            ) ?>

            <?= $form->field($model, 'employment_status')->dropDownList(
                [
                    'Employed' => 'Employed',
                    'Self-employed' => 'Self-employed',
                    'Student' => 'Student',
                    'Military' => 'Military',
                    'Pensioner' => 'Pensioner',
                    'Unable to work' => 'Unable to work',
                    'Out of work and looking for work' => 'Out of work and looking for work',
                    'Out of work but not currently looking for work' => 'Out of work but not currently looking for work',
                ],
                ['prompt' => '---Select---']
            ) ?>

            <?= $form->field($model, 'trade_skill')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save and Continue Questionnaire', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>