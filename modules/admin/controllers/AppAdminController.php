<?php

/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 23.07.2017
 * Time: 16:33
 */


namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;


class AppAdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ];
    }

}