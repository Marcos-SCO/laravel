<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Redirect;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    function addToCart(Request $request)
    {
        $userSession = session('user');
        if (!$userSession) return redirect('/login');

        $validated = $request->validate(['product_id' => 'required|int']);

        $userId = session()->get('user')->id;
        $cartData = ['user_id' => $userId, 'product_id' => $validated['product_id']];

        Cart::create($cartData);
        return redirect('/');
    }

    public static function cartItems()
    {
        $userSession = session('user');
        if (!$userSession) return 0;

        $sessionUserId = $userSession->id;
        // $sessionUserId = session()->get('user')->id;

        return Cart::where('user_id', $sessionUserId)->count();
    }

    public function cartList()
    {
        $userSession = session('user');
        if (!$userSession) return redirect('/login');

        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userSession->id)
            ->select('products.*', 'cart.id as cart_id')
            // ->get();
            ->paginate(5);

        return view('cartList', ['title' => 'Your cart list', 'products' => $products]);
    }

    public function orderNow()
    {
        $userSession = session('user');
        if (!$userSession) return redirect('/login');

        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userSession->id)
            ->sum('products.price');
        // ->get();

        return view('orderNow', ['title' => 'Total', 'total' => $total]);
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

    public function removeProduct($id)
    {
        Cart::destroy($id);

        return redirect('/cartList');
    }
}
