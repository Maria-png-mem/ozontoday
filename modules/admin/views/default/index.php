<?php

use app\models\Product;
use app\models\BankCard;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Админа панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [

            ['label' => 'Банковские карты', 'url' => ['/bank-card/index']],
            ['label' => 'Корзина', 'url' => ['/basket/index']],
            ['label' => 'Катерогии', 'url' => ['/category/index']],
            ['label' => 'Города', 'url' => ['/city/index']],
            ['label' => 'Комменатрии', 'url' => ['/comment/index']],
            ['label' => 'Компании', 'url' => ['/company/index']],
            ['label' => 'Доставка', 'url' => ['/delivery-adress/index']],
            ['label' => 'Изображения', 'url' => ['/img-product/index']],
            ['label' => 'Избранное', 'url' => ['/like/index']],
            ['label' => 'Продукты', 'url' => ['/product/index']],
            ['label' => 'Заказы', 'url' => ['/purchase/index']],
            ['label' => 'История', 'url' => ['/zakaz-items/index']],
            ['label' => 'Пользователи', 'url' => ['/user/index']],
         
        ],
      ]);
    ?>


   


</div>
