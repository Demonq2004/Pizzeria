@extends('app')
@php
    $carts = session()->get('cart');
    $total = 0;

@endphp
@section('content')
    <div class="main-page" style="margin-top: 100px">
        <article class="content px-3 py-5 p-md-5" style=" min-height: 400px">
            <h1 class="text-center">Twój koszyk</h1>
            <div style="width: 60%; margin-left: 20%; margin-top: 50px">
                <table>
                    @if(isset($carts) && $carts != null)
                        @foreach($carts as $cart)
                            <tr>
                                <td class="col-xl-10">
                                    <img style="float: left;" class="col-xl-3 col-lg-4 col-sm-12 col-12" src="/storage/pizza/{{$cart['id']}}/pizza_img.jpg">
                                    <div style="margin-left: 20px; float: left">

                                        <h3 class="text-uppercase"></h3>
                                        <p>{{$cart['sos']}}, {{$cart['rozmiar']}}cm , {{$cart['ilosc']}}szt.</p>
                                        <p><a href="usun-pizza/{{$cart['id']}}" class="btn btn-danger">Usuń</a> </p>
                                    </div>
                                </td>
                                <td style="text-align: center; background-color: #f8f8f8" class="col-xl col-lg">
                                    <div style="float: right; height: 150px" class="col-12">

                                        <p style="font-size: 100%; margin-top: 10%; ">
                                            <strong>{{$cart['cena_ogl']}} ZŁ</strong>
                                        </p>
                                        <p>{{$cart['cena_szt']}} ZŁ (sztuka)</p>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $total = $total + $cart['cena_ogl'];
                                @endphp
                        @endforeach
                        <tr>

                            <td></td>
                            <td style="text-align: center; background-color: #f8f8f8" class="col-xl col-lg">
                                <hr>
                                <p><strong>Suma: {{ $total }} ZŁ</strong></p>
                            </td>
                            <td></td>
                        </tr>
                    @else
                        <p>Koszyk jest pusty</p>
                    @endif
                </table>
                <a class="btn btn-primary" style="color: white" href="/#menu">Kontynuuj zakupy</a>
                <a class="btn btn-primary" style="color: white" href="/place-order">Złóż zamówienie</a>
            </div>
        </article>
    </div>
@endsection()

