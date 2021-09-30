<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Product;
class PizzasController extends Controller
{
    public function list(){
        $pizzas = Pizza::with('products')->get();
        $products = Product::all();
        $skladniki = $pizzas->flatMap->products;
        //$pizza_products = Product::join('Pizza_products','products.id','=','pizza_products.product_id')->where('pizza_products.pizza_id',$pizzas->id)->get();
        return view('index', ['pizzas' => $pizzas,'products' => $products , 'skladniki' => $skladniki]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pizzas = Pizza::with('products')->get();
        $skladniki = $pizzas->flatMap->products;
        return view('admin/pizzas/list', ['pizzas' => $pizzas, 'skladniki' => $skladniki]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //session()->flush();
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


    public function dodajSkladnik(Request $request, $productId)
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
        return redirect()->route('pizzas.create', ['pizzaNazwa' => $request->nazwa]);
    }

    public function usunSkladnik($productId)
    {
        $pizzaId = session()->get('pizza');
        $pizzaSkladniki = session()->get('skladniki');
        Pizza::find($pizzaId)->products()->detach($productId);
//        unset($pizzaSkladniki[$productId]);
        $pizzaSkladniki = Pizza::with('products')->where('pizzas.id', '=', $pizzaId)->get();
        $skladniki = $pizzaSkladniki->flatMap->products;
        session()->put('skladniki', $skladniki);

        return redirect('/admin/pizzas/create');
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
        return redirect('/admin/pizzas');
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
    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $pizza->nazwa = $request->nazwa;
        $pizza->cena = $request->cena;
        $pizza->img = $request->img;
        if($request->file('img'))
        {
            $upload_path = 'public/pizza/' .$id;
            $path = $request->file('img')->store($upload_path);
            $img_filename = str_replace($upload_path.'/','',$path);
            $pizza->img = $img_filename;
        }
        $pizza->save();
        session()->flush();
        return redirect('/admin/pizzas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        $pizza->delete();
        return redirect()->back();
    }
}
