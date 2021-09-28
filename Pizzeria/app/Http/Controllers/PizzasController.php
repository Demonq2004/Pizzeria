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
        $products = Product::all();
        if(!session()->get('pizza'))
        {
            $pizza = Pizza::create([
                'nazwa' => null,
                'cena' => null,
                'skladniki' => null,
                'img' => null
            ]);
            session()->put('pizza', $pizza->id);
        }

        return view('admin/pizzas/add_pizza', ['products' => $products]);
    }


    public function dodajSkladnik($productId)
    {
        $pizzaId = session()->get('pizza');
//        $skladnik = Product::find($id);
//        $pizzaSkladniki[$id] = [
//            'id' => $skladnik->id,
//            'nazwa' => $skladnik->nazwa
//        ];
//        session()->put('pizzaSkladniki', $pizzaSkladniki);
        Pizza::find($pizzaId)->products()->attach($productId);

        $pizzaSkladniki = Pizza::with('products')->where('pizzas.id', '=', $pizzaId)->get();
        $skladniki = $pizzaSkladniki->flatMap->products;

        session()->put('skladniki', $skladniki);
        return redirect()->back();
    }

    public function usunSkladnik($id)
    {
        $pizzaSkladniki = session()->get('pizzaSkladniki');
        unset($pizzaSkladniki[$id], $pizzaSkladniki);

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
        $pizza = Pizza::find($id);
        $pizza->nazwa = $request->nazwa;
        $pizza->save();
        session()->flush();
        return redirect('/pizzas');
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
