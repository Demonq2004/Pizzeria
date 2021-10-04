<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Order;
use Illuminate\Support\Facades\Validator;

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
        if($request->rozmiar != '') {
            $cart = session()->get('cart');

            $id = $request->pizza_id;
            $pizza = Pizza::find($id);
                if ($request->rozmiar == '45') {
                    $cenar = $request->cena * 1.3;
                    $cenaogl = $cenar * $request->ilosc;
                } elseif ($request->rozmiar == '50') {
                    $cenar = $request->cena * 1.5;
                    $cenaogl = $cenar * $request->ilosc;
                } elseif ($request->rozmiar == '60') {
                    $cenar = $request->cena * 1.8;
                    $cenaogl = $cenar * $request->ilosc;
                } else {
                    $cenar = $request->cena;
                    $cenaogl = $cenar * $request->ilosc;
                }
                if($request->sos == ''){
                    $request->sos = 'brak sosu';
                }

                $cart[$id] = [
                        'id' => $request->pizza_id,
                        'pizza_nazwa' => $pizza->nazwa,
                        'rozmiar' => $request->rozmiar,
                        'sos' => $request->sos,
                        'ilosc' => $request->ilosc,
                        'cena_szt' => $cenar,
                        'cena_ogl' => $cenaogl
                ];
                session()->put('cart', $cart);

            return redirect('/')->with('success', $pizza->nazwa . ' dodana do koszyka');
        }else{
            return redirect('/')->with('error', 'Nie dodano do koszyka powód: brak wybranego rozmiaru');
        }

    }
    public function showCart(){
        //session()->flush();

        $carts = session()->get('cart');
        return view('orders/cart');
    }
    public function usunPizza($id){
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function placeOrder(){

        return view('orders/place_order');
    }


    public function saveOrder(Request $request){
        $order = session()->get('cart');

        if($request->miejsce == "na_adres") {
            $request->validate([
                'miejscowosc' => 'required',
                'adres' => 'required',
                'kodPocztowy' => 'required'
            ]);
        }

        $items = json_encode(session()->get('cart'));
        $customer = [
                'miejsce' => $request->miejsce,
                'miejscowosc' => $request->miejscowosc,
                'adres' => $request->adres,
                'kod_pocztowy' => $request->kodPocztowy,
                'telefon' => $request->telefon,
                'telefon1' => $request->telefon1,
                'telefon2' => $request->telefon2,
                'telefon3' => $request->telefon3,
                'telefon4' => $request->telefon4,
                'godzina' => $request->godzinadostarczenia
            ];

        Order::create([
            'order' => $items,
            'miejsce' => $request->miejsce,
            'telefon' => $request->telefon,
            'Miejscowosc' => $request->miejscowosc,
            'Ul_adres' => $request->adres,
            'kod_pocztowy' => $request->kodPocztowy,
            'Czas_Dostarczenia' => $request->godzinadostarczenia,
            'Cena' => null,
            'Status' => 1,
            'tel1' => $request->telefon1,
            'tel2' => $request->telefon2,
            'tel3' => $request->telefon3,
            'tel4' => $request->telefon4

        ]);

        return redirect('/')->with('success', 'Złożono zamówienie');
        }
//    }
}
