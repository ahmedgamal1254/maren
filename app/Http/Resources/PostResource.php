<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "post_id" => $this->id,
            "title"=> $this->title,
            "description" => $this->description,
            "image_url"=> "app/".$this->image_url,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at
        ];
    }
}
