<?php

namespace App\Console\Commands;

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
        Product::destroy($this->argument('product'));
    }
}
