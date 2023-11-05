<?php

namespace App\Http\Resources\Contract;


use App\Models\ContractPackage;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractPackageUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->count() > 1) {
            $packages = [];
            foreach ($this as $packageuser) {
                $curr = $packageuser;
                $package = ContractPackage::query()->where('id',  $curr->contract_packages_id)->first();
                $packages[] = [
                    'id' => $curr->id,
                    'used' => $curr->used,
                    'user_id' =>  $curr->user_id,
                    'contract_packages_id' =>  $curr->contract_packages_id,
                    'contract_package' => ContractResource::make($package),
                ];
                return  $packages;
            }
        } else {
            $curr = $this[0];
            $package = ContractPackage::query()->where('id',  $curr->contract_packages_id)->first();
            return [
                'id' => $curr->id,
                'used' => $curr->used,
                'user_id' =>  $curr->user_id,
                'contract_packages_id' =>  $curr->contract_packages_id,
                'contract_package' => ContractResource::make($package),
            ];
        }
    }
}
