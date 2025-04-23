<?php
namespace App\Http\Resources\BusinessOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'Plate_number' => $this->Plate_number,
            'color'        => $this->color,
            'type'         => new CarTypeResource($this->type),
            'model'        => new CarModelResource($this->model),

        ];
    }
}
