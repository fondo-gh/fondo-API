<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactDetail extends JsonResource
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
            'id' => $this-id,
            'uuid' => $this->uuid,
            'startup_id' => $this->startup_id,
            'email' => $this->email,
            'phone' => $this->phone,
            'facebook_handle' => $this->facebook_handle,
            'twitter_handle' => $this->twitter_handle,
            'instagram_handle' => $this->instagram_handle,
            'linkedin_handle' => $this->linkedin_handle,
            'skype_handle' => $this->skype_handle
        ];
    }
}
