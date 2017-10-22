<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 21.07.2017
 * Time: 15:33
 */

use yii\helpers\Html;

?>
<div class="content-two">
    <ul class="breadcrumb">
        <li><a href="<?= \yii\helpers\Url::home() ?>">На главную</a></li>
        <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id])?>"><?= $product->category->name; ?></a></li>
        <li class="active"><?= $product->name ?></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-12 product-2">
                <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4 item-photo">
                    <img style="max-width:100%;" class="product-img" src="/<?= $product->img ?>" />
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 -col-xs-5" style="border:0px solid gray">
                    <legend><h3><?= $product->name ?></h3></legend>
                    <h4 class="title-price">Цена</h4>
                    <h3 style="margin-top:0px;"><?= $product->price ?> тг</h3>
                    <div class="help-block"></div>
                    <div class="section" style="padding-bottom:5px;">
                        <h4 class="title-price">В кредит</h4>
                        <div style="font-size: 15px;">
                            <div class="attr2">3 мес</div>
                            <div class="attr2">6 мес</div>
                            <div class="attr2">12 мес</div>
                            <div class="attr2">24 мес</div>
                        </div>
                    </div>
                    <div class="help-block"></div>
                    <div  class="section" style="padding-bottom:20px;">
                        <h4 class="title-attr">Количество</h4>
                        <div>
                            <input value="1" type="text" id="qty" />
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <a  href="#" class="btn btn-success add-to-cart cart" data-id="<?= $product->id ?>"><span style="margin-right:20px" class="fa fa-shopping-cart" aria-hidden="true"></span>Добавить в Корзину</a>
                    </div>
                    <div class="help-block"></div>
                    <div class="section">
                        <legend><h4>Описание товара</h4></legend>
                        <p><?= $product->content ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<div class="container">
    <div class="recommended_items"><!--recommended_items-->
        <div class="help-block"></div>
        <h3 class="title text-center" style="color: #cc3a3a;">С этим товаром покупают </h3>
        <hr>
        <div class="help-block"></div>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php
                $count = count($hits);
                $i = 0;
                foreach ($hits as $hit) :
                    ?>
                    <?php
                    if( $i % 3 ==0 ) :
                        ?>
                        <div class="item <?php if($i == 0) echo 'active' ?>">
                        <?php
                    endif;
                    ?>
                    <div class="col-md-4">
                        <div class="product-image-wrapper" style="height: 550px; padding: 15px;">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/<?= $hit->img ?>" alt="<?= $hit->name ?>" style="width: 380px; height: 350px;" class="text-center img img-responsive">
                                    <h4><?= $hit->price ?> тг</h4>
                                    <p><?= $hit->name ?></a></p>
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><button type="button" class="btn btn-default" style="border-color: #cc3a3a;color:#cc3a3a;">Посмотреть</button></a>
                                </div>
                                <?php if($hit->sale) : ?>
                                    <?= Html::img("@web/img/sale.png", [
                                        'alt' => $hit->name,
                                        'class' => 'sale'
                                    ]); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    if( $i % 3 ==0  || $i == $count) :
                        ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    <?php

                endforeach;

                ?>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" style="height: 550px;background: none;" href="#recommended-item-carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" style="margin-left: -100px;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" style="height: 550px;background: none;" href="#recommended-item-carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" style="margin-right: -100px;"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div><!--/recommended_items-->

</div>
</section>

