<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Product;
use App\Role_User;
use App\Opinion;
use Illuminate\Support\Facades\Auth;
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
        $rola = Role_User::where('user_id', Auth::id())->first();
        return view('index', ['pizzas' => $pizzas,'products' => $products , 'skladniki' => $skladniki, 'ilosc_pizzy', compact('ilosc_pizzy'), 'rola' => $rola]);
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
        $opinions = Opinion::where('pizza_id',$id)->get();
        $rola = Role_User::where('user_id', Auth::id())->first();
        return view('pizzas/single', ['pizza' => $pizza[0], 'opinions' => $opinions, 'rola' => $rola]);
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
