<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetCategory */

$this->title = 'Update Asset Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Asset Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-category-update">
	<?= Yii::$app->CommonHtml->goBackWithConfirm(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
