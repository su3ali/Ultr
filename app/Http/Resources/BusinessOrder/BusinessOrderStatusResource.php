<?php
namespace App\Http\Resources\BusinessOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessOrderStatusResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
