<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $items =[];
    if( Yii::$app->user->isGuest ){
        $items[] =['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[] =['label' => 'Вход', 'url' => ['/site/login']];

    }else{
        if(Yii::$app->user->identity->role ==1){
            $items[] =['label' => 'Админ панель', 'url' => ['/admin']];

        } else {
            $items[] =['label' => 'Профиль ', 'url' => ['/user']];

        }
        $items[]=    '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        // 'items' => $items,
        'items' => $items,
    //         ['label' => 'Гланая ', 'url' => ['/site/index']],
    //         ['label' => 'О нас', 'url' => ['/site/about']],
    //         ['label' => 'Регистрация', 'url' => ['/user/create']],
    //         ['label' => 'Банковские карты', 'url' => ['/bank-card/index']],
    //         ['label' => 'Корзина', 'url' => ['/basket/index']],
    //         ['label' => 'Катерогии', 'url' => ['/category/index']],
    //         ['label' => 'Города', 'url' => ['/city/index']],
    //         ['label' => 'Комменатрии', 'url' => ['/comment/index']],
    //         ['label' => 'Компании', 'url' => ['/company/index']],
    //         ['label' => 'Доставка', 'url' => ['/delivery-adress/index']],
    //         ['label' => 'Изображения', 'url' => ['/img-product/index']],
    //         ['label' => 'Избранное', 'url' => ['/like/index']],
    //         ['label' => 'Продукты', 'url' => ['/product/index']],
    //         ['label' => 'Заказы', 'url' => ['/purchase/index']],
    //         ['label' => 'История', 'url' => ['/zakaz-items/index']],
    //         ['label' => 'Пользователи', 'url' => ['/user/index']],
    //         Yii::$app->user->isGuest ? (
    //             ['label' => 'Вход', 'url' => ['/site/login']]
    //         ) : (
    //             '<li>'
    //             . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
    //             . Html::submitButton(
    //                 // заменили на логин
    //                 'Выйти (' . Yii::$app->user->identity->login . ')',
    //                 ['class' => 'btn btn-link logout']
    //             )
    //             . Html::endForm()
    //             . '</li>'
    //         )
    //     ],
      ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
