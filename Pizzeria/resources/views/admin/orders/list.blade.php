@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 100px">
        <article class="content px-5 py-5 p-md-5" style=" min-height: 400px">
            <h1 style="float: left; margin-right: 20px;">Lista zamówień</h1>
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="col">{{$order->id}}</th>
                            <td>{{$order->order}}</td>
                            <td>{{$order->miejsce}}</td>
                            <td>{{$order->telefon}}</td>
                            <td>{{$order->miejscowosc}}</td>
                            <td>{{$order->Ul_adres}}</td>
                            <td>{{$order->kod_pocztowy}}</td>
                            <td>{{$order->Czas_Dostarczenia}}</td>
                            <td>{{$order->tel1}}</td>
                            <td>{{$order->tel2}}</td>
                            <td>{{$order->tel3}}</td>
                            <td>{{$order->tel4}}</td>
                            <td>{{$order->tel4}}</td>
                            <td>{{$order->tel4}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </div>
@endsection()

