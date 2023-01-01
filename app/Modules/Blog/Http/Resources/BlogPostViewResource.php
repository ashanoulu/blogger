<?php


namespace App\Modules\Blog\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->categories->name,
            'age_group' => $this->ageGroups->name,
            'introduction' => $this->introduction,
            'description' => $this->description,
            'user' => $this->user->id,
            'name' => $this->user->name
        ];
    }
}
