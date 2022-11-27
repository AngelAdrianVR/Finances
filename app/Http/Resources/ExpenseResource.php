<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
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
            'quantity' => $this->quantity,
            'concept' => $this->concept,
            'category' => $this->category->name,
        ];
    }
}
