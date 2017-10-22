<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 24.07.2017
 * Time: 2:15
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>
    <?= $form->field($model, 'updated_at')->textInput() ?>
    <?= $form->field($model, 'qty')->textInput() ?>
    <?= $form->field($model, 'sum')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(['1' => 'Завершен', '0' => 'Активен']) ?>
    <?= $form->field($model, 'name')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxLength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
