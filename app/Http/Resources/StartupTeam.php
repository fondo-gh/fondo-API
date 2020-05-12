<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StartupTeam extends JsonResource
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
            'name' => $this->name,
            'business_team_id' => $this->business_team_id,
            'business_team_name' => $this->business_team->name,
            'business_team_description' => $this->business_team->description,
        ];
    }
}
