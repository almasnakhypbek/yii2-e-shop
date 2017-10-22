<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="container">

    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <?php
    if( !empty($session['card'])) :

        ?>

        <div class="table-responsible">
            <h2 align="center">Оформление заказа</h2>
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['card'] as $id => $item): ?>
                    <tr>
                        <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'],'height' => 50 ]); ?></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $item['name'] ?></a></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?> тг</td>
                        <td><?= $item['qty'] * $item['price'] ?> тг</td>
                        <td><span data-id="<?= $id ?>" class="text-danger del-item glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5">Итого : </td>
                    <td><?= $session['card.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="5">На сумму : </td>
                    <td><?= $session['card.sum'] ?> тг</td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="col-md-6">
        <?php $form = ActiveForm::begin()?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'address') ?>
        <?= $form->field($order, 'phone') ?>
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success', 'style' => 'width:30%;']) ?>
        <?php $form = ActiveForm::end()?>
        </div>
    <?php else: ?>

        <h3>Корзина пуста</h3>

    <?php endif; ?>

</div>

