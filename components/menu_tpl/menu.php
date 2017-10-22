<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 18:44
 */
?>

<li>
    <a class="active" href="<?= \yii\helpers\Url::to(
        ['category/product', 'id' => $category['id']]
    ) ?>">
        <?= $category['name'] ?>
    </a>
</li>


