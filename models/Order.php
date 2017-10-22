<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 22.07.2017
 * Time: 5:14
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function getOrderItems()
    {
        return $this->hasMany(Order::className(), ['order_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

                'value' => new Expression('NOW()'),

            ],
        ];
    }

    public function rules()
    {

        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'boolean'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];

    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }


}