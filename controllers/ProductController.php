<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 21.07.2017
 * Time: 15:17
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
class ProductController extends AppController
{

    public function actionView($id)
    {
        // Product ID
//        $id = Yii::$app->request->get('id');
        // Get Product Info by ID
        $product = Product::findOne($id);

        if( empty($product) )
        {
            throw new \yii\web\HttpException(404, 'Такого товара нет');
        }

/*        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();*/

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('AppleJuice | ' . $product->name , $product->keywords, $product->description);
        return $this->render('view' , compact('product', 'hits'));

    }

}