<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            'status',
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

</div>

<?php $items = $model->orderItems; ?>

<div class="table-responsible">
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
<!--            <th>Фото</th>-->
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
        <tr>
<!--            <?//= \yii\helpers\Html::img("@web/images/products/{$item->product_id}", ['alt' => $item['name'],'height' => 50 ]); ?> -->
            <td><a href="<?= Url::to(['/product/view', 'id' => $item->product_id]) ?>"><?= $item['name'] ?></a></td>
            <td><?= $item['qty_item'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?= $item['sum_item'] ?></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>