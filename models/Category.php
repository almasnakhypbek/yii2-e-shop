<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 18:01
 */

namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {

        return $this->hasMany(Product::className(), ['category_id' => 'id']);

    }

}
