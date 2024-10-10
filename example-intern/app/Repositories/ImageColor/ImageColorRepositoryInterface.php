<?php

namespace App\Repositories\ImageColor;

use App\Repositories\RepositoriesInterface;

interface ImageColorRepositoryInterface extends RepositoriesInterface
{
    public function getImageColor($id_color);
}
