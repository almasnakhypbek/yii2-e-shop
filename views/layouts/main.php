
<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 16:00
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Navbar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\OptionalAppAsset;
use app\models\Category;


AppAsset::register($this);
OptionalAppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody() ?>
<header id="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="dws-menu hidden-lg hidden-md visible-xs visible-sm">
                    <div class="mobile-menu ">
                        <input class="nav-burger__checkbox" type="checkbox" id="burger">
                        <label class="nav-burger" for="burger">Меню</label>
                        <nav class="nav">
                        <?php
                            $items = Category::find()->where(['parent_id' => '0'])->all();
                            foreach ($items as $item)
                                echo "<a style='text-decoration:none;' class='nav__item' href='". \yii\helpers\Url::to(['category/product', 'id' => $item->id])."'>". $item->name ."</a>";
                        ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 -col-xs-6">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home() ?>"><?= Html::img('@web/images/logo.png', ['alt' => 'Apple Juice'] ) ?></a>
                        <p>Вся техника Apple по сочным ценам <a href="tel:+77059839393"><span>+7 (705) 983 9393</span></a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 -col-xs-6 right-nav">
                    <div class="shop-menu pull-right">
                        <ul class="navv navbar-nav">
                            <li><a href="#" onclick="return getCard()"><i class="fa fa-shopping-cart"> Корзина</i></a></li>
                        </ul>
                    </div><br><br><br>
                    <div class="search_box search-nav">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search']) ?>">
                            <input type="text" placeholder="Найти технику"/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="dws-menu hidden-xs hidden-sm">
                        <ul>
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])  ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <div class="slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img style="width: 100%; height: 900px;" src="/images/la.jpg" alt="Los Angeles">
                </div>

                <div class="item">
                    <img style="width: 100%; height: 900px;" src="/images/chicago.jpg" alt="Chicago">
                </div>

                <div class="item">
                    <img style="width: 100%; height: 900px;" src="/images/ny.jpg" alt="New York">
                </div>

                <div class="item">
                    <img style="width: 100%; height: 900px;" src="/images/phones.jpg" alt="New York">
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class=""></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class=""></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <section>
        <div class="container" style="padding-bottom: 100px;padding-top: 100px;">
            <?=

            $content;

            ?>
        </div>
    </section>
</div>

<footer id="footer-Section">
    <div class="footer-top-layout">
        <div class="container">
            <div class="row">
                <div class="ajpro">
                    <h4>Интернет-Магазин AppleJuice</h4>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 -col-xs-8 col-lg-offset-2">
                    <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4">
                        <div class="footer-col-item">
                            <h4>Наш адрес</h4>
                            <address>
                                пр. Абая, 109В, БЦ Globus, 3-этаж<br>г.Алматы, Казахстан
                            </address>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4">
                        <div class="footer-col-item">
                            <h4>Контакты</h4>
                            <div class="item-contact"> <a href="tel:+77273274330"><i class="fa fa-phone"></i><span>+7 727 327 43 30</span></a> <a href="tel:+77059839393"><i class="fa fa-phone"></i><span>+7 705 983 93 93</span></a> <a href="mailto:sales@applejuice.kz"><i class="fa fa-envelope"></i><span>sales@applejuice.kz</span></a> <a href="mailto:info@applejuice.kz"><i class="fa fa-envelope"></i><span>info@applejuice.kz</span></a> </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4">
                        <div class="footer-col-item">
                            <h4>Каталог</h4>
                            <?php
                            $items = Category::find()->where(['parent_id' => '0'])->all();
                            foreach ($items as $item)
                                echo "<a style='text-decoration:none; color:#ffffff;' href='". \yii\helpers\Url::to(['category/product', 'id' => $item->id])."'>". $item->name ."</a><br>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-layout">
        <div class="socialMedia-footer"> <a href=""><i class="fa fa-instagram"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-vk"></i></a></div>
        <div class="copyright-tag">Copyright © Applejuice | Все права защищены</div>
    </div>
</footer>

<?php

\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'card',
    'size' => 'modal-lg',
    'footer' => '<div class="form-group" style="display: inline-block"><button type="button" class="btn btn-default" data-dismiss="modal">Продолжить</button>
                          <a href="' . \yii\helpers\Url::to(['/card/view']) . '" type="button" class="btn btn-success" style="width: 33.33333%;">Оформить заказ</a>
                          <button type="button" class="btn btn-danger " onclick="clearCard()">Очистить корзину</button></div>',

]);

yii\bootstrap\Modal::end();
?>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
