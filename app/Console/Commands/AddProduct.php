<?php

namespace App\Console\Commands;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arguments = $this->arguments();
        $product = new Product;
        $product->name = $arguments['name'];
        $product->description = $arguments['description'];
        $product->price = $arguments['price'];
        $product->image = $arguments['image'];
        $product->save();
        //insert into the intermediate table ( product_category )
        foreach ($arguments['category'] as $category) {
            $product->categories()->attach(Category::$category);
        }
    }
}
