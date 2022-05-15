<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContributionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contributions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribution-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Download', ['download'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'phone_number',
            // 'email:email',
            'lga',
            'community',

            [
                'label' => '',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a('View', ['view?id=' . $data->id]);
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>