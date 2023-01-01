<?php


namespace App\Modules\Blog\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostAdminResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category_id,
            'age_group' => $this->age_group_id,
            'introduction' => $this->introduction,
            'description' => $this->description,
            'user' => $this->user->id,
            'name' => $this->user->name
        ];
    }

}
