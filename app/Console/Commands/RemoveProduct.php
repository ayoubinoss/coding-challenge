<?php

namespace App\Console\Commands;

use App\Repository\ProductRepositoryInterface;
use Illuminate\Console\Command;
use App\Models\Product;

class RemoveProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:remove
                            {product : the product ID}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a product from the database';

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * Create a new command instance.
     *
     * @param ProductRepositoryInterface $productRepository
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
        //Product::destroy($this->argument('product'));
        $this->productRepository->delete($this->argument('product'));
    }
}
