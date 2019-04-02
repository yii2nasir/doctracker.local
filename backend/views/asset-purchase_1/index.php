<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetPurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Purchases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-purchase-index">
     <div class="pull-right">
        <?php echo common\widgets\Alert::widget() ?>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asset Purchase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'attribute' => 'ro_id',
                'value' => 'ro.code',
                'filter' => Html::activeDropDownList($searchModel, 'ro_id', yii\helpers\ArrayHelper::map(\backend\models\Ro::find()->where(['status' => 1])->all(), 'id', 'code'), ['class' => 'form-control', 'prompt' => 'Select']),
            ],
            [
                'attribute' => 'asset_category_id',
                'value' => 'assetCategory.name',
                'filter' => Html::activeDropDownList($searchModel, 'asset_category_id', yii\helpers\ArrayHelper::map(\backend\models\AssetCategory::find()->where(['status' => 1])->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select']),
            ],
            'name',
            'purpose',
            'members_of_purchase_committee',
            'date',
            [
                'attribute' => 'vendor_id',
                'value' => 'vendor.company_name',
                'filter' => Html::activeDropDownList($searchModel, 'vendor_id', yii\helpers\ArrayHelper::map(\backend\models\Vendor::find()->where(['status' => 1])->all(), 'id', 'company_name'), ['class' => 'form-control', 'prompt' => 'Select']),
            ],
            'amount',
              [
                'attribute' => 'project_id',
                'value' => 'project.name',
                'filter' => Html::activeDropDownList($searchModel, 'project_id', yii\helpers\ArrayHelper::map(\backend\models\Project::find()->where(['status' => 1])->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select']),
            ],
//            '',
            //'created_at',
            //'updated_at',
            //'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
