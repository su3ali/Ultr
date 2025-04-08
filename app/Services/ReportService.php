<?php
namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportService
{
    public function getFilteredOrders(Request $request)
    {
        $query = Order::with([
            'services.category',
            'user',
            'transaction',
            'userAddress.region',
            'bookings.visit.group',
        ])
            ->where('is_active', 1)
            ->where(function ($q) {
                $q->where('status_id', 4)
                    ->orWhereHas('transaction', fn($q) => $q->where('payment_method', '!=', 'cache'));
            });

        if ($request->filled('date')) {
            $query->where('created_at', '>=', Carbon::parse($request->date)->timezone('Asia/Riyadh')->startOfDay());
        }

        if ($request->filled('date2')) {
            $query->where('created_at', '<=', \Carbon\Carbon::parse($request->date2)->timezone('Asia/Riyadh')->endOfDay());
        }

        if ($request->filled('payment_method') && $request->payment_method !== 'all') {
            $query->whereHas('transaction', fn($q) =>
                $q->where('payment_method', $request->payment_method)
            );
        }

        if ($request->filled('service') && $request->service !== 'all') {
            $query->whereHas('services', fn($q) =>
                $q->where('service_id', $request->service)
            );
        }

        if ($request->filled('tech_filter') && $request->tech_filter !== 'all') {
            $query->whereHas('bookings.visit.group', fn($q) =>
                $q->where('id', $request->tech_filter)
            );
        }

        return $query->get();
    }
}
