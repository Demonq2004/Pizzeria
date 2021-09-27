<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Product;
class PizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pizzas = Pizza::all();
        return view('admin/pizzas/list', ['pizzas' => $pizzas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        session()->flush();
        $products = Product::all();
        return view('admin/pizzas/add_pizza', ['products' => $products]);
    }
    public function dodajSkladnik($id)
    {
        $pizzaSkladniki = session()->get('pizzaSkladniki');
        $skladnik = Product::find($id);
        $pizzaSkladniki[$id] = [
            'id' => $skladnik->id,
            'nazwa' => $skladnik->nazwa
        ];
        session()->put('pizzaSkladniki', $pizzaSkladniki);

        return redirect('pizzas/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'nazwa' => $request->nazwa,
            'skladniki' => $request->skladniki,
            'img' => $request->img
        ]);
        return redirect('/pizzas');
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
}
