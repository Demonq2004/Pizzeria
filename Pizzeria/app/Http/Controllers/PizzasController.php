<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Product;
class PizzasController extends Controller
{
    public function list(){
//        session()->reflash();
        $cart = session()->get('cart');
        $pizzas = Pizza::with('products')->get();
        $products = Product::all();
        $skladniki = $pizzas->flatMap->products;
        //$pizza_products = Product::join('Pizza_products','products.id','=','pizza_products.product_id')->where('pizza_products.pizza_id',$pizzas->id)->get();
        $ilosc_pizzy = Pizza::count();
        return view('index', ['pizzas' => $pizzas,'products' => $products , 'skladniki' => $skladniki, 'ilosc_pizzy', compact('ilosc_pizzy')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::with('products')->where('id',$id)->get();
        return view('pizzas/single', ['pizza' => $pizza[0]]);
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

}
