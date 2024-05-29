<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bb;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TovarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bb = Bb::orderBy('created_at', 'DESC')->get();

        return view('admin.tovar.index', [
            'bb' => $bb
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::orderBy('title', 'asc')->get();
            
        return view('admin.tovar.create',['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bb = new Bb();
        $bb->title = $request->title;
        $bb->price = $request->price;
        $bb->image = $request->image;
        $bb->text = $request->text;
        $bb->cat_id = $request->cat_id;
        $bb->save();

        return redirect()->back()->withSuccess('Товар был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bb $bb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bb $tovar)
    {
        $categorys = Category::orderBy('title', 'asc')->get();
            
        return view('admin.tovar.edit',[
            'categorys' => $categorys,
            'tovar' => $tovar,
        
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bb $bb)
    {
        $bb->title = $request->title;
        $bb->price = $request->price;
        $bb->image = $request->image;
        $bb->text = $request->text;
        $bb->cat_id = $request->cat_id;
        $bb->save();

        return redirect()->back()->withSuccess('Товар был успешно обнавлён!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bb $tovar)
    {
        $tovar->delete();
        return redirect()->back()->withSuccess('Товар была успешно удалена!');
    }
}
