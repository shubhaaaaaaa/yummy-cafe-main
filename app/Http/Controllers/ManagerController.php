<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Order; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManagerController extends Controller
{
    public function ManagerDashboard()
    {
        $totalUsers = User::count();
    
        $pendingOrders = Order::where('status', 'pending')->count();
        $paidOrders = Order::where('status', 'paid')->count();
        $completedOrders = Order::where('status', 'completed')->count();

        //for monthly sales
        // Fetch all order dates and corresponding total amounts
        $monthlySalesData = Order::select(DB::raw('DATE_FORMAT(order_date, "%Y-%m") as month'), DB::raw('SUM(total_amount) as total_sales'))
            ->groupBy('month')
            ->get();

        // Create an array to hold all 12 months with corresponding total sales
        $allMonthsData = [];

        $startMonth = Carbon::createFromDate(null, 1, 1); // January of the current year
        $endMonth = Carbon::createFromDate(null, 12, 1); // December of the current year

        for ($date = $startMonth; $date->lte($endMonth); $date->addMonth()) {
            $formattedMonth = $date->format('Y-m');

            $found = $monthlySalesData->where('month', $formattedMonth)->first();
            $totalSales = $found ? $found->total_sales : 0;

            $allMonthsData[] = (object) ['month' => $formattedMonth, 'total_sales' => $totalSales];
        }

        return view('manager.manager_dashboard')->with([
            'totalUsers' => $totalUsers,
            'pendingOrders' => $pendingOrders,
            'paidOrders' => $paidOrders,
            'completedOrders' => $completedOrders,
            'monthlySales' => $allMonthsData,        
        ]);
    }
    
}