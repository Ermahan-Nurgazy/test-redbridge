<?php

namespace app\modules\api\repositories;

use app\modules\api\models\Authors;

class AuthorsRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Authors();
    }

    public function getAll()
    {
        return $this->model::find()->all();
    }

    public function save(Authors $authors)
    {
        return $authors->validate() && $authors->save();
    }

    public function delete(Authors $authors)
    {
        return $authors->delete();
    }

    public function getById($id)
    {
        return $this->model::findOne($id);
    }
}