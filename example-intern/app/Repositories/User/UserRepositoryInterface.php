<?php

namespace App\Repositories\User;

use App\Repositories\RepositoriesInterface;

interface UserRepositoryInterface extends RepositoriesInterface
{
    public function getClient();
    public function getUser($id);
}
