<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pizza = Pizza::with('products')->where('id',$request->id)->get();
        return view('orders/order', ['pizza' => $pizza[0]]);
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
        //
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

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart');

        $id = $request->pizza_id;
        $pizza = Pizza::find($id);
        if(!$cart)
        {
            $cart = [
                $id => [
                    'id' => $request->pizza_id,
                    'pizza_nazwa' => $pizza->nazwa,
                    'rozmiar' => $request->rozmiar,
                    'sos' => $request->sos,
                    'ilosc' => $request->ilosc
                ]
            ];
            session()->put('cart', $cart);
        }
        return redirect('/')->with('success', $pizza->nazwa.' dodana do koszyka');

    }
    public function showCart(){

        return view('orders/cart');
    }
}
