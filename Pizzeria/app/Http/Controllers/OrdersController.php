<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Order;
use App\Point;
use App\Address;
use Illuminate\Support\Facades\Auth;
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
        $order->delete();
        return redirect()->back();
    }

    public function addToCart(Request $request)
    {
        if($request->rozmiar != '') {
            $cart = session()->get('cart');

            $doid = 2;
            if($request->rozmiar == '30'){
                $doid = 0;
            }elseif($request->rozmiar == '45'){
                $doid = 1;
            }elseif($request->rozmiar == '50'){
                $doid = 2;
            }elseif($request->rozmiar == '60'){
                $doid = 3;
            }
            $id = $request->pizza_id*4+$doid;

            $pizza = Pizza::find($request->pizza_id);
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
                if(Auth::check()){
                $user_id = Auth::user()->id;
                }else{
                    $user_id = null;
                }
                $ile = $request->ilosc;
                if($cart != null) {
                    foreach ($cart as $item) {
                        if (($pizza->nazwa == $item['pizza_nazwa']) && $request->rozmiar == $item['rozmiar']) {
                            $ile = $request->ilosc + $item['ilosc'];
                            $cenaogl = $cenar * $ile;
                        }
                    }
                }

                $cart[$id] = [
                        'id' => $id,
                        'pizza_id' => $request->pizza_id,
                        'user_id' => $user_id,
                        'pizza_nazwa' => $pizza->nazwa,
                        'rozmiar' => $request->rozmiar,
                        'sos' => $request->sos,
                        'ilosc' => $ile,
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

        if(Auth::check()){
            $addresses = Address::where('user_id',Auth::user()->id)->get();

        }else{
            $addresses = null;
        }

        return view('orders/place_order',['addresses'=> $addresses]);


    }


    public function saveOrder(Request $request){
        $order = session()->get('cart');
        $items = json_encode(session()->get('cart'));
        if($request->miejsce == "na_adres") {
            $request->validate([
                'miejscowosc' => 'required',
                'adres' => 'required',
                'kodPocztowy' => 'required'
            ]);
        }
        $adress = Address::find($request->adress);
        if(Auth::check()){
            $user_id = Auth::id();
            if($request->miejsce == "na_user_adres") {
                $miejscowosc = $adress->Miejscowosc;
                $adres = $adress->Ul_adres;
                $kodPocztowy = $adress->kod_pocztowy;
            }elseif($request->miejsce == "na_adres"){
                $miejscowosc = $request->miejscowosc;
                $adres = $request->adres;
                $kodPocztowy = $request->kodPocztowy;
            }
        }else{
            $user_id = null;
            $miejscowosc = $request->miejscowosc;
            $adres = $request->adres;
            $kodPocztowy = $request->kodPocztowy;
        }

//        $customer = [
//                'user_id'=>$user_id,
//                'order' => $items,
//                'miejsce' => $request->miejsce,
//                'miejscowosc' => $request->miejscowosc,
//                'adres' => $request->adres,
//                'kod_pocztowy' => $request->kodPocztowy,
//                'telefon' => $request->telefon,
//                'telefon1' => $request->telefon1,
//                'telefon2' => $request->telefon2,
//                'telefon3' => $request->telefon3,
//                'telefon4' => $request->telefon4,
//                'godzina' => $request->godzinadostarczenia
//            ];

        Order::create([
            'user_id'=>$user_id,
            'order' => $items,
            'miejsce' => $request->miejsce,
            'telefon' => $request->telefon,
            'Miejscowosc' => $miejscowosc,
            'Ul_adres' => $adres,
            'kod_pocztowy' => $kodPocztowy,
            'Czas_Dostarczenia' => $request->godzinadostarczenia,
            'Cena' => null,
            'Status' => 1,
            'tel1' => $request->telefon1,
            'tel2' => $request->telefon2,
            'tel3' => $request->telefon3,
            'tel4' => $request->telefon4

        ]);
        session()->forget('cart');
        return redirect('/')->with('success', 'Złożono zamówienie');
    }
//    }
}
