<?php


namespace App\Modules\Blog\Repositories;


use App\Categories;
use App\Modules\Blog\Contracts\CategoryInterface;
use App\Repositories\MainRepository;
use Illuminate\Support\Facades\App;

class CategoryRepositories extends MainRepository implements CategoryInterface
{
    private $categories;

    /**
     * CategoryRepositories constructor.
     * @param App $app
     * @param Categories $categories
     */
    public function __construct(Categories $categories)
    {
//        parent::__construct($app);
        $this->categories = $categories;
    }

    function model()
    {
        return 'App\Categories';
    }

    public function getCategories()
    {
        return $this->categories->all();
    }
}
