<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PurchaseSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>



    <?= $form->field($model, 'delivery_method') ?>

    <?= $form->field($model, 'full_price') ?>

    <?= $form->field($model, 'id_delivery') ?>

    <?php // echo $form->field($model, 'id_card') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'full_sale') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
