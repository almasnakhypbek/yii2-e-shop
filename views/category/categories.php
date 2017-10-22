<ul class="breadcrumb">
    <li><a href="<?= \yii\helpers\Url::home() ?>">На главную</a></li>
    <li class="active">Подкатегории</li>
</ul>`
<div class="content-two">
<section>
    <div class="container">
        <div class="row">
            <?php if( !empty($categories) ):  ?>
            <h2 class="title text-center">Каталог подкатегории</h2>
            <?php
            foreach ($categories as $category):
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4">
                    <a style="display: block;" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category->id ]); ?>">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                        <?= \yii\helpers\Html::img("/{$category->img}", ['alt' => $category->name,'height' => 240, 'width' => 'auto' ]); ?>
                                    <p><?= $category->name ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <?php else :  ?>
            <h2>В данной категории нет товаров</h2>
        <?php
        endif;
        ?>
    </div>
</section>