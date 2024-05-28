<?php

namespace app\modules\api;

use yii\web\Response;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        parent::init();

        // custom initialization code goes here
    }
}
