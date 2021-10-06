@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 100px">
        <article class="content px-5 py-5 p-md-5" style=" min-height: 400px">
            <h1 style="float: left; margin-right: 20px;">Lista oczekujących zamówień</h1>
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID użytkownika</th>
                    <th scope="col">Dane zamówienia</th>
                    <th scope="col">Miejsce</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Miejscowość</th>
                    <th scope="col">Adres</th>
                    <th scope="col">Kod Pocztowy</th>
                    <th scope="col">Godzina Dostarczenia</th>
                    <th scope="col">Dodatkowy telefon1</th>
                    <th scope="col">Dodatkowy telefon2</th>
                    <th scope="col">Dodatkowy telefon3</th>
                    <th scope="col">Dodatkowy telefon4</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @if($order->Status==1)
                        @php
                            $cena = 0;
                        @endphp
                        <tr>
                            <th scope="col">{{$order->id}}</th>
                            <td>@if($order->user_id != null)

                                    {{$order->user_id}}
                                @else
                                    Gość
                                @endif</td>
                            <td>
                                @foreach(json_decode($order->order, true) as $item)
                                  {{ $item['pizza_nazwa'] }}<br>
                                    <p>roz: {{ $item['rozmiar'] }}czm, {{ $item['sos'] }}, {{$item['ilosc']}}szt.<br>
                                     cena: {{$item['cena_ogl']}}</p>
                                    @php
                                        $cena = $cena + $item['cena_ogl'];

                                    @endphp
                                @endforeach
                            </td>

                            <td>{{$order->miejsce}}</td>
                            <td>{{$order->telefon}}</td>
                            <td>{{$order->Miejscowosc}}</td>
                            <td>{{$order->Ul_adres}}</td>
                            <td>{{$order->kod_pocztowy}}</td>
                            <td>{{$order->Czas_Dostarczenia}}</td>
                            <td>{{$order->tel1}}</td>
                            <td>{{$order->tel2}}</td>
                            <td>{{$order->tel3}}</td>
                            <td>{{$order->tel4}}</td>
                            <td>
                                @if($order->Status == 1)
                                    W trakcie
                                        <form action="/admin/orders/{{$order->id}}" method="POST">
                                        @csrf <!-- {{ csrf_field() }} -->
                                            {{ method_field('PATCH') }}
                                            <input type="hidden" name="user_id" value="{{$order->user_id}}">
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <input type="hidden" name="cena_ogl" value="{{$cena}}">
                                            <button type="submit" class="btn btn-group-sm btn-info delete-user m-0">Ukończono</button>
                                        </form>
                                    @elseif($order->Status == 2)
                                    Dostarczono
                                @endif
                            </td>
                            <td>
                                <form action="/admin/orders/{{$order->id}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-group-sm btn-danger delete-user m-0"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>


            <h1 style="float: left; margin-right: 20px;">Lista ukończonych zamówień</h1>
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID użytkownika</th>
                    <th scope="col">Dane zamówienia</th>
                    <th scope="col">Miejsce</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Miejscowość</th>
                    <th scope="col">Adres</th>
                    <th scope="col">Kod Pocztowy</th>
                    <th scope="col">Godzina Dostarczenia</th>
                    <th scope="col">Dodatkowy telefon1</th>
                    <th scope="col">Dodatkowy telefon2</th>
                    <th scope="col">Dodatkowy telefon3</th>
                    <th scope="col">Dodatkowy telefon4</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @if($order->Status==2)
                    @php
                        $cena = 0;
                    @endphp
                    <tr>
                        <th scope="col">{{$order->id}}</th>
                        <td>@if($order->user_id != null)

                                {{$order->user_id}}
                            @else
                                Gość
                            @endif</td>
                        <td>
                            @foreach(json_decode($order->order, true) as $item)
                                {{ $item['pizza_nazwa'] }}<br>
                                <p>roz: {{ $item['rozmiar'] }}czm, {{ $item['sos'] }}, {{$item['ilosc']}}szt.<br>
                                    cena: {{$item['cena_ogl']}}</p>
                                @php
                                    $cena = $cena + $item['cena_ogl'];

                                @endphp
                            @endforeach
                        </td>

                        <td>{{$order->miejsce}}</td>
                        <td>{{$order->telefon}}</td>
                        <td>{{$order->Miejscowosc}}</td>
                        <td>{{$order->Ul_adres}}</td>
                        <td>{{$order->kod_pocztowy}}</td>
                        <td>{{$order->Czas_Dostarczenia}}</td>
                        <td>{{$order->tel1}}</td>
                        <td>{{$order->tel2}}</td>
                        <td>{{$order->tel3}}</td>
                        <td>{{$order->tel4}}</td>
                        <td>
                            @if($order->Status == 1)
                                W trakcie
                                <form action="/admin/orders/{{$order->id}}" method="POST">
                                @csrf <!-- {{ csrf_field() }} -->
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="user_id" value="{{$order->user_id}}">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <input type="hidden" name="cena_ogl" value="{{$cena}}">
                                    <button type="submit" class="btn btn-group-sm btn-info delete-user m-0">Ukończono</button>
                                </form>
                            @elseif($order->Status == 2)
                                Dostarczono
                            @endif
                        </td>
                        <td>
                            <form action="/admin/orders/{{$order->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-group-sm btn-danger delete-user m-0"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </article>
    </div>
@endsection()

