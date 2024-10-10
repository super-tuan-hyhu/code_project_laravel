<?php

namespace App\Repositories\Personnel;

use App\Repositories\RepositoriesInterface;

interface PersonnelRepositoryInterface extends RepositoriesInterface
{
    public function getPersonnel();

    // personnel Quit
    public function getPersonnelQuit();
}
