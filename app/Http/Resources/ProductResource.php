<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */ 
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id, 
            "name" => $this->name,
            "code" => $this->code,
            "quantity" => $this->qty,
            "price" => $this->price,
            "short_desc" => $this->short_desc,
            'long_desc' => $this->long_desc,
            "published" => $this->publish,
            "tags" => TagResource::collection($this->whenLoaded('tags')),
            "categories" => CategoryResource::collection($this->whenLoaded("categories")),
        ];
    }
}
