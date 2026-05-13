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
        // return parent::toArray($request);
        return [
           'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category?->name,
            'brand' => $this->brand?->name,  
            // 'image_url' => $this->image ? asset('storage/' . $this->image) : null,
                        'image' => $this->image 
    ? asset('storage/' . $this->image)
    : asset('images/no-image.png'),
        ];
    }
}
