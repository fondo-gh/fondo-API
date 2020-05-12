<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cofounder extends JsonResource
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
            'name' => $this->name,
            'email'=> $this->email,
            'cofounder_role_id' => $this->cofounder_role_id,
            'cofounder_role' => $this->cofounder_role->name,
        ];
    }
}
