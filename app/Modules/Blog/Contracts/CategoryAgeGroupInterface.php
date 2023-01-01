<?php


namespace App\Modules\Blog\Contracts;


use App\Contracts\MainRepositoryInterface;

interface CategoryAgeGroupInterface extends MainRepositoryInterface
{
    public function getAgeGroupForCategory($categoryId);
}
