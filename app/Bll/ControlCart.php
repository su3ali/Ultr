<?php

namespace App\Bll;

use App\Models\Cart;
use App\Models\ContractPackage;
use App\Models\ContractPackagesUser;
use App\Models\Product;
use function Symfony\Component\Translation\t;

class ControlCart
{
    public function makeAction($action, $cart, $service)
    {
        $response = '';

        //plus
        if ($action == 'plus') {
            $cart->quantity++;

            $contractPackagesUser =  ContractPackagesUser::where('user_id', auth()->user()->id)
                ->where(function ($query) use ($cart) {
                    $query->whereHas('contactPackage', function ($qu) use ($cart) {
                        $qu->whereColumn('visit_number', '>', 'used')->where('service_id', $cart->service_id);
                    });
                })->first();
            if ($contractPackagesUser) {
                $contractPackage = ContractPackage::where('id', $contractPackagesUser->contract_packages_id)->first();
                if ($cart->quantity <  ($contractPackage->visit_number - $contractPackagesUser->used)) {
                    $cart->price = 0;
                } else {
                    $cart->price = ($cart->quantity - ($contractPackage->visit_number - $contractPackagesUser->used)) * $service->price;
                }
            }


            $cart->save();
            $response = ['success' => 'added successfully'];
        }

        //minus
        if ($action == 'minus') {
            if ($cart->quantity > 1) {
                $cart->quantity--;
                $contractPackagesUser =  ContractPackagesUser::where('user_id', auth()->user()->id)
                    ->where(function ($query) use ($cart) {
                        $query->whereHas('contactPackage', function ($qu) use ($cart) {
                            $qu->whereColumn('visit_number', '>', 'used')->where('service_id', $cart->service_id);
                        });
                    })->first();
                if ($contractPackagesUser) {
                    $contractPackage = ContractPackage::where('id', $contractPackagesUser->contract_packages_id)->first();
                    if ($cart->quantity <  ($contractPackage->visit_number - $contractPackagesUser->used)) {
                        $cart->price = 0;
                    } else {
                        $cart->price = ($cart->quantity - ($contractPackage->visit_number - $contractPackagesUser->used)) * $service->price;
                    }
                }
                $cart->save();
                $response = ['success' => 'subtracted successfully'];
            } else {
                $response = ['error' => "It's already the minimum quantity"];
            }
        }

        //delete
        if ($action == 'delete') {
            $cart->delete();
            $response = ['success' => 'deleted successfully'];
        }
        return $response;
    }
}
