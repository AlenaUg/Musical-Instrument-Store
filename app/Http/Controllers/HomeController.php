<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Bb;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($categoryId = 0) {
        $bb = Bb::orderBy('created_at', 'DESC');
        $categorys = Category::orderBy('title', 'asc')->get();
        
        if($categoryId){
            $bb->where('cat_id', $categoryId);
        }

        return view('home', [
            'bb' => $bb->get(),
            'categorys' => $categorys
        ]);    
    }

}
