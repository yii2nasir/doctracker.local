<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpenceOther */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expence Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expence-other-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::$app->CommonHtml->goBack(\yii\helpers\Url::to(["index"])); ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'status',
            'amount',
            'amount_w',
            'purpose',
            'invoice',
            'date',
            'dc',
            'update_at',
        ],
    ]) ?>

</div>
