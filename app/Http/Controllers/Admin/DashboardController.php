<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
   public function index()
   {
    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $totalBrands = Brand::count();

    $totalAllUsers = User::count();
    $totalUser = User::where('role_as','0')->count();
    $totalAdmin = User::where('role_as','1')->count();

    $todayDate = Carbon::now()->format('d-m-Y');
    $thisMonth = Carbon::now()->format('m');
    $thisYear = Carbon::now()->format('Y');

    $totalOrders = Order::count();
    $todayOrders = Order::whereDate('created_at',$todayDate)->count();
    $thisMonthOrders = Order::whereMonth('created_at',$thisMonth)->count();
    $thisYearOrders = Order::whereYear('created_at',$thisYear)->count();


    return view('admin.dashboard',compact('totalProducts','totalCategories','totalBrands','totalAllUsers','totalUser','totalAdmin','totalAdmin','totalOrders','todayOrders','thisMonthOrders','thisYearOrders'

));
    }
}
