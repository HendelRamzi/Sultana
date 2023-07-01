<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $product_count = count($this->products);
        return [
            "id" => $this->id,
            "name" => $this->name, 
            "desc" =>$this->desc, 
            'active' => $this->active,
            "icon" => $this->icon,
            "folder"=> $this->folder,
            "product_count" => $product_count,
            "products" => ProductResource::collection($this->whenLoaded("products")),
        ];
    }
}
