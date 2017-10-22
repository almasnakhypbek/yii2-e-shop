<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 22:35
 */

use yii\helpers\Html;



?>

<div class="content-two">
    <ul class="breadcrumb">
        <li><a href="<?= \yii\helpers\Url::home() ?>">На главную</a></li>
        <li class="active"><?= $category->name ?></li>
    </ul>
<section>
    <div class="container">
        <div class="row">
                <?php if( !empty($products) ):  ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center"> Подкатегория - <?= $category->name ?></h2>
                        <?php
                        $i=0; foreach ($products as $product):
                            ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4">
                            <a style="display: block; text-decoration: none;color: #cc3a3a;" href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id ]); ?>">
                                <div class="product-image-wrapper-2">
                                    <div class="single-products-2">
                                        <div class="productinfo-2 text-center">
                                            <center>
                                                <img src="/<?= $product->img ?>" class="img-responsive" alt="<?= $product->name ?>" />
                                            </center>
                                            <h4><?= $product->name ?></h4><hr>
                                            <p>Цена</p>
                                            <h4><?= $product->price ?> тг</h4><hr>
                                            <p>В кредит</p>
                                            <h4><?php $sum = $product->price; $credit = $sum /24; echo round($credit) ."тг х 24 мес"  ?></h4>
                                            <a  href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id ]); ?>" style="text-decoration: none;color:#cc3a3a;"><button type="button" name="button">Купить</button></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                            $i++
                        ?>
                        <?php if($i % 3 == 0 ) : ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                            <?php
                        endforeach;
                        ?>
                    <div class="clearfix"></div>
                        <?php

                            echo \yii\widgets\LinkPager::widget([
                                    'pagination' => $pages,
                            ]);

                        ?>

                        <?php else :  ?>
                        <h2>В данной категории нет товаров</h2>
                    </div><!--features_items-->
                <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
