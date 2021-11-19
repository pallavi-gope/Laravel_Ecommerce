<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class AdminReportsController extends Controller
{
    public function reports()
    {
        return view('admin.reports.reports_view');
    }
    public function searchByDate(Request $request)
    {
        // return $request->all();
        $date = new DateTime($request->date);
        $format_date = $date->format('d F Y');

        $orders = Order::where('order_date', $format_date)->orderBy('id', 'DESC')->get();
        return view('admin.reports.reports_date', compact('orders'));
    }
    public function searchByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $orders = Order::where('order_month', $month)->where('order_year', $year)->orderBy('id', 'DESC')->get();
        return view('admin.reports.reports_month', compact('orders'));
    }
    public function searchByYear(Request $request)
    {
        $year = $request->searchyear;

        $orders = Order::where('order_year', $year)->orderBy('id', 'DESC')->get();
        return view('admin.reports.reports_year', compact('orders'));
    }
    public function users(){
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users', compact('users'));
    }
}
