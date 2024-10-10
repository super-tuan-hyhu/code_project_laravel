<?php

namespace App\Repositories\Personnel;

use App\Models\Personnel;
use App\Repositories\BaseRepositories;

class PersonnelRepository extends BaseRepositories implements PersonnelRepositoryInterface
{
    public function getModel()
    {
        return Personnel::class;
    }

    public function getPersonnel()
    {
        return $this->model->paginate(5);
    }

    public function getPersonnelQuit()
    {
        return $this->model->onlyTrashed()->get();
    }
}
