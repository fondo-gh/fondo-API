<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetail extends JsonResource
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
            'startup_id' => $this->startup_id,
            'product_progress_id' => $this->product_progress_id,
            'product_progress' => $this->product_progress->name,
            'product_url' => $this->product_url
        ];
    }
}
