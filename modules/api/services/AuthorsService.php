<?php

namespace app\modules\api\services;

use app\modules\api\models\Authors;
use app\modules\api\repositories\AuthorsRepository;

class AuthorsService
{
    private $authorsRepository;

    public function __construct(AuthorsRepository $authorsRepository)
    {
        $this->authorsRepository = $authorsRepository;
    }

    public function getAll()
    {
        return $this->authorsRepository->getAll();
    }

    public function create(Authors $author)
    {
        return $this->authorsRepository->save($author);
    }

    public function update($id, Authors $author)
    {
        $model = $this->authorsRepository->getById($id);

        if (!$model) return false;

        $model->name = $author->name;
        $model->birth_year = $author->birth_year;
        $model->country = $author->country;

        return $this->authorsRepository->save($model);
    }

    public function delete($id)
    {
        return $this->authorsRepository->delete($id);
    }

    public function getById($id)
    {
        return $this->authorsRepository->getById($id);
    }

}