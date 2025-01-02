<?php

namespace App\Http\Controllers\Api\Core;

use App\Http\Controllers\Controller;
use App\Http\Resources\Checkout\UserAddressResource;
use App\Http\Resources\Contract\ContractResource;
use App\Http\Resources\Core\CityResource;
use App\Http\Resources\Core\ContactResource;
use App\Http\Resources\Core\RegionResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Service\ServiceCategoryResource;
use App\Http\Resources\Service\ServiceResource;
use App\Http\Resources\Store\StoreResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\City;
use App\Models\Contacting;
use App\Models\ContractPackage;
use App\Models\OrderContract;
use App\Models\Region;
use App\Models\Service;
use App\Models\UserAddresses;
use App\Support\Api\ApiResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function index()
    {

        if (!auth()->check()) {
            $addresses = [];
        } else {
            $addresses = UserAddresses::query()->where('user_id', auth()->user('sanctum')->id)->get();
        }
        $this->body['addresses'] = UserAddressResource::collection($addresses);

        $images = [];
        $banner1 = Banner::query()->with('coupon:id,code')->where('active', 1)->select('title_en', 'image', 'coupon_id')->get();
        $banners = Banner::query()->where('active', 1)->get();
        if ($banners->count() > 0) {
            foreach ($banners as $banner) {
                $url = $banner->image ? asset($banner->image) : '';
                if ($url) {
                    $images[] = $url;
                }
            }
        }
        $this->body['banner'] = $banner1;
        $this->body['banners'] = $images;

        $mostSellingServices = Service::query()->where('best_seller', 1)
            ->where('active', 1)->take(9)
            ->get()->shuffle();
        $this->body['services_most_wanted'] = ServiceResource::collection($mostSellingServices);
        $this->body['services'] = ServiceResource::collection(Service::query()->where('active', 1)->take(9)->get()->shuffle());
        if (request()->query('is_new')) {
            $this->body['contracts'] = ContractResource::collection(ContractPackage::query()->where('active', 1)->take(9)->get()->shuffle());
        } else {
            $this->body['contracts'] = [];
        }
        $this->body['contact'] = ContactResource::collection(Contacting::query()->take(9)->get()->shuffle());
        $this->body['total_items_in_cart'] = auth()->check() ? auth()->user()->carts->count() : 0;
        $servicesCategories = Category::query()->where('active', 1)->get();
        $this->body['services_categories'] = ServiceCategoryResource::collection($servicesCategories);

        return self::apiResponse(200, null, $this->body);
    }

    private function nearBy($Latitude, $Longitude): Builder
    {
        $query = Store::query()->whereNot('active', 0)->select();
        $haversine = "(6371
    * acos(cos(radians($Latitude))
     * cos(radians(latitude))
     * cos(radians(longitude)
     - radians($Longitude))
     + sin(radians($Latitude))
     * sin(radians(latitude))))";
        return $query->selectRaw("{$haversine} AS distance");
    }

    protected function search(Request $request): JsonResponse
    {
        if ($request->title) {
            $services = Service::query()->where('title_ar', 'like', '%' . $request->title . '%')
                ->orWhere('title_en', 'like', '%' . $request->title . '%')->where('active', 1)->get();
            $this->body['services'] = ServiceResource::collection($services);
            return self::apiResponse(200, '', $this->body);
        } else {
            return self::apiResponse(200, t_('No Services was founded.'), null);
        }
    }

    protected function filter(Request $request): JsonResponse
    {
        if ($request->title) {
            $products = Product::query()
                ->whereNot('active', 0)
                ->where('title', 'LIKE', '%' . $request->title . '%');
            $stores = Store::query()
                ->whereNot('active', 0)
                ->where('title', 'LIKE', '%' . $request->title . '%');
        } else {
            $products = Product::query()
                ->whereNot('active', 0);
            $stores = Store::query()
                ->whereNot('active', 0);
        }
        if ($products->get()->isNotEmpty()) {
            if ($request->sort_type == 'alpha') {
                $products = $products->orderBy('title', 'desc');
            }
            $products = ProductResource::collection($products->get());
            if ($request->sort_type == 'rate') {
                $products = $products->sortByDesc('rate');
            }
            $this->body['products'] = $products;
        } else {
            $this->body['products'] = [];
        }
        if ($stores->get()->isNotEmpty()) {
            if ($request->sort_type == 'alpha') {
                $stores = $stores->orderBy('title', 'desc');
            }
            $stores = StoreResource::collection($stores->get());
            if ($request->sort_type == 'rate') {
                $stores = $stores->sortByDesc('rate');
            }
            $this->body['stores'] = $stores;
        } else {
            $this->body['stores'] = [];
        }
        if ($products->isNotEmpty() || $stores->get()->isNotEmpty()) {
            return self::apiResponse(200, t_(''), $this->body);
        } else {
            return self::apiResponse(400, t_('No products or stores was founded.'), $this->body);
        }
    }

    protected function rate(Request $request): JsonResponse
    {
        $request->validate([
            'ratable_id' => 'required',
            'ratable_type' => 'required',
            'rate' => 'required',
        ]);
        if ($request->ratable_type) {
            if ($request->ratable_type == 'Product') {
                $rated_object = Product::query()->find($request->ratable_id);
            } else if ($request->ratable_type == 'Order') {
                $rated_object = Store::query()->where('id', OrdersStores::query()
                        ->where('order_id', $request->ratable_id)->first()->store_id)->first();
            }
            $rate = new Rating(['rate' => $request->rate]);
            if (isset($rated_object)) {
                $rated_object->rate()->save($rate);
                return self::apiResponse(200, 'Thanks for rating!', $this->body);
            } else {
                return self::apiResponse(400, 'Oops! An Error Occurred, please try again.', $this->body);
            }
        } else {
            return self::apiResponse(400, 'Oops! An Error Occurred, please try again.', $this->body);
        }
    }

    protected function getCity()
    {
        $cities = City::where('active', 1)->get();
        $this->body['cities'] = CityResource::collection($cities);
        return self::apiResponse(200, t_('successfully'), $this->body);
    }

    protected function getRegions($id)
    {
        $regions = Region::where('active', 1)->where('city_id', $id)->get();
        $this->body['regions'] = RegionResource::collection($regions);
        return self::apiResponse(200, t_('successfully'), $this->body);
    }

    protected function getAllRegions()
    {

        $regions = Region::where('active', 1)->get();
        $this->body['regions'] = RegionResource::collection($regions);
        return self::apiResponse(200, __('api.successfully'), $this->body);
    }

    protected function view_all()
    {
        $stores = [];
        if (request('key') == 'popular') {
            $stores = Store::whereNot('active', 0)->orderBy('sales', 'desc')->paginate(request('paginate') ?: 10);
        }
        if (request('key') == 'nearby' && request('latitude') && request('longitude')) {
            $stores = $this->nearBy(request('latitude'), request('longitude'))->get()->where('distance', '<=', 2000);
        }
        if (request('key') == 'alpha') {
            $stores = Store::query()->whereNot('active', 0)->orderBy('title', 'desc')->paginate(request('paginate') ?: 10);
        }
        if (request('key') == 'rate') {
            $stores = Store::query()->whereNot('active', 0)->paginate(request('paginate') ?: 10);
            $stores = $stores->sortBy('rate');
        }
        $this->body['stores'] = StoreResource::collection($stores);
        return self::apiResponse(200, t_(''), $this->body);
    }

    protected function contract_contact(Request $request): JsonResponse
    {
        $request->validate([
            'contract_id' => 'required|exists:contactings,id',
            'company_name' => 'required|String|min:3',
            'notes' => 'required|String',
        ]);

        OrderContract::create([
            'contract_id' => $request->contract_id,
            'company_name' => $request->company_name,
            'notes' => $request->notes,
            'user_id' => auth()->user()->id,
            'phone' => auth()->user()->phone,
        ]);

        return self::apiResponse(200, __('api.added successfully'), $this->body);

    }

    // Get Region id From lat, long
    // public function isPointInPolygon($lat, $long, $polygon)
    // {
    //     $inside = false;
    //     $n = count($polygon);
    //     $j = $n - 1; // Last vertex is the previous one to the first one

    //     for ($i = 0; $i < $n; $i++) {
    //         $xi = $polygon[$i]['lat'];
    //         $yi = $polygon[$i]['lng'];
    //         $xj = $polygon[$j]['lat'];
    //         $yj = $polygon[$j]['lng'];

    //         $intersect = (($yi > $long) != ($yj > $long)) &&
    //             ($lat < ($xj - $xi) * ($long - $yi) / ($yj - $yi) + $xi);
    //         if ($intersect) {
    //             $inside = !$inside;
    //         }

    //         $j = $i; // Save the current point as the "previous" point for next iteration
    //     }

    //     return $inside;

    // }

    // public function findRegion(Request $request)
    // {
    //     // Fetch all user addresses
    //     $addresses = UserAddresses::all(); // Retrieve all addresses
    //     if ($addresses->isEmpty()) {
    //         return response()->json([
    //             'status' => 'fail',
    //             'message' => 'No addresses found.',
    //         ]);
    //     }

    //     // Fetch all regions
    //     $regions = Region::all(['id', 'polygon_coordinates']);
    //     if ($regions->isEmpty()) {
    //         return response()->json([
    //             'status' => 'fail',
    //             'message' => 'No regions found.',
    //         ]);
    //     }

    //     $updatedAddresses = [];
    //     $updatedAddressIds = []; // Array to store the IDs of updated addresses

    //     foreach ($addresses as $address) {
    //         $regionMatched = false; // Flag to check if region was matched for the address

    //         foreach ($regions as $region) {
    //             $polygon = json_decode($region->polygon_coordinates, true);

    //             if (json_last_error() !== JSON_ERROR_NONE || empty($polygon)) {
    //                 continue; // Skip invalid or empty polygons
    //             }

    //             // Check if the address point is in the current region
    //             if ($this->isPointInPolygon($address->lat, $address->long, $polygon)) {
    //                 // Update region_id if the address matches the region
    //                 if ($address->region_id !== $region->id) {
    //                     $address->region_id = $region->id;
    //                     $address->save(); // Save the updated address

    //                     $updatedAddressIds[] = $address->id; // Store updated address IDs
    //                 }

    //                 $regionMatched = true; // Set flag to true since a match was found
    //                 break; // Exit the region loop after a match
    //             }
    //         }

    //         // If no region was matched, the address remains unchanged
    //         if (!$regionMatched) {
    //             continue; // Skip updating this address
    //         }

    //         $updatedAddresses[] = $address->id; // Add the address ID to updatedAddresses list
    //     }

    //     if (empty($updatedAddresses)) {
    //         return response()->json([
    //             'status' => 'fail',
    //             'message' => 'No matching region found for any address.',
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Region IDs updated for matched addresses.',
    //         'updated_addresses' => $updatedAddressIds, // Return updated address IDs
    //     ]);
    // }

    // Function to calculate buffer zone around a polygon
    public function addBufferToPolygon($polygon, $bufferDistance = 1)
    {
        $bufferedPolygon = [];
        $earthRadius = 6371; // Radius of the Earth in kilometers

        foreach ($polygon as $point) {
            $lat = $point['lat'];
            $lng = $point['lng'];

            $latOffset = rad2deg($bufferDistance / $earthRadius);
            $lngOffset = rad2deg($bufferDistance / ($earthRadius * cos(deg2rad($lat))));

            $bufferedPolygon[] = [
                'lat' => $lat + $latOffset,
                'lng' => $lng + $lngOffset,
            ];
            $bufferedPolygon[] = [
                'lat' => $lat - $latOffset,
                'lng' => $lng - $lngOffset,
            ];
        }

        return $bufferedPolygon;
    }

    // Check if point is inside a polygon
    public function isPointInPolygon($lat, $long, $polygon)
    {
        $inside = false;
        $n = count($polygon);
        $j = $n - 1; // Last vertex is the previous one to the first one

        for ($i = 0; $i < $n; $i++) {
            $xi = $polygon[$i]['lat'];
            $yi = $polygon[$i]['lng'];
            $xj = $polygon[$j]['lat'];
            $yj = $polygon[$j]['lng'];

            $intersect = (($yi > $long) != ($yj > $long)) &&
                ($lat < ($xj - $xi) * ($long - $yi) / ($yj - $yi) + $xi);
            if ($intersect) {
                $inside = !$inside;
            }

            $j = $i; // Save the current point as the "previous" point for next iteration
        }

        return $inside;
    }

    // public function findRegion(Request $request)
    // {
    //     $addresses = UserAddresses::all();
    //     if ($addresses->isEmpty()) {
    //         return response()->json(['status' => 'fail', 'message' => 'No addresses found.']);
    //     }

    //     $regions = Region::all(['id', 'polygon_coordinates']);
    //     if ($regions->isEmpty()) {
    //         return response()->json(['status' => 'fail', 'message' => 'No regions found.']);
    //     }

    //     $updatedAddressIds = [];

    //     foreach ($addresses as $address) {
    //         foreach ($regions as $region) {
    //             $polygon = json_decode($region->polygon_coordinates, true);

    //             if (json_last_error() !== JSON_ERROR_NONE || empty($polygon)) {
    //                 continue;
    //             }

    //             // Add 1 km buffer to the region's polygon
    //             $bufferedPolygon = $this->addBufferToPolygon($polygon);

    //             if ($this->isPointInPolygon($address->lat, $address->long, $bufferedPolygon)) {
    //                 if ($address->region_id !== $region->id) {
    //                     $address->region_id = $region->id;
    //                     $address->save();
    //                     $updatedAddressIds[] = $address->id;
    //                 }
    //                 break; // Stop checking other regions after a match
    //             }
    //         }
    //     }

    //     if (empty($updatedAddressIds)) {
    //         return response()->json([
    //             'status' => 'fail',
    //             'message' => 'No matching region found for any address.',
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Region IDs updated for matched addresses.',
    //         'updated_addresses' => $updatedAddressIds,
    //     ]);
    // }
    public function findRegion(Request $request)
    {
        $addresses = UserAddresses::all();
        if ($addresses->isEmpty()) {
            return response()->json(['status' => 'fail', 'message' => 'No addresses found.']);
        }

        $regions = Region::all(['id', 'polygon_coordinates']);
        if ($regions->isEmpty()) {
            return response()->json(['status' => 'fail', 'message' => 'No regions found.']);
        }

        $updatedAddressIds = [];

        foreach ($addresses as $address) {
            foreach ($regions as $region) {
                $polygon = json_decode($region->polygon_coordinates, true);

                if (json_last_error() !== JSON_ERROR_NONE || empty($polygon)) {
                    continue;
                }

                // Add 3 km buffer to the region's polygon
                $bufferedPolygon = $this->addBufferToPolygon($polygon, 3); // Updated bufferDistance to 3 km

                if ($this->isPointInPolygon($address->lat, $address->long, $bufferedPolygon)) {
                    if ($address->region_id !== $region->id) {
                        $address->region_id = $region->id;
                        $address->save();
                        $updatedAddressIds[] = $address->id;
                    }
                    break; // Stop checking other regions after a match
                }
            }
        }

        if (empty($updatedAddressIds)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'No matching region found for any address.',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Region IDs updated for matched addresses.',
            'updated_addresses' => $updatedAddressIds,
        ]);
    }

}
