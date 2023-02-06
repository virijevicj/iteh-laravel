<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\GenreResource;
            

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'book';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'year_of_publication'=>$this->resource->year_of_publication,
            'grade'=>$this->resource->grade,
            'author'=> new AuthorResource($this->resource->author),
            'genre'=> new GenreResource($this->resource->genre),
            'user'=> new UserResource($this->resource->user),
        ];
    }
}
