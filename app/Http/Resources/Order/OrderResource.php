<?php
namespace App\Http\Resources\Order;

use App\Http\Resources\Booking\BookingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'booking_id'     => $this->bookings->first()?->id,
            'status'         => $this->status->name,
            'categories'     => BookingResource::collection($this->bookings),
            'notes'          => $this->notes,
            'total'          => $this->total,
            'partial_amount' => $this->partial_amount,
        ];
    }
}
