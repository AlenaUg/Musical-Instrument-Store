<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bb;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

        $bb_count = Bb::all()->count();
        $categorys_count = Category::all()->count();
        $orders_count = Order::all()->count();
        $users_count = User::all()->count();

        return view('admin.home.index', [
            'bb_count' => $bb_count,
            'categorys_count' => $categorys_count,
            'orders_count' => $orders_count,
            'users_count' => $users_count,
        ]);
    }
}