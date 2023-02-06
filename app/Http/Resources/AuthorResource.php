<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap='author';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'first_name'=>$this->resource->first_name,
            'last_name'=>$this->resource->last_name, 
        ];
    }
}
