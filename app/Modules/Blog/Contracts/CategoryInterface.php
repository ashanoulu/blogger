<?php


namespace App\Modules\Blog\Contracts;


use App\Contracts\MainRepositoryInterface;

interface CategoryInterface extends MainRepositoryInterface
{
    public function getCategories();
}
