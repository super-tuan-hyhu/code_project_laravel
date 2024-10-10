<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepositories;

class UserRepository extends BaseRepositories implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getClient()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function getUser($id)
    {
        return $this->model->where('id', $id)->get();
    }

}
