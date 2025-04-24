<?php
namespace App\Http\Resources\BusinessOrder;

use App\Http\Resources\BusinessOrder\PaymentMethodResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessOrderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'notes'          => $this->notes,
            'total'          => $this->total,
            'partial_amount' => $this->partial_amount,
            'sub_total'      => $this->sub_total,
            'service'        => $this->service->title,
            'created_at'     => $this->created_at->format('Y-m-d'),
            'status'         => BusinessOrderStatusResource::make($this->status),
            'payment_method' => PaymentMethodResource::make($this->paymentMethod),
            'customer'       => CustomerResource::make($this->user),
            'car'            => CarResource::make($this->car),
        ];
    }
}
