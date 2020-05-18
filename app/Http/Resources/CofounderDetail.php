<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CofounderDetail extends JsonResource
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
            'uuid' => $this->uuid,
            'startup_id' => $this->startup_id,
            'funding_amount' => $this->funding_amount,
            'rate_of_devotion' => $this->rate_of_devotion,
            'cofounders' => new CofounderCollection($this->cofounders)
        ];
    }
}
