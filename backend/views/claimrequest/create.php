<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClaimRequest */

$this->title = 'Create Claim Request';
$this->params['breadcrumbs'][] = ['label' => 'Claim Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="claim-request-create">
	<?= Yii::$app->CommonHtml->goBackWithConfirm(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
