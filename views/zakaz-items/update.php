<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ZakazItems $model */

$this->title = '  Изменить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zakaz Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zakaz-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
