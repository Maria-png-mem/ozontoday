<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ZakazItemsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_purchase') ?>

    <?= $form->field($model, 'id_product') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'count') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Отмена', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
