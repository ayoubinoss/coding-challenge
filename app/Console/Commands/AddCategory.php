<?php

namespace App\Console\Commands;

use App\Repository\CategoryRepositoryInterface;
use Illuminate\Console\Command;
use App\Models\Category;

class AddCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:add
                            {name : the name of the category}
                            {parent_category_id? : the ID of the parent category}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a category to the database';
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * Create a new command instance.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->categoryRepository->create($this->arguments());
    }
}
