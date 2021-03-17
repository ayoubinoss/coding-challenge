<?php

namespace App\Console\Commands;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\Eloquent\CategoryRepository;
use Illuminate\Console\Command;
use App\Models\Category;

class AddCategory extends Command
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:add
                            {name : the name of the category}
                            {parent_category? : the ID of the parent category}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a category to the database';

    /**
     * Create a new command instance.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $category = new Category;
        $category->name = $this->argument('name');
        if ($this->argument('parent_category') !== null) {
            $category->parent_category_id = $this->argument('parent_category');
        }
        $category->save();
    }
}
