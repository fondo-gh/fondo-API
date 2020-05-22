<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Investor extends JsonResource
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
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'email' => $this->user->email,
            'picture' => $this->user->picture ? url('/') . '/users/' . $this->user->picture : '',
            'user_type' => $this->user->user_type->name,
            'bio' => $this->bio,
            'interest' => $this->bio,
            'startups_invested_in' => $this->startups_invested_in,
            'amount_invested' => $this->amount_invested,
            'occupation' => $this->occupations,
            'profile_is_completed' => $this->profile_is_completed
        ];
    }
}
