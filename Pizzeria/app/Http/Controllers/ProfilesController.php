<?php

namespace App\Http\Controllers;

use App\User;
use App\Pizza;
use App\Order;
use App\Point;
use App\Address;
use App\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        $points = Point::where('user_id', Auth::id())->get();
        $addresses = Address::where('user_id', Auth::id())->get();
        $ulubiony = Order::where('user_id', Auth::id())->where('Status',2)->get();
        if (!$ulubiony->IsEmpty()){
            foreach ($ulubiony as $key => $order) {
                    foreach (json_decode($order->order, true) as $item) {
                        $pizzas[] = $item['pizza_id'];
                    }
            }
        foreach ($pizzas as $pizza) {
            $ile[] = $pizza[0];
        }
        $ile_2 = array_count_values($ile);
        $ile_3 = array_keys($ile_2, max($ile_2));
        $ulubiona = Pizza::with('products')->where('id', $ile_3)->first();
        }else{
            $ulubiona = null;
        }

        return view('profil/profil', ['user' => $user, 'orders' => $orders, 'points'=>$points, 'addresses' => $addresses, 'ulubiona' => $ulubiona]);
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
        $user = User::find($id);
        return view('/profil/aktualizuj', ['user' => $user]);
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
        $user = User::where('id',$id)->first();
        if(Hash::check($request->old_password, $user->password)) {
            if ($request->name != null) {
                $request->validate([
                    'name' => ['string', 'max:255']
                ]);
                $user->name = $request->name;

            }
            if ($request->email != null) {
                $request->validate([
                    'email' => ['string', 'email', 'max:255', 'unique:users']
                ]);
                $user->email = $request->email;

            }
            if ($request->phone != null) {
                $request->validate([
                    'phone' => ['integer']
                ]);
                $user->telefon = $request->phone;

            }
            if ($request->password != null) {
                $request->validate([
                    'password' => ['string', 'min:8', 'confirmed'],
                ]);
                $user->password = Hash::make($request->password);

            }
            $user->save();
            return redirect('/profil')->with('success', 'Zaktualizowano konto!');
        }else{
            return redirect()->back()->with('error', 'Błędne hasło');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = User::find($id);
        $opinions = Opinion::where('user_id',$id)->get();
        foreach($opinions as $opinion){
                    $opinion->delete();
                }
        $profile->delete();
        return redirect('/')->with('success', 'Poprawnie usunięto konto');;
    }
}
