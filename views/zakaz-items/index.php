<?php

use app\models\ZakazItems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ZakazItemsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'История Заказы ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать  ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_purchase',
            'id_product',
            'price',
            'count',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ZakazItems $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
