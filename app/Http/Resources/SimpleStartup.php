<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SimpleStartup extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'registration_is_complete' => $this->registration_is_complete,
            'company_name' => $this->company_name,
            'product_image' =>  Storage::disk('s3')->url($this->product_image),
            'caption' => $this->caption,
            'funds_to_raise' => $this->funds_to_raise,
            'duration_for_raise' => $this->duration_for_raise,
            'approved' => $this->approved,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->user),
            'startup_industry' => $this->startup_detail->startup_industry->name
        ];
    }
}
