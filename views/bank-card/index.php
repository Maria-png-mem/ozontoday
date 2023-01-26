<?php

use app\models\BankCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\UserB;
/** @var yii\web\View $this */
/** @var app\models\BankCardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Банковские карты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать карту', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BankCard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]);

    $lrr =  Yii::$app->user->identity->id ;
    echo $lrr;

    ?>

    


</div>
