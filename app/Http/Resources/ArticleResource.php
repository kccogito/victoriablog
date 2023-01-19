<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Tag;
use App\Models\Comment;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'body' => $this->body,
            'thumbnail' => $this->thumbnail,
            'image' => $this->image,
            'likes' => $this->likes,
            'views' => $this->views,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tags' => Tag::Where('article_id', $this->id)->get(),
            'comments' => Comment::Where('article_id', $this->id)->get(),
        ];
    }
}
