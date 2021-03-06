<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-category-index">
    <div class="pull-right">
        <?php echo common\widgets\Alert::widget(); ?>
    </div>
    <h1><?= Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Create Asset Category', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
//            'created_at',
//            'updated_at',
//            'status',

            ['class' => 'yii\grid\ActionColumn', 'header' => 'Actions', 'headerOptions' => ['style' => 'color:#337ab7']],
        ],
    ]); ?>
</div>
