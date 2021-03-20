<?php

namespace App\Repository\Eloquent;

use App\Repository\CategoryRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
