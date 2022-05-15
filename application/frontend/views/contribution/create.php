<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contribution */

$this->title = 'Create Contribution';
$this->params['breadcrumbs'][] = ['label' => 'Contributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribution-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
