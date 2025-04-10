<?php
namespace App\Exports;

use App\Services\ReportService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesExport implements FromView
{
    protected $request;
    protected $reportService;

    public function __construct($request)
    {
        $this->request       = $request;
        $this->reportService = new ReportService(); // instantiate service
    }

    public function view(): View
    {
        $orders = $this->reportService->getFilteredOrders($this->request);
        return view('dashboard.reports.sales_excel', compact('orders'));
    }
}
