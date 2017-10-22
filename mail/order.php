<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 21.07.2017
 * Time: 22:49
 */
?>
    <div class="table-responsible">
        <table style="width: 75%; border: 1px solid #ddd; border-collapse: collapse;" class="table table-hover table-stripped">
            <thead>
            <tr style="background: #f9f9f9;">
                <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['card'] as $id => $item): ?>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['name'] ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] * $item['price'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">Итого : </td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['card.qty'] ?></td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">На сумму : </td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['card.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
