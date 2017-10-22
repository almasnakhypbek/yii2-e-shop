 <section>
        <div class="container">
            <div class="row">
                <?php if( !empty($hits) ):  ?>
                <h2 class="title text-center">Каталог товаров</h2>
                <?php
                foreach ($hits as $hit):
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 -col-xs-4">
                    <a style="display: block;" href="<?= \yii\helpers\Url::to(['category/product', 'id' => $hit->id ]); ?>">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <span style="text-align: center;">
                                        <?= \yii\helpers\Html::img("/{$hit->img}", ['alt' => $hit->name, 'class' => 'img-responsive', 'style' => 'height:91%; width:100%;']); ?>
                                    </span>
                                    <p><?= $hit->name ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <?php
            endif;
            ?>
        </div>
     <div class="help-block"></div>

     <div class="container">
         <div class="recommended_items"><!--recommended_items-->
             <h2 class="title text-center" style="color: #cc3a3a;">Из новинок</h2>
             <hr>
             <div class="help-block"></div>

             <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner">

                     <?php
                     $count = count($news);
                     $i = 0;
                     foreach ($news as $new) :
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
                                         <img src="/<?= $new->img ?>" alt="<?= $new->name ?>" style="width: 380px; height: 350px;" class="text-center img img-responsive">
                                         <h4><?= $new->price ?> тг</h4>
                                         <p><?= $new->name ?></a></p>
                                         <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new->id]) ?>"><button type="button" class="btn btn-default" style="border-color: #cc3a3a;color:#cc3a3a;">Посмотреть</button></a>

                                     </div>
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
