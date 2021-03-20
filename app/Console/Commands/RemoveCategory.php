<?php

namespace App\Console\Commands;

use App\Repository\CategoryRepositoryInterface;
use Illuminate\Console\Command;
use App\Models\Category;

class RemoveCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:remove
                            {category : The category ID}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Command description';
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

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
        //Category::destroy($this->argument('category'));
        $this->categoryRepository->delete($this->argument('category'));
    }
}
