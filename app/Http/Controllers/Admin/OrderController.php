<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Bb;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all(); 

        return view('admin.order.index', [
            'orders' => $orders,
        ]);

    }
}

