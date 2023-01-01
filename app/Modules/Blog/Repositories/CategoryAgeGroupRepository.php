<?php


namespace App\Modules\Blog\Repositories;


use App\CategoryAgeGroup;
use App\Modules\Blog\Contracts\CategoryAgeGroupInterface;
use App\Repositories\MainRepository;

class CategoryAgeGroupRepository extends MainRepository implements CategoryAgeGroupInterface
{

    private $categoryAgeGroup;

    /**
     * CategoryAgeGroupRepository constructor.
     * @param CategoryAgeGroup $categoryAgeGroup
     */
    public function __construct(CategoryAgeGroup $categoryAgeGroup)
    {
        $this->categoryAgeGroup = $categoryAgeGroup;
    }

    public function getAgeGroupForCategory($categoryId)
    {
        return $this->categoryAgeGroup->where(['category_id' => $categoryId])->with('ageGroups')->get();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\CategoryAgeGroup';
    }
}
