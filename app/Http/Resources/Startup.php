<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\ContactDetail as ContactDetailResource;
use App\Http\Resources\BusinessModel as BusinessModelResource;
use App\Http\Resources\StartupDetail as StartupDetailResource;
use App\Http\Resources\ProductDetail as ProductDetailResource;
use App\Http\Resources\CofounderDetail as CofounderDetailResource;
use Illuminate\Support\Facades\Storage;

class Startup extends JsonResource
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
            'registration_is_complete' => $this->registration_is_complete,
            'company_name' => $this->company_name,
            'product_image' =>  Storage::disk('s3')->url($this->product_image),
            'caption' => $this->caption,
            'funds_to_raise' => $this->funds_to_raise,
            'duration_for_raise' => $this->duration_for_raise,
            'approved' => $this->approved,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->user),
            'startup_detail' => new StartupDetailResource($this->startup_detail),
            'contact_detail' => new ContactDetailResource($this->contact_detail),
            'business_model' => new BusinessModelResource($this->business_model),
            'product_detail' => new ProductDetailResource($this->product_detail),
            'startup_teams' => new StartupTeamCollection($this->startup_teams),
            'cofounder_detail' => new CofounderDetailResource($this->cofounder_detail),
        ];
    }
}
