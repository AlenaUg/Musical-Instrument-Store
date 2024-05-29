<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Bb;
use App\Models\Order;

class BbsController extends Controller
{
    public function index($categoryId = 0) {
        $bb = Bb::orderBy('created_at', 'DESC');
        $categorys = Category::orderBy('title', 'asc')->get();
        
        if($categoryId){
            $bb->where('cat_id', $categoryId);
        }

        return view('index', [
            'bb' => $bb->get(),
            'categorys' => $categorys
        ],);    
        
    }

    public function product(Bb $bb) {
        return view('product', ['bb' => $bb]);
    }

    public function search(Request $request) {
        $s = $request->input('s'); // Получаем параметр 's' из запроса
        $bb = Bb::where('title', 'LIKE', "%{$s}%")->orderBy('title')->get();
    
        // Передаем результаты поиска в представление
        return view('search', ['bb' => $bb],); 
    }

    public function addCart(Request $request){  
        if (Auth::check()) {     
        $bb = Bb::query()->where(['id' => $request->id])->first();
        
        $sessionId = Session::getId();
        
        \Cart::session($sessionId)->add([
            'id' => $bb->id,
            'name' => $bb->title,
            'price' => $bb->price,
            'quantity' => $request->qty ?? 1,
            'attributes' => [
                'image' => $bb->image,
            ],
        ]);

        $cart = \Cart::getContent();

        return redirect()->back();
    } else {
        return redirect()->route('login')->with('error', 'Вы должны войти, чтобы добавить товар в корзину.');
    }

    }

    public function addToCart(Bb $bb) {
        $user = Auth::user();
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart = \Cart::getContent();
        $sum = \Cart::getTotal('price');

        $messageSuccessOrder = \session(key: 'successOrder');

        if(!empty($messageSuccessOrder)){
            return view('addToCart', [
                'bb' => $bb,
                'cart' => $cart,
                'sum' => $sum,
                'user' => $user,
            ])->with('messageSuccessOrder', $messageSuccessOrder);
        }
        
        return view('addToCart', [
            'bb' => $bb,
            'cart' => $cart,
            'sum' => $sum,
            'user' => $user,
        ])->with('messageSuccessOrder', $messageSuccessOrder);
    }
    

    public function makeOrder(Request $request) {
        $user = Auth::user();
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart = \Cart::getContent();
        $sum = \Cart::getTotal('price');

        $order = new Order();
        $order->user_id = $user->id;
        $order->cart_data = $order->setCartDataAttribute($cart);
        $order->total_sum = $sum;
        
        if($order->save()){
            \Cart::clear();
            Session::flash('successOrder',['message' => 'Заказ был успешно оформлен!']);
            return back();
        };

        Session::flash('errorOrder', ['message' => 'Ошибка оформления заказа']);

        return back();
    }
    


    public function removeCart(Request $request) {  
        if (Auth::check()) {     
            $bb = Bb::find($request->id);
            
            if ($bb) {
                $sessionId = Session::getId();
            
                // Используем метод remove для удаления товара из корзины
                \Cart::session($sessionId)->remove($bb->id);
    
                $cart = \Cart::getContent();
    
                return redirect()->back()->with('success', 'Товар успешно удален из корзины.');
            } else {
                // Добавим вывод для отладки
                dd('Товар не найден в базе данных. Запрошенный ID: ' . $request->id);
            }
        } else {
            return redirect()->route('login')->with('error', 'Вы должны войти, чтобы управлять корзиной.');
        }
    }
    
}

