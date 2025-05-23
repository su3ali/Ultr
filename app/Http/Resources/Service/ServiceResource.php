<?php

namespace App\Http\Resources\Service;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $service = Service::query()->withTrashed()->find($this['id']);
        $images = [];
        foreach ($service->serviceImages as $serviceImage) {
            if ($serviceImage->image) {
                $images[] = asset($serviceImage->image);
            }
        }
        if (empty($images)) {
            $images[] = asset(\App\Models\Setting::first()->logo);
        }
        if (isset($this['quantity'])) {
            $quantity = $this['quantity'];
        }
        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'description' => $this['description'],
            'price' => $service['price'],
            'images' => $images,
            'terms_and_conditions' => $service->ter_cond_ar,
            'icons' => IconResource::collection($this->icons),
            'able_to_add_quantity_in_cart' => isset($this['is_quantity']) ? $this['is_quantity'] : null,
            'quantity' => $quantity ?? $this->pivot?->quantity,
        ];
    }
}
