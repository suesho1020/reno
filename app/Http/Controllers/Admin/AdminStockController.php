<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockImage;

class AdminStockController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stock_list = Stock::get();
        return view('admin.stock_list', compact('stock_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.stock_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = new Stock();
        $post->code = $request->input('code');
        $post->sku_code = $request->input('sku_code');
        $post->name = $request->input('name');
        $post->zaiko = $request->input('zaiko');
        $post->price = $request->input('price');
        $post->sale_price = $request->input('sale_price');
        $post->category_id = $request->input('category_id');
        $post->memo = $request->input('memo');
        $post->save();

        return redirect(route('admin.stock.index'))->with('success', '更新しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $stock = Stock::find($id);
        return view('admin.stock_edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Stock::find($id);
        $post->code = $request->input('code');
        $post->sku_code = $request->input('sku_code');
        $post->name = $request->input('name');
        $post->zaiko = $request->input('zaiko');
        $post->price = $request->input('price');
        $post->sale_price = $request->input('sale_price');
        $post->category_id = $request->input('category_id');
        $post->memo = $request->input('memo');
        $post->save();

        return redirect(route('admin.stock.index'))->with('success', '更新しました');
    }
}
