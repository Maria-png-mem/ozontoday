<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserB;

/** @var yii\web\View $this */
/** @var app\models\BankCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bank-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\UserB::find()->all(), 'id', 'fio')
    )
//    $lrr = [Yii::$app->user->identity->id,''];
//    var_dump($lrr[0]);
    ?>

<!--    --><?//= $form->field($model, 'id_user')->dropDownList($lrr)?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
