<?php
namespace App\Http\Controllers\Dashboard;

use App\Charts\CommonChart;
use App\Http\Controllers\Controller;
use App\Models\CustomerComplaint;
use App\Models\Order;
use App\Models\Technician;
use App\Models\User;
use App\Models\Visit;
use Carbon\Carbon;

class IndexController extends Controller
{

    protected function index()
    {

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();
        $customers = User::count();

        $customersHaveOrders = User::has('orders')->count();

        $customer_complaints = CustomerComplaint::count(); 

        $complaints_unresolved = CustomerComplaint::where('customer_complaints_status_id', 1)->count();

        $complaints_resolved = CustomerComplaint::where('customer_complaints_status_id', 3)->count();

        $startOfToday         = now()->startOfDay();
        $endOfTodayPlus3Hours = now()->endOfDay()->addHours(3);

        $todayCustomerComplaints = CustomerComplaint::whereBetween('created_at', [$startOfToday, $endOfTodayPlus3Hours])->count();

        $client_orders = Order::where('is_active', 1)->whereHas('userAddress', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })
            ->count();
        $technicians = Technician::where('is_trainee', Technician::TECHNICIAN)->count();

        $total_trainees = Technician::where('is_trainee', Technician::TRAINEE)->count();

        $tech_visits = Visit::where('is_active', 1)->count();

        // $now = Carbon::now('Asia/Riyadh')->toDateString();

        // $client_orders_today = Order::whereDate('created_at', $now)
        //     ->where('status_id', '!=', 5)
        //     ->where('is_active', 1)
        //     ->whereHas('userAddress', function ($query) use ($regionIds) {
        //         $query->whereIn('region_id', $regionIds);
        //     })
        //     ->count();

        //
        $now       = Carbon::now('Asia/Riyadh')->toDateString();
        $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString();
        $startTime = Carbon::tomorrow('Asia/Riyadh')->startOfDay();
        $endTime   = $startTime->copy()->addHours(3);

        $client_orders_today = Order::where(function ($query) use ($now, $tomorrow, $startTime, $endTime, $regionIds) {
            // الطلبات الخاصة باليوم الحالي
            $query->whereDate('created_at', $now)
                ->orWhere(function ($subQuery) use ($tomorrow, $startTime, $endTime) {
                    // الطلبات من أول 3 ساعات من اليوم التالي
                    $subQuery->whereDate('created_at', $tomorrow)
                        ->whereBetween('created_at', [$startTime, $endTime]);
                });
        })
            ->where('status_id', '!=', 5)
            ->where('is_active', 1)
            ->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })
            ->count();

        // $tech_visits_today = Visit::whereHas('booking', function ($qu) use ($now) {
        //     $qu->whereDate('date', '=', $now);
        // })->whereNotIn('visits_status_id', [5, 6])->where('is_active', 1)->whereHas('booking.address', function ($query) use ($regionIds) {
        //     $query->whereIn('region_id', $regionIds);
        // })
        //     ->count();

        $now       = Carbon::now('Asia/Riyadh')->toDateString();
        $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString();
        $startTime = Carbon::tomorrow('Asia/Riyadh')->startOfDay();
        $endTime   = $startTime->copy()->addHours(3);

        $tech_visits_today = Visit::where(function ($query) use ($now, $tomorrow, $startTime, $endTime) {
            // الزيارات الخاصة باليوم الحالي
            $query->whereHas('booking', function ($q) use ($now) {
                $q->whereDate('date', '=', $now);
            })
                ->orWhereHas('booking', function ($q) use ($tomorrow, $startTime, $endTime) {
                    // الزيارات لأول 3 ساعات من اليوم التالي
                    $q->whereDate('date', '=', $tomorrow)
                        ->whereTime('time', '>=', $startTime->toTimeString())
                        ->whereTime('time', '<', $endTime->toTimeString());
                });
        })
            ->whereNotIn('visits_status_id', [5, 6])
            ->where('is_active', 1)
            ->whereHas('booking.address', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })
            ->count();

        $today        = Carbon::now('Asia/Riyadh');
        $sevenDaysAgo = Carbon::now('Asia/Riyadh')->subDays(8);

        $dateRange   = [];
        $currentDate = clone $sevenDaysAgo;

        while ($currentDate <= $today) {
            $dateRange[] = $currentDate->toDateString();
            $currentDate->addDay();
        }

        $all_sell_values = Order::where('is_active', 1)
            ->select(\DB::raw('date(created_at) as date'), \DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$sevenDaysAgo, $today])
            ->groupBy(\DB::raw('date(created_at)'))
            ->get();

        $countsByDate = $all_sell_values->pluck('count', 'date')->toArray();

        $all_sell_values = array_map(function ($date) use ($countsByDate) {
            return isset($countsByDate[$date]) ? $countsByDate[$date] : 0;
        }, $dateRange);

        $labels = [];

        $dates = [];
        for ($i = 8 - 1; $i >= 0; $i--) {
            $date    = Carbon::now('Asia/Riyadh')->subDays($i)->format('Y-m-d');
            $dates[] = $date;

            $labels[] = date('j M Y', strtotime($date));
        }

        $sells_chart_1 = new CommonChart;

        $sells_chart_1->labels($labels)->options($this->__chartOptions(
            __(
                __('dash.orders'),
                ['currency' => 'SAR']
            )
        ));
        $sells_chart_1->dataset(__('dash.orders'), 'line', $all_sell_values);

        $today    = Carbon::now('Asia/Riyadh');
        $monthAgo = Carbon::now('Asia/Riyadh')->subDays(31);

        $dateRange   = [];
        $currentDate = clone $monthAgo;

        while ($currentDate <= $today) {
            $dateRange[] = $currentDate->toDateString();
            $currentDate->addDay();
        }

        $all_sell_values2 = Order::where('is_active', 1)
            ->select(\DB::raw('date(created_at) as date'), \DB::raw("COUNT(*) as count"))
            ->whereBetween('created_at', [$monthAgo, $today])
            ->groupBy(\DB::raw('date(created_at)'))
            ->get();

        $countsByDate = $all_sell_values2->pluck('count', 'date')->toArray();

        $all_sell_values2 = array_map(function ($date) use ($countsByDate) {
            return isset($countsByDate[$date]) ? $countsByDate[$date] : 0;
        }, $dateRange);

        $labels2 = [];

        $dates2 = [];
        for ($i = 31 - 1; $i >= 0; $i--) {
            $date2    = Carbon::now('Asia/Riyadh')->subDays($i)->format('Y-m-d');
            $dates2[] = $date2;

            $labels2[] = date('j M Y', strtotime($date2));
        }

        $sells_chart_2 = new CommonChart;

        $sells_chart_2->labels($labels2)->options($this->__chartOptions(
            __(
                __('dash.orders'),
                ['currency' => 'SAR']
            )
        ));
        $sells_chart_2->dataset(__('dash.orders'), 'line', $all_sell_values2);
        $canceled_orders = Order::query()->whereHas('userAddress', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })->where('status_id', 5)->where('is_active', 1)->count();
        $canceled_orders_today = Order::query()->whereHas('userAddress', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })->where('status_id', 5)->where('is_active', 1)->whereDate('updated_at', $today)->count();
        $finished_visits_today = Visit::query()->whereHas('booking.address', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })->whereDate('end_date', '=', $now)->count();
        return view('dashboard.home', compact('canceled_orders','complaints_resolved','complaints_unresolved', 'todayCustomerComplaints', 'customersHaveOrders', 'canceled_orders_today', 'tech_visits_today', 'finished_visits_today', 'total_trainees', 'client_orders_today', 'sells_chart_1', 'sells_chart_2', 'customers', 'client_orders', 'technicians', 'tech_visits', 'customer_complaints'));
    }
    private function __chartOptions($title)
    {
        return [
            'yAxis'  => [
                'title' => [
                    'text' => $title,
                ],
            ],
            'legend' => [
                'align'         => 'right',
                'verticalAlign' => 'top',
                'floating'      => true,
                'layout'        => 'vertical',
                'padding'       => 20,
            ],
        ];
    }
}
