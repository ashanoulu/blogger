<?php


namespace App\Modules\Blog\Repositories;


use App\Blogs;
use App\Modules\Blog\Contracts\BlogsInterface;
use App\Repositories\MainRepository;

class BlogsRepository extends MainRepository implements BlogsInterface
{

    private $blogs;

    /**
     * BlogsRepository constructor.
     * @param Blogs $blogs
     */
    public function __construct(Blogs $blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Blogs';
    }

    public function getAllPosts($user_id)
    {
        if ($user_id){
            return $this->blogs->where(['created_by' => $user_id])->get();
        } else {
            return $this->blogs->all();
        }
    }

    public function createOrUpdateBlogPost($blogPost, $blog_id =null)
    {
        try {
            if ($blog_id) {
                return $this->blogs->where(['id' => $blog_id])->update($blogPost);
            } else {
                return $this->blogs->create($blogPost);
            }

        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function getBlogById($blog_id)
    {
        return $this->blogs->where(['id' => $blog_id])->get();
    }

    public function deletePostById($post_id)
    {
        return $this->blogs->destroy($post_id);
    }
}
