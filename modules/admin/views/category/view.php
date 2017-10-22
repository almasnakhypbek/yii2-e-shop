<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a('Вернуться к списку', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить категорию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            /*[
                'attribute' => 'parent_id',
                'value' => $model->category->name ? $model->category->name : 'Самостоятельная категория',
            ],*/
            'name',
            'keywords',
            'description',
            [
                'attribute' => 'img',
                'value' => "<img src='/{$model->img}' class='img-responsive' >",
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
