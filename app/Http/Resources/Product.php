<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    public function toArray($request)
    {
        return [
            'category' => $this->category,
            'product_name' => $this->product_name,
            'detailed_description' => $this->detailed_description,
            'short_description' => $this->short_description, 
            'price' => $this->price, 
            'promotional_price' => $this->promotional_price,
            'imgproduct' => $this->imgproduct,
            'album' => $this->album,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
