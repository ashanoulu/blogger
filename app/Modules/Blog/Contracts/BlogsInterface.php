<?php


namespace App\Modules\Blog\Contracts;


use App\Contracts\MainRepositoryInterface;

interface BlogsInterface extends MainRepositoryInterface
{
    public function createOrUpdateBlogPost($blogPost);
    public function getAllPosts($user_id);
    public function getBlogById($blog_id);
    public function deletePostById($post_id);
}
