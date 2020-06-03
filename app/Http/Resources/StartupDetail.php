<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StartupDetail extends JsonResource
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
            'startup_type_id' => $this->startup_type_id,
            'startup_type' => $this->startup_type->name,
            'startup_industry_id' => $this->startup_industry_id,
            'startup_industry' => $this->startup_industry->name,
            'has_patent' => $this->has_patent,
            'location' => $this->location,
            'business_registration_number' => $this->business_registration_number
        ];
    }
}
