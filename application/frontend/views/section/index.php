<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\use frontend\models\Answer;
 */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Section', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'description',
            'sort_order',

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
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
