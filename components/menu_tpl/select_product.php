<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 18:44
 */


?>


<option
    value="<?= $category['id'] ?>"
    <?php if($category['id'] == $this->model->category_id) echo 'selected' ?>
><?= $tab . $category['name'] ?>
</option>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHtml($category['childs'], $tab . ' - ') ?>
    </ul>
<?php endif; ?>
