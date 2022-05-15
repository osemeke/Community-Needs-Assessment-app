<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\QuizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quizzes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quiz', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'section_id',
                'value' => 'section_id',
                'contentOptions' => ['style' => 'width: 2em;'],
            ],
            'question',

            [
                'attribute' => 'active',
                'value' => 'active',
                'contentOptions' => ['style' => 'width: 2em;'],
            ],
            [
                'label' => '',
                'format' => 'raw',
                'value' => function ($data) {
                    return
                        Html::a('Update', ['update?id=' . $data->id])
                        . " <font color='#c9c9c9'>|</font> " . Html::a('View', ['view?id=' . $data->id]);
                },
            ],            
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, frontend\models\Quiz $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
