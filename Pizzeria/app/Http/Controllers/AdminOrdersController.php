<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Order;
use App\Point;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin/orders/list', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        if(Auth::check() && $request->user_id != null){
            if($request->cena_ogl > 0 && $request->cena_ogl <= 50){
                $ilosc = 100;
            }elseif($request->cena_ogl > 50 && $request->cena_ogl <= 100){
                $ilosc = 250;
            }elseif($request->cena_ogl > 100 && $request->cena_ogl <= 200){
                $ilosc = 750;
            }elseif($request->cena_ogl > 200){
                $ilosc = 1000;
            }


            Point::create([
                'user_id' => $request->user_id,
//                'order_id' => $request->order_id,
                'ilosc' => $ilosc
            ]);
        }
        $order = Order::find($id);
        $order->Status = 2;
        $order->save();
        return redirect('admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $order = Order::find($id);
        $point = Point::where('order_id',$id);
        $order->delete();
        $point->delete();
        return redirect()->back();
    }

    public function addToCart(Request $request)
    {
        //
    }
    public function showCart()
    {
        //
    }
    public function usunPizza($id)
    {
        //
    }


    public function placeOrder(){


    }


    public function saveOrder(Request $request){


        }
}
