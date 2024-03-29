<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FixedResource extends JsonResource
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
            'id' => $this->id,
            'concept' => $this->concept,
            'created_at' => $this->created_at->isoFormat('DD MMM YYYY'),
            'quantity' => number_format($this->quantity),
            'recurrency' => $this->recurrency,
            'user_id' => $this->user_id,
        ];
    }
}
