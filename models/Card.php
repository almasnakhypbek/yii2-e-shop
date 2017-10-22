<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 21.07.2017
 * Time: 20:50
 */

namespace app\models;

use yii\db\ActiveRecord;

class Card extends ActiveRecord
{
    public function addToCard($product, $qty = 1)
    {
        if(isset($_SESSION['card'][$product->id]))
        {
            $_SESSION['card'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['card'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
        }

        $_SESSION['card.qty'] = isset($_SESSION['card.qty']) ? $_SESSION['card.qty'] + $qty : $qty;
        $_SESSION['card.sum'] = isset($_SESSION['card.sum']) ? $_SESSION['card.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function recalc($id)
    {
        if(!isset($_SESSION['card'][$id])) return false;
        $qtySubstract = $_SESSION['card'][$id]['qty'];
        $sumSubstract = $_SESSION['card'][$id]['qty'] * $_SESSION['card'][$id]['price'];

        $_SESSION['card.qty'] -= $qtySubstract;
        $_SESSION['card.sum'] -= $sumSubstract;

        unset($_SESSION['card'][$id]);
    }

}