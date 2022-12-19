<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            'debtor' => $this->debtor,
            'reason' => $this->reason,
            'payed_at' => $this->payed_at?->isoFormat('DD MMM YYYY'),
            'pay_date' => $this->pay_date->isoFormat('DD MMM YYYY'),
        ];
    }
}
