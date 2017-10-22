<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 21.07.2017
 * Time: 20:50
 */

namespace app\controllers;

use app\models\Product;
use app\models\Card;
use app\models\Order;
use app\models\OrderItems;
use Yii;

class CardController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        //        debug($id);


        if(empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();
        $card = new Card();
        $card->addToCard($product, $qty);

        /*debug($session['card']);
        debug($session['card.qty']);
        debug($session['card.sum']);*/

        if( !Yii::$app->request->isAjax )
        {
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('card-modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('card');
        $session->remove('card.qty');
        $session->remove('card.sum');
        $this->layout = false;
        return $this->render('card-modal', compact('session'));
    }

    public function actionDeleteItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $card = new Card();
        $card->recalc($id);
        $this->layout = false;
        return $this->render('card-modal', compact('session'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('card-modal', compact('session'));
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();

        if( $order->load(Yii::$app->request->post()) )
        {
            $order->qty = $session['card.qty'];
            $order->sum = $session['card.sum'];
            if( $order->save() )
            {
                $this->saveOrderItems($session['card'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами :)');
                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['price_mail_qty@mail.ru' => 'Applejuice.kz'])
                    ->setTo($order->email)
                    ->setSubject('Заказ с сайта AppleJuice')
                    ->send();
                $session->remove('card');
                $session->remove('card.qty');
                $session->remove('card.sum');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при оформлении заказа. Попробуйте еще раз');
            }

        }

        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item)
        {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }



}