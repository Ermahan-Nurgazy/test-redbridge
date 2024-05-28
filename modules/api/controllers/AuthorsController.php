<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Authors;
use app\modules\api\services\AuthorsService;

class AuthorsController extends \yii\rest\Controller
{

    private $authorsService;

    public function __construct($id, $module, AuthorsService $authorsService, $config = [])
    {
        $this->authorsService = $authorsService;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => '\yii\filters\Cors',
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];

        return $behaviors;
    }


    protected function verbs()
    {
        return [
            'index' => ['GET', 'OPTIONS'],
            'create' => ['POST', 'OPTIONS'],
            'update' => ['PUT', 'OPTIONS'],
            'delete' => ['POST', 'OPTIONS'],
        ];
    }

    public function actionIndex()
    {
        $models = $this->authorsService->getAll();

        if (!$models) {
            return ['success' => false];
        }

        return ['success' => true, 'authors' => $models];
    }

    public function actionCreate()
    {
        $model = new Authors();

        if ($model->load(\Yii::$app->request->post()) && $this->authorsService->create($model)) {
            return ['success' => true];
        }

        return ['success' => false];
    }

    public function actionUpdate($id)
    {
        $model = $this->authorsService->getById($id);

        if (!$model) {
            return ['success' => false];
        }

        if ($model->load(\Yii::$app->request->post()) && $this->authorsService->update($id, $model)) {
            return ['success' => true];
        }

        return ['success' => false];
    }

    public function actionDelete($id)
    {
        if ($this->authorsService->delete($id)) {
            return ['success' => true];
        }

        return ['success' => false];
    }

}