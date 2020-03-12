<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $data = Order::get();
        return view('admin.index', compact('data'));
    }
}
