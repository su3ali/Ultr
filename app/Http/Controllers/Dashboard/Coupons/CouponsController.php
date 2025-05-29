<?php
namespace App\Http\Controllers\Dashboard\Coupons;

use App\Helpers\ActivityLogger;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CouponsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $type       = $request->query('type', 'client');
            $employeeId = $request->query('employee_id');

            $couponsQuery = Coupon::withCount('couponUsers') // for usage count
                ->when($type === 'employee', fn($q) => $q->where('is_employee_only', true))
                ->when($type === 'client', fn($q) => $q->where('is_employee_only', false))
                ->when($employeeId, fn($q) => $q->where('id', $employeeId));

            return DataTables::of($couponsQuery)
                ->addColumn('title', fn($row) => $row->title)
                ->addColumn('used_count', fn($row) => '<span class="badge badge-primary">' . $row->coupon_users_count . '</span>')
                ->addColumn('value', fn($row) => $row->type === 'percentage' ? $row->value . '%' : $row->value . ' ريال سعودي')
                ->addColumn('image', fn($row) => '<img class="img-fluid" src="' . asset($row->image) . '" style="max-width: 50px;"/>')
                ->addColumn('status', function ($row) {
                    $checked = $row->active ? 'checked' : '';
                    return '
                    <label class="switch s-outline s-outline-info mb-0">
                        <input type="checkbox" id="customSwitchStatus" data-id="' . $row->id . '" ' . $checked . '>
                        <span class="slider round"></span>
                    </label>';
                })
                ->addColumn('employee_name', fn($row) => optional($row->employee)->name ?? '-')
                ->addColumn('control', function ($row) {
                    return '
                    <a href="' . route('dashboard.coupons.viewSingleCoupon', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm"><i class="far fa-eye fa-2x"></i> </a>
                    </a>
                    <a href="' . route('dashboard.coupons.edit', $row->id) . '" class="btn btn-outline-warning btn-md me-1" title="تعديل">
                        <i class="far fa-edit fa-lg"></i>
                    </a>
                    <a data-href="' . route('dashboard.coupons.destroy', $row->id) . '" data-id="' . $row->id . '" class="btn btn-outline-danger btn-md btn-delete" title="حذف">
                        <i class="far fa-trash-alt fa-lg"></i>
                    </a>';
                })

                ->rawColumns(['title', 'used_count', 'value', 'image', 'status', 'control'])
                ->make(true);
        }

        $employees = Coupon::where('is_employee_only', true)->pluck('title_ar', 'id');

        return view('dashboard.coupons.index', compact('employees'));
    }

    protected function create()
    {
        $categories = Category::all();
        $services   = Service::all();
        return view('dashboard.coupons.create', compact('categories', 'services'));
    }
    protected function store(Request $request)
    {
        $rules = [
            'title_ar'         => 'required|string|min:3|max:100',
            'title_en'         => 'required|string|min:3|max:100',
            'type'             => 'required|in:static,percentage',
            'value'            => 'required|numeric',
            'start'            => 'required|date',
            'end'              => 'required|date',
            'times_limit'      => 'required|numeric',
            'user_times'       => 'required|numeric',
            'code'             => 'nullable|string',
            'description_ar'   => 'nullable|string|min:3',
            'description_en'   => 'nullable|string|min:3',
            'image'            => 'required|image|mimes:jpeg,jpg,png,gif',
            'is_hidden'        => 'nullable|in:on,off',
            'is_employee_only' => 'nullable|in:0,1',
        ];

        if ($request->sale_area === 'category') {
            $rules['category_id'] = 'required|exists:categories,id';
        }

        if ($request->sale_area === 'service') {
            $rules['service_id'] = 'required|exists:services,id';
        }

        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors())->withInput();
        }

        $validated = $validated->validated();

        // Generate code if empty
        if (empty($validated['code'])) {
            $last              = Coupon::latest('id')->first()?->id ?? 0;
            $validated['code'] = 'coupon2023-' . ($last + 1);
        }

        // Handle image
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images/coupons/'), $filename);
            $validated['image'] = 'storage/images/coupons/' . $filename;
        }

        // Normalize is_hidden checkbox
        $validated['is_hidden'] = $request->has('is_hidden') && $request->is_hidden === 'on' ? 1 : 0;

        // Default is_employee_only to 0 if not sent
        $validated['is_employee_only'] = $request->input('is_employee_only', 0);

        // Create the coupon
        Coupon::create($validated);

        session()->flash('success', __('dash.created_success'));
        return redirect()->route('dashboard.coupons.index');
    }

    protected function edit($id)
    {
        $coupon     = Coupon::query()->find($id);
        $categories = Category::all();
        $services   = Service::all();
        return view('dashboard.coupons.edit', compact('coupon', 'categories', 'services'));
    }
    protected function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $rules = [
            'title_ar'         => 'required|string|min:3|max:100',
            'title_en'         => 'required|string|min:3|max:100',
            'type'             => 'required|in:static,percentage',
            'value'            => 'required|numeric',
            'start'            => 'required|date',
            'end'              => 'required|date',
            'times_limit'      => 'required|numeric',
            'user_times'       => 'required|numeric',
            'is_hidden'        => 'nullable|in:on,off',
            'code'             => 'nullable|string',
            'description_ar'   => 'nullable|string|min:3',
            'description_en'   => 'nullable|string|min:3',
            'image'            => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'is_employee_only' => 'nullable|in:0,1',
        ];

        if ($request->sale_area === 'category') {
            $rules['category_id'] = 'required|exists:categories,id';
        }

        if ($request->sale_area === 'service') {
            $rules['service_id'] = 'required|exists:services,id';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Generate code if empty
        if (empty($validated['code'])) {
            $lastId            = Coupon::max('id') ?? 0;
            $validated['code'] = 'coupon' . now()->year . '-' . ($lastId + 1);

        }

        // Handle mutually exclusive sale areas
        if (! empty($validated['category_id'])) {
            $validated['service_id'] = null;
        } elseif (! empty($validated['service_id'])) {
            $validated['category_id'] = null;
        } else {
            $validated['category_id'] = null;
            $validated['service_id']  = null;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($coupon->image && File::exists(public_path($coupon->image))) {
                File::delete(public_path($coupon->image));
            }

            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images/coupons/'), $filename);
            $validated['image'] = 'storage/images/coupons/' . $filename;
        }

        // Handle checkbox values
        $validated['is_hidden'] = $request->has('is_hidden') && $request->is_hidden === 'on' ? 1 : 0;

        // Ensure default fallback
        $validated['is_employee_only'] = $request->input('is_employee_only', 0);

        // Update
        $coupon->update($validated);

        session()->flash('success', __('dash.updated_success'));
        return redirect()->route('dashboard.coupons.index');
    }

    protected function destroy($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        $coupon->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }
    protected function change_status(Request $request)
    {
        $coupon = Coupon::query()->where('id', $request->id)->first();
        if ($request->active == "false") {
            $coupon->active = 0;
        } else {
            $coupon->active = 1;
        }
        $coupon->save();
        return response('success');
    }
    protected function viewSingle()
    {
        $couponId    = request()->query('id');
        $usageFilter = request()->query('usage');

        if (request()->ajax()) {
            // Filter only users that have rows in coupon_users for this coupon
            $query = User::select(['id', 'first_name', 'last_name', 'phone'])
                ->withCount([
                    'couponUsers as usage' => function ($q) use ($couponId) {
                        $q->where('coupon_id', $couponId);
                    },
                ])
                ->when($usageFilter === 'used', fn($q) => $q->having('usage', '>', 0))
                ->when($usageFilter === 'notused', fn($q) => $q->having('usage', '=', 0))
                ->orderByDesc('usage');

            return DataTables::of($query)
                ->addColumn('name', fn($user) => $user->first_name . ' ' . $user->last_name)
                ->addColumn('phone', fn($user) => $user->phone)
                ->addColumn('usage', fn($user) => $user->usage)
                ->addColumn('control', function ($user) {
                    return '
                    <a href="' . route('dashboard.core.address.index', ['id' => $user->id]) . '" class="btn btn-outline-primary btn-sm me-1">
                        <i class="far fa-address-book fa-lg"></i>
                    </a>
                    <a href="' . route('dashboard.core.customer.edit', $user->id) . '" class="btn btn-outline-warning btn-sm me-1">
                        <i class="far fa-edit fa-lg"></i>
                    </a>
                    <a data-href="' . route('dashboard.core.customer.destroy', $user->id) . '" data-id="' . $user->id . '" class="btn btn-outline-danger btn-sm btn-delete">
                        <i class="far fa-trash-alt fa-lg"></i>
                    </a>';
                })
                ->rawColumns(['name', 'phone', 'usage', 'control'])
                ->make(true);
        }

        $coupon = Coupon::findOrFail($couponId);

        return view('dashboard.coupons.show', compact('couponId', 'coupon'))->with('id', $couponId);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code'       => 'required|string',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $coupon = Coupon::where('id', $request->code)->first();
        if (! $coupon) {
            return response()->json(['message' => 'الكوبون غير صالح'], 400);
        }

        $booking = Booking::with('order')->find($request->booking_id);
        if (! $booking || ! $booking->order) {
            return response()->json(['message' => 'الطلب غير موجود أو لا يحتوي على حجز'], 400);
        }

        $order    = $booking->order;
        $userId   = $order->user_id;
        $subtotal = $order->sub_total;

        if (! $subtotal || $subtotal <= 0) {
            return response()->json(['message' => 'المبلغ الأصلي غير صالح'], 400);
        }

        $forceApply = $request->boolean('force_apply'); // returns true/false

        $alreadyUsed = CouponUser::where('coupon_id', $coupon->id)
            ->where('user_id', $userId)
            ->exists();

        if ($alreadyUsed && ! $forceApply) {
            return response()->json(['message' => 'لقد استخدمت هذا الكوبون مسبقاً'], 400);
        }

        $discount = $coupon->type === 'percentage'
        ? ($subtotal * $coupon->value / 100)
        : min($coupon->value, $subtotal);

        $finalTotal = $subtotal - $discount;

        $order->update([
            'discount'       => $discount,
            'total'          => $finalTotal,
            'partial_amount' => $finalTotal,
        ]);

        CouponUser::create([
            'coupon_id' => $coupon->id,
            'user_id'   => $userId,
        ]);

        $coupon->increment('times_used');

        //  Log activity
        ActivityLogger::log(
            actionType: 'coupon_applied',
            model: $booking,
            description: 'تم تطبيق الكوبون على الطلب',
            userId: auth()->id(),
            changes: [
                'discount' => $discount,
                'total'    => $finalTotal,
            ],
            meta: [
                'coupon_id'    => $coupon->id,
                'performed_at' => now('Asia/Riyadh')->toDateTimeString(),
                'url'          => request()->fullUrl(),
            ]
        );

        return response()->json([
            'success'  => true,
            'message'  => __("dash.coupon_applied_success"),
            'redirect' => route('dashboard.bookings.index'),
        ]);
    }

}
