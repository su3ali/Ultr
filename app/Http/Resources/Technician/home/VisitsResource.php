<?php
namespace App\Http\Resources\Technician\home;

use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Booking\GroupResource;
use App\Http\Resources\Cars\CarClientResource;
use App\Http\Resources\Checkout\UserAddressResource;
use App\Http\Resources\Order\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Models\RateService;
use App\Models\RateTechnician;
use App\Models\ReasonCancel;
use App\Models\User;
use App\Models\VisitsStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitsResource extends JsonResource
{

    public function toArray($request)
    {

        $rateService     = RateService::where('visit_id', $this->id)->where('user_id', auth('sanctum')->user()->id)->first();
        $is_service_rate = false;
        if ($rateService) {
            $is_service_rate = true;
        }

        $rateTechn     = RateTechnician::where('visit_id', $this->id)->where('user_id', auth('sanctum')->user()->id)->first();
        $is_techn_rate = false;
        if ($rateTechn) {
            $is_techn_rate = true;
        }
        $cancel_reasons = null;

        $user_spec_id = Auth()->user()->spec_id;

        if (empty($user_spec_id)) {
            $cancel_reasons = ReasonCancel::where('is_for_tech', 0)->get();
        } else {
            $cancel_reasons = ReasonCancel::where('is_for_tech', 1)->get();
        }

        return [
            'id'                 => $this->id,
            'group'              => GroupResource::make($this->group),
            'all_statuses'       => StatusResource::collection(VisitsStatus::all()),
            'all_cancel_reasons' => CancelReasonsResource::collection($cancel_reasons),
            'booking_details'    => BookingResource::make($this->booking),
            'user'               => UserResource::make($this->booking->customer),
            'address'            => UserAddressResource::make($this->booking->address),
            'note'               => $this->note,
            'start_date'         => $this->start_date ?? null,
            'end_date'           => $this->end_date ?? null,
            'image'              => $this->image ? asset($this->image) : null,
            'cancel_reason'      => $this->cancelReason ? CancelReasonsResource::make($this->cancelReason) : null,
            'is_service_rate'    => $is_service_rate,
            'is_technical_rate'  => $is_techn_rate,
            'user_car'           => CarClientResource::make($this->booking?->order?->userCar),
            'file'               => $this->booking->order ? asset($this->booking->order->file) : null,
            'partial_amount'     => $this->booking?->order?->partial_amount ?? 0,
            'order_id'           => $this->booking?->order?->id,
        ];
    }
}
