<?php
namespace App\Http\Resources\BusinessOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->first_name . ' ' . $this->last_name,
            'phone '=> $this->phone,
        ];
    }
}
