<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 21.07.2017
 * Time: 22:49
 */

    if( !empty($session['card'])) :

?>
    <div class="table-responsible">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($session['card'] as $id => $item): ?>
                <tr>
                    <td><?= \yii\helpers\Html::img("{$item['img']}", ['alt' => $item['name'],'height' => 50 ]); ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?> тг</td>
                    <td><span data-id="<?= $id ?>" class="text-danger del-item glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="4">Итого : </td>
                    <td><?= $session['card.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="4">На сумму : </td>
                    <td><?= $session['card.sum'] ?> тг</td>
                </tr>
            </tbody>
        </table>
    </div>

<?php else: ?>

<h3>Корзина пуста</h3>

<?php endif; ?>
