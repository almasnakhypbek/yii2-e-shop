
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
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 -col-xs-6">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home() ?>"><?= Html::img('@web/images/logo.png', ['alt' => 'Apple Juice'] ) ?></a>
                        <p>Вся техника Apple по сочным ценам <a href="tel:+77059839393"><span>+7 (705) 983 9393</span></a></p>
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
                            <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>" class="active">Заказы</a>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to(['product/index']) ?>">Список товаров</a>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to(['category/index']) ?>">Список категории</a>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::home() ?>">Веб</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <section>
        <div class="container" style="padding-bottom: 50px;padding-top: 50px;">
            <?=

            $content;

            ?>
        </div>
    </section>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
