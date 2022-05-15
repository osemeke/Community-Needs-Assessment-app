<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contribution */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contribution-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'phone_number',
            'email:email',
            'lga',
            'community',
            'ward',
            'unit',
            'gender',
            'disability',
            'age_range',
            'education_obtained',
            'employment_status',
            'trade_skill',
            'date_created:datetime',
        ],
    ]) ?>

    <?php foreach ($sections as $section) : ?>

        <div class="card" style="margin-bottom: 15px;">
            <div class="card-header">
                <?= $section->description ?>
            </div>
            <div class="card-body">

                <?php foreach ($section->quizzes as $quiz) : ?>
                    <h5 class="card-title"><?= $quiz->question ?></h5>
                    <p class="card-text"><?= $model->getQuizAnswer($quiz->id) ?></p>
                <?php endforeach ?>

            </div>
        </div>

    <?php endforeach ?>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>