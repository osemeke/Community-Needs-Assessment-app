<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<style>
    .jumbotron {
        padding: 1rem 2rem;
    }

    .pick-block {
        width: -webkit-fill-available;
        width: 100%;
    }

    .sponsor-name {
        color: grey;
    }
</style>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h4 class="display-5 sponsor-name">Ovie Omo-Agege</h4>
        <h1 class="display-4">Community Needs Assessment</h1>

        <p class="lead">You can now help government know your needs directly.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::base() ?>/site/needs-assessment">Get started now</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <p>
                    <?= Html::img('@web/images/omo-agege.jpg', ['class' => 'pick-block']) ?>
                </p>
            </div>
            <div class="col-lg-4">
                <p>
                    <?= Html::img('@web/images/apc.webp', ['class' => 'pick-block']) ?>
                </p>
            </div>

            <div class="col-lg-4">
                <h6>What is a Community Needs Assessment?</h6>

                <p>A community needs assessment provides community leaders with a
                    snapshot of local policy, systems, and environmental change strategies
                    currently in place and helps to identify areas for improvement. With this
                    data, communities can map out a course for health improvement by
                    creating strategies to make positive and sustainable changes in their
                    communities.</p>
            </div>
        </div>

    </div>
</div>