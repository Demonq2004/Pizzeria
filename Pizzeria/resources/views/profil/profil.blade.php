@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 96px" class="row">
        <div style="float: left;" class="p-3 text-center col-xl-6 col-12">
            <h1 style="font-size: 300%">Twój Profil</h1> <!-- Jesli to jest profil innego uzytkownika to wysiwetla: Profil uzytkownika: nazwa -->
            <p class="text-uppercase" style="font-size: 180%;margin-top: 5%">{{ $user->name }}</p>
            <!-- Wyświetla się to wtedy jeśli to jest własne konto -->
            <p>Email: {{$user->email}}</p>
            <p>Telefon: 645432123</p>
            <a href="" class="btn btn-info">Edytuj Profil</a>
            <a href="" class="btn btn-danger">Usuń Profil</a>

        </div>
        <div style=" float: left;border-left: 2px solid #f1f1f1" class="p-3 text-center col-xl-6 col-12">
            <!-- Wyświetla się to wtedy jeśli to jest własne konto -->
            <h1 style="font-size: 300%">Twoje Adresy</h1>
            <div class="row">
            <div class="col-xl-6 col-sm-12" style=" border: 5px solid white">
                <div style="width: 100%; height: 100%; border: 1px solid purple; padding: 20px">
                    <h4>Adres 1</h4>
                    <p><b>Miejscowość:</b> Żory</p>
                    <p><b>Adres:</b> Bajadera 1</p>
                    <p><b>Kod Pocztowy:</b> 41-120</p>
                    <a href="" class="btn btn-info">Edytuj Adres</a>
                    <a href="" class="btn btn-danger">Usuń Adres</a>
                </div>
            </div>
            <div class="col-xl-6 col-sm-12" style="border: 5px solid white">
                <div style="width: 100%; height: 100%; border: 1px solid purple; padding: 20px">
                    <h4>Adres 2</h4>
                    <p><b>Miejscowość:</b> Pszczyna</p>
                    <p><b>Adres:</b> Korfantego 5</p>
                    <p><b>Kod Pocztowy:</b> 42-122</p>
                    <a href="" class="btn btn-info">Edytuj Adres</a>
                    <a href="" class="btn btn-danger">Usuń Adres</a>
                </div>
            </div>
            </div>
            <!-- Jesli to czyjes konto i uzytkownik posiada konto to wyswietla sie przycisk zapros do znajomych -->
        </div>

        <div style=" float: left;margin-top: 100px;" class="p-3 text-center col-xl-6 col-12">
            <h1 style="font-size: 200%">Twoje Ostatnie Zamówienia</h1>
            <table style="margin-top: 50px">



                        @foreach($orders as $order)
                    @if($order->Status == 2)

                            @foreach(json_decode($order->order, true) as $item)
                            <tr>
                                <td class="col-xl-10">
                        <img style="float: left;" class="col-xl-3 col-lg-4 col-sm-12 col-12" src="/storage/pizza/{{ $item['id'] }}/pizza_img.jpg">
                        <div style="margin-left: 20px; float: left">

                            <h4 class="text-uppercase">{{ $item['pizza_nazwa'] }}</h4>
                            <p>{{ $item['rozmiar'] }}, {{ $item['sos'] }}, {{$item['ilosc']}}szt.</p>
                            <p><b>Data zamówienia: </b>{{$order->created_at}}</p>
                        </div>
                    </td>
                    <td style="text-align: center; background-color: #f8f8f8">
                        <div style="float: right; height: 150px" class="col-12">

                            <p style="font-size: 100%; margin-top: 15%; ">
                                <strong>{{$item['cena_ogl']}} ZŁ</strong>
                            </p>
                            <p>{{$item['cena_szt']}} ZŁ (sztuka)</p>
                        </div>
                    </td>
                            </tr>
                        @endforeach

                    @endif
                    @endforeach

            </table>
        </div>

        <div style="float: right;" class="p-3 text-center col-xl-6 col-12">
            <div style="width: 100% ; float: left; margin-top: 100px;border-left: 2px solid #f1f1f1" >
                <h1 style="font-size: 200%;margin-bottom: 50px">Twoja Ulubiona Pizza</h1>
                <img style="margin-top: 20px; float: left" class="col-4" height="200" src="/storage/pizza/1/pizza_img.jpg">
                <p style="width: 50%; float: left; margin-top: 50px; font-size: 140%" class="text-uppercase"><b>Pizza Serowa</b></p>
                <p style="width: 50%; float: left"><b>Składniki pizzy: </b>
                    Ser
                    <br>
                    <b>Cena</b>: 20 zł<br>

                </p>
            </div>
            <div style="width: 100% ;float: left; margin-top: 100px;border-left: 2px solid #f1f1f1">
                <h1 style="font-size: 200%;margin-bottom: 50px">Posiadana ilość punktów</h1>
                <p style="font-size: 250%;">1021</p>

            </div>
            <div style="width: 100% ; float: left; margin-top: 100px;border-left: 2px solid #f1f1f1">
                <h1 style="font-size: 200%;margin-bottom: 50px">Oczekujące zamówienie</h1>
                <table style="margin-top: 50px">
                    @foreach($orders as $order)
                        @if($order->Status == 1)
                                @foreach(json_decode($order->order, true) as $item)
                                <tr>
                                <td class="col-xl-10">
                                    <img style="float: left;" class="col-xl-3 col-lg-4 col-sm-12 col-12" src="/storage/pizza/{{ $item['id'] }}/pizza_img.jpg">
                                    <div style="margin-left: 20px; float: left">

                                        <h4 class="text-uppercase">{{ $item['pizza_nazwa'] }}</h4>
                                        <p>{{ $item['rozmiar'] }}, {{ $item['sos'] }}, {{$item['ilosc']}}szt.</p>
                                        <p><b>Data zamówienia: </b>{{$order->created_at}}</p>
                                        <form action="/orders/{{$order->id}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-group-sm btn-danger delete-user m-0">Anuluj</button>
                                        </form>
                                    </div>
                            </td>
                            <td style="text-align: center; background-color: #f8f8f8">
                                <div style="float: right; height: 150px" class="col-12">

                                    <p style="font-size: 100%; margin-top: 15%; ">
                                        <strong>{{$item['cena_ogl']}} ZŁ</strong>
                                    </p>
                                    <p>{{$item['cena_szt']}} ZŁ (sztuka)</p>
                                </div>
                                </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection()

