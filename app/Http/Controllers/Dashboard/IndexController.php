<?php
namespace App\Http\Controllers\Dashboard;

use App\Charts\CommonChart;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CustomerComplaint;
use App\Models\Day;
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

        // Get the late orders
        // $lateOrders = Order::lateToServe()->get();

        $now       = Carbon::now('Asia/Riyadh');
        $today     = $now->toDateString();
        $yesterday = $now->copy()->subDay()->toDateString();

        $today = now('Asia/Riyadh')->toDateString();

        $now            = now('Asia/Riyadh');
        $lateOrderCount = Order::lateToServe($now, onlyToday: true)->count();

        // dd($lateOrderCount);

        // Common Variables
        $now       = Carbon::now('Asia/Riyadh')->toDateString();
        $today     = Carbon::now('Asia/Riyadh'); // Set $today once
        $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString();
        $startTime = Carbon::tomorrow('Asia/Riyadh')->startOfDay();
        $endTime   = $startTime->copy()->addHours(3);

        // Get the counts
        $customers             = User::count();
        $customersHaveOrders   = User::has('orders')->count();
        $customer_complaints   = CustomerComplaint::count();
        $complaints_unresolved = CustomerComplaint::where('customer_complaints_status_id', 1)->count();
        $complaints_resolved   = CustomerComplaint::where('customer_complaints_status_id', 3)->count();

        // Get the start and end of today in Asia/Riyadh timezone
        $startOfToday         = now()->timezone('Asia/Riyadh')->startOfDay();
        $startOfTomorrow      = $startOfToday->copy()->addDay();
        $endOfTodayPlus3Hours = $startOfTomorrow->addHours(3);

        // Query to get today's customer complaints
        $todayCustomerComplaints = CustomerComplaint::whereBetween('created_at', [$startOfToday, $endOfTodayPlus3Hours])
            ->whereBetween('created_at', [now()->timezone('Asia/Riyadh')->startOfDay(), now()->timezone('Asia/Riyadh')->endOfDay()])
            ->count();

        // Get counts for client orders and technician counts
        $client_orders = Order::where('is_active', 1)->whereHas('userAddress', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })
            ->count();

        // $technicians = Technician::where('is_trainee', Technician::TECHNICIAN)->where('active', 1)->count();

        $technicians = Technician::where('is_trainee', Technician::TECHNICIAN)
            ->where('active', 1)
            ->workingToday()
            ->count();
        $carbonDayOfWeek = Carbon::now('Asia/Riyadh')->dayOfWeek; // 0 = Sunday to 6 = Saturday

        $todayEnglishName = $carbonToDayName[$carbonDayOfWeek] ?? null;

        $day = Day::where('name', $todayEnglishName)->first();

        $todayDayId = $day ? $day->id : null;

        $technicians_offToday = Technician::where('is_trainee', Technician::TECHNICIAN)
            ->where('active', 1)
            ->offToday()
            ->count();

        // dd($technicians_offToday);

        $total_trainees = Technician::where('is_trainee', Technician::TRAINEE)->count();
        $tech_visits    = Visit::where('is_active', 1)->count();

        // Get client orders for today and tomorrow's 3-hour window
        $client_orders_today = Order::where(function ($query) use ($now, $tomorrow, $startTime, $endTime, $regionIds) {
            $query->whereDate('created_at', $now)
                ->orWhere(function ($subQuery) use ($tomorrow, $startTime, $endTime) {
                    $subQuery->whereDate('created_at', $tomorrow)
                        ->whereBetween('created_at', [$startTime, $endTime]);
                });
        })
            ->where('status_id', '!=', 5) // Exclude canceled orders
            ->where('is_active', 1)       // Only active orders
            ->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds); // Filter by region
            })
            ->count();

        // Get visits for today and tomorrow's 3-hour window
        $tech_visits_today = Visit::where(function ($query) use ($now, $tomorrow, $startTime, $endTime) {
            $query->whereHas('booking', function ($q) use ($now) {
                $q->whereDate('date', '=', $now); // Filter by today's date
            })
                ->orWhereHas('booking', function ($q) use ($tomorrow, $startTime, $endTime) {
                    $q->whereDate('date', '=', $tomorrow)                 // Filter by tomorrow's date
                        ->whereTime('time', '>=', $startTime->toTimeString()) // Start of tomorrow
                        ->whereTime('time', '<', $endTime->toTimeString());   // End of first 3 hours
                });
        })
            ->whereNotIn('visits_status_id', [5, 6]) // Exclude canceled and completed visits
            ->where('is_active', 1)                  // Only active visits
            ->whereHas('booking.address', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds); // Filter by region
            })
            ->count();

        $bookings_count = Booking::whereHas('address', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })
            ->where('is_active', 1)
            ->where('type', 'service')
            ->count();

        // Get the sales data for the past 7 days
        $sevenDaysAgo = Carbon::now('Asia/Riyadh')->subDays(8);
        $dateRange    = [];
        $currentDate  = clone $sevenDaysAgo;
        while ($currentDate <= $today) {
            $dateRange[] = $currentDate->toDateString();
            $currentDate->addDay();
        }

        $all_sell_values = Order::where('is_active', 1)
            ->select(\DB::raw('date(created_at) as date'), \DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$sevenDaysAgo, $today])
            ->groupBy(\DB::raw('date(created_at)'))
            ->get();

        $countsByDate    = $all_sell_values->pluck('count', 'date')->toArray();
        $all_sell_values = array_map(function ($date) use ($countsByDate) {
            return isset($countsByDate[$date]) ? $countsByDate[$date] : 0;
        }, $dateRange);

        // Prepare chart labels
        $labels = [];
        for ($i = 8 - 1; $i >= 0; $i--) {
            $date     = Carbon::now('Asia/Riyadh')->subDays($i)->format('Y-m-d');
            $labels[] = date('j M Y', strtotime($date));
        }

        $sells_chart_1 = new CommonChart;
        $sells_chart_1->labels($labels)->options($this->__chartOptions(__('dash.orders'), ['currency' => 'SAR']));
        $sells_chart_1->dataset(__('dash.orders'), 'line', $all_sell_values);

        // Get sales data for the past 31 days
        $monthAgo    = Carbon::now('Asia/Riyadh')->subDays(31);
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

        $countsByDate     = $all_sell_values2->pluck('count', 'date')->toArray();
        $all_sell_values2 = array_map(function ($date) use ($countsByDate) {
            return isset($countsByDate[$date]) ? $countsByDate[$date] : 0;
        }, $dateRange);

        // Prepare chart labels for the last 31 days
        $labels2 = [];
        for ($i = 31 - 1; $i >= 0; $i--) {
            $date2     = Carbon::now('Asia/Riyadh')->subDays($i)->format('Y-m-d');
            $labels2[] = date('j M Y', strtotime($date2));
        }

        $sells_chart_2 = new CommonChart;
        $sells_chart_2->labels($labels2)->options($this->__chartOptions(__('dash.orders'), ['currency' => 'SAR']));
        $sells_chart_2->dataset(__('dash.orders'), 'line', $all_sell_values2);

        // Get canceled orders and visits data
        $canceled_orders = Order::whereHas('userAddress', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })->where('status_id', 5)->where('is_active', 1)->count();

        $canceled_orders_today = Order::whereHas('userAddress', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })->where('status_id', 5)->where('is_active', 1)->whereDate('updated_at', $today)->count();

        $finished_visits_today = Visit::whereHas('booking.address', function ($query) use ($regionIds) {
            $query->whereIn('region_id', $regionIds);
        })->whereDate('end_date', '=', $now)->count();

        return view('dashboard.home', compact(
            'canceled_orders', 'complaints_resolved', 'complaints_unresolved', 'todayCustomerComplaints',
            'customersHaveOrders', 'canceled_orders_today', 'tech_visits_today', 'finished_visits_today',
            'total_trainees', 'client_orders_today', 'sells_chart_1', 'sells_chart_2', 'customers',
            'client_orders', 'technicians', 'tech_visits', 'customer_complaints', 'lateOrderCount', 'bookings_count', 'technicians_offToday'
        ));
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
