<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'created_at' => $this->created_at->isoFormat('DD MMM YYYY'),
            'quantity' => number_format($this->quantity),
            'type' => $this->type,
            'profit' => $this->profit,
            'platform' => $this->platform,
            'release_date' => $this->release_date->isoFormat('DD MMM YYYY'),
            'released_at' => $this->released_at,
        ];
    }
}
