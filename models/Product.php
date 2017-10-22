<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 18:01
 */

namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {

        return $this->hasOne(Category::className(), ['id' => 'category_id']);

    }

}