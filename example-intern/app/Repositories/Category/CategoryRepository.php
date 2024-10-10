<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepositories;

class CategoryRepository extends BaseRepositories implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getCategory()
    {
        return $this->model->all();
    }

    public function getProductsTotal()
    {
        return $this->model
                            ->selectRaw('category.id as id,
                                        category.name_cate as name,
                                        category.image_cate as img,
                                        COUNT(products.id) as countProduct,
                                        MIN(products.discount) as minProducts,
                                        MAX(products.discount) as maxProducts,
                                        SUM(products.discount) as avgProducts')
                            ->leftJoin('products', 'category.id', '=', 'products.id_category')
                            ->groupBy('category.id', 'category.name_cate', 'category.image_cate')
                            ->orderBy('id', 'desc')
                            ->get();

    }
}
