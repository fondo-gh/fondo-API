<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BusinessModel extends JsonResource
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
            'startup_id' => $this->startup_id,
            'key_resources' => $this->key_resources,
            'customer_target' => $this->customer_target,
            'value_proposition' => $this->value_proposition,
            'sales_channels' => $this->sales_channels,
            'revenue_streams' => $this->revenue_streams,
            'key_metrics' => $this->key_metrics,
            'cost_structure' => $this->cost_structure,
            'financial_file' => $this->financial_file ? Storage::disk('s3')->url($this->financial_file) : '',
            'optional_file' => $this->optional_file ? Storage::disk('s3')->url($this->optional_file) : '',
        ];
    }
}
