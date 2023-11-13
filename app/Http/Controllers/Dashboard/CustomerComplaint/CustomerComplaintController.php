<?php

namespace App\Http\Controllers;

use App\Models\CustomerComplaint;
use App\Models\CustomerComplaintImage;
use Illuminate\Http\Request;
use Validator;

class CustomerComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'text' => 'required|string',
            'video' => 'nullable',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];

        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/complaints/videos/coupons/'), $filename);
            $validated['video'] = 'storage/complaints/videos/coupons' . '/' . $filename;
        }
        $validated = collect($validated)->except('images')->toArray();
        $validated['user_id'] = auth()->user('sanctum')->id;
        $customerComplaint = CustomerComplaint::create($validated);
        $customer_complaints_id = $customerComplaint->id;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageFilename = time() . '_' . rand(100, 999) . '.' . $image->getClientOriginalExtension();
                $image->move(storage_path('app/public/complaints/images/coupons/'), $imageFilename);
                $imagePath = 'storage/complaints/images/coupons' . '/' . $imageFilename;
                CustomerComplaintImage::create([
                    'customer_complaints_id' => $customer_complaints_id,
                    'image' => $imagePath
                ]);
            }
        }



        session()->flash('success');
        return redirect()->route('dashboard.coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerComplaint $customerComplaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerComplaint $customerComplaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerComplaint $customerComplaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerComplaint  $customerComplaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerComplaint $customerComplaint)
    {
        //
    }
}
