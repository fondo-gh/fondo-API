<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
            'registration_is_complete' => $this->startup->registration_is_complete,
            'company_name' => $this->startup->company_name,
            'product_image' =>  Storage::disk('s3')->url($this->startup->product_image),
            'caption' => $this->startup->caption,
            'funds_to_raise' => $this->startup->funds_to_raise,
            'duration_for_raise' => $this->startup->duration_for_raise,
            'approved' => $this->startup->approved,
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
