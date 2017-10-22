<?php

/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 23.07.2017
 * Time: 16:19
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends AppAdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}