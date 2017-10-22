<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 21:02
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Category::find()->where(['parent_id' => '0'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $this->setMeta('AppleJuice');
        return $this->render('index',compact('hits','news'));
    }


    public function actionProduct($id)
    {
        $categories = Category::find()->where(['parent_id' => $id])->all();
        $this->setMeta('AppleJuice');
        return $this->render('categories', compact('categories'));
    }


    public function actionView($id)
    {
//        $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if( empty($category) )
        {
            throw new \yii\web\HttpException(404, 'Такой категории нет');
        }

        //debug($id);
        //$products = Product::find()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('AppleJuice | ' . $category->name , $category->keywords, $category->description);


        return $this->render('view', compact('products','category', 'pages'));
    }

    public function actionSearch()
    {

        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('AppleJuice | ' . $q);
/*
        if(!$q)
            return $this->render('search');*/

        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search' , compact('products
        ', 'pages', 'q'));

    }



}
