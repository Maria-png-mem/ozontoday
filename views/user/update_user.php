<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Обновить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 120])?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+7 (999) 999 99 99',
    ]);?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'id_city')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'sex')->dropDownList([ 'муж' => 'Муж', 'жен' => 'Жен', 'не укажу' => 'Не укажу', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency')->dropDownList([ 'rub' => 'rub', 'euro' => 'euro', 'usd' => ' usd', ], ['prompt' => ''])  ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
