<?php

namespace App\Console\Commands;

use App\Repository\ProductRepositoryInterface;
use Illuminate\Console\Command;
use App\Models\Product;

class AddProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:add
                            {name : The product name}
                            {description : The product description}
                            {price : The product price}
                            {image : The product image location}
                            {category* : The id of the categories which the product belongs to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a product to the database';
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * Create a new command instance.
     *
     * @param ProductRepositoryInterface $productRepository
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product = $this->productRepository->create($this->arguments());
        //insert into the intermediate table ( product_category )
        foreach ($this->argument('category') as $category) {
            $product->categories()->attach($category);
        }
    }
}
