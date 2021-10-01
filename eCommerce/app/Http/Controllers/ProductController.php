<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::limit(5)->get();
        $trending = Product::skip(5)->take(5)->get();

        return view('product', ['title' => 'Products', 'products' => $data, 'trending' => $trending]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);

        return view('detail', [
            'title' => $data->name . ' - Product detail',
            'product' => $data,
        ]);
    }

    public function search(Request $request)
    {
        $searchedKey = $request->input('search');
        $data = Product::where('name', 'like',  '%' . $searchedKey . '%')->paginate(5);
        // $data = Product::where('name', 'like',  '%' . $searchedKey . '%')->get();

        return view('productSearch', [
            'title' => 'Results for ' . $searchedKey,
            'searchedKey' => $searchedKey,
            'products' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
