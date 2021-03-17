<?php

namespace App\Repository\Eloquent;

use App\Repository\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
