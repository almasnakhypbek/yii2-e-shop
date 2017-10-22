<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 24.07.2017
 * Time: 2:15
 */


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Create Order';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>