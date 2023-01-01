<?php


namespace App\Modules\Blog\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Blog\Contracts\BlogsInterface;
use App\Modules\Blog\Contracts\CategoryAgeGroupInterface;
use App\Modules\Blog\Contracts\CategoryInterface;
use App\Modules\Blog\Http\Requests\BlogPostRequest;
use App\Modules\Blog\Http\Resources\BlogPostAdminResource;
use App\Modules\Blog\Http\Resources\BlogPostViewResource;

class BlogController extends Controller
{
    private $categoryRepo;
    private $categoryAgeGroupRepo;
    private $blogsRepo;

    /**
     * BlogController constructor.
     * @param CategoryInterface $categoryRepo
     * @param CategoryAgeGroupInterface $categoryAgeGroupRepo
     * @param BlogsInterface $blogsRepo
     */
    public function __construct(CategoryInterface $categoryRepo, CategoryAgeGroupInterface $categoryAgeGroupRepo, BlogsInterface $blogsRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->categoryAgeGroupRepo = $categoryAgeGroupRepo;
        $this->blogsRepo = $blogsRepo;
    }

    public function getCategories()
    {
        $data = $this->categoryRepo->getCategories();

        if ($data) {
            $status = 200;
        } else {
            $status = 201;
        }
        return $this->apiResponse($data, $status, true);
    }

    public function getAgeGroup($categoryId)
    {
        $data = $this->categoryAgeGroupRepo->getAgeGroupForCategory($categoryId);

        if ($data) {
            $status = 200;
        } else {
            $status = 201;
        }
        return $this->apiResponse($data, $status, true);
    }

    /**
     * @param null $post_id
     * @param BlogPostRequest $blogPostRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function addBlogPost($post_id = null, BlogPostRequest $blogPostRequest)
    {
        $blogPost = $this->_setBlogPostData($blogPostRequest->all(), $post_id);

        $data = $this->blogsRepo->createOrUpdateBlogPost($blogPost, $post_id);

        if ($data) {
            $status = 200;
        } else {
            $status = 201;
        }
        return $this->apiResponse($data, $status, true);
    }

    private function _setBlogPostData($blogPostRequest, $post_id)
    {
        $data = [];
        if ($post_id) {
            $data['id'] = $post_id;
        } else {
            $data['created_at'] = getTimeNow();
        }

        $data['title'] = $blogPostRequest['title'];
        $data['introduction'] = $blogPostRequest['introduction'];
        $data['description'] = $blogPostRequest['description'];
        $data['category_id'] = $blogPostRequest['category'];
        $data['age_group_id'] = $blogPostRequest['age_group'];
        $data['created_by'] = getLoggedInUser()->id;
        $data['updated_at'] = getTimeNow();

        return $data;
    }

    public function getAllPost($user_id = null)
    {
        $data = $this->blogsRepo->getAllPosts($user_id);

        if ($data) {
            $status = 200;
        } else {
            $status = 201;
        }
        return $this->apiResponse($data, $status, true);
    }

    public function getPost($post_id, $mode = null)
    {
        $data = $this->blogsRepo->getBlogById($post_id);
        if ($mode){
            $data = BlogPostAdminResource::collection($data);
        } else {
            $data = BlogPostViewResource::collection($data);
        }

        if ($data) {
            $status = 200;
        } else {
           $status = 201;
        }
        return $this->apiResponse($data, $status, true);
    }

    public function deletePost($post_id)
    {
        $data = $this->blogsRepo->deletePostById($post_id);

        if ($data) {
            $status = 200;
        } else {
            $status = 201;
        }
        return $this->apiResponse($data, $status, true);
    }

}
