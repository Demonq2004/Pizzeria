@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 100px">
        <article class="content px-3 py-5 p-md-5" style=" min-height: 400px">
            <div style="width: 80%; margin-left: 10%; ">
                <h1 class="text-center">Spersonalizuj zamówienia</h1>

                <div>
                    <img style="margin-top: 20px; float: left" width="150" height="150" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}">
                    <div style="float: left; margin-left: 20px; margin-top: 40px"><h3>{{$pizza->nazwa}}</h3>
                        <p><b>Składniki: </b>
                            @foreach($pizza->products as $product)
                                {{$product->nazwa}}
                            @endforeach
                        </p>
                        <form action="/orders/add-to-cart" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->

                            <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                            <select class="form-select" name="rozmiar">
                                <option selected>Wybierz wielkość pizzy</option>
                                <option value="30">Mała - 30cm</option>
                                <option value="45">Średnia - 45cm</option>
                                <option value="50">Duża - 50cm</option>
                                <option value="60">Gigant - 60cm</option>
                            </select>
                            <select class="form-select" name="sos">
                                <option selected>Wybierz sos do pizzy</option>
                                <option value="sos pomidorowy">Sos pomidorowy</option>
                                <option value="sos czosnkowy">Sos czosnkowy</option>
                                <option value="sos ostry">Sos ostry</option>
                            </select>
                            <input type="hidden" name="cena" value="{{$pizza->cena}}">
                            <input type="number" name="ilosc" placeholder="Ilość">
                            <input type="submit" value="Dodaj do koszyka" style="font-size: 80%; background-color: #82B300; border: 0; border-radius: 5px; padding: 3px; color: white;">
                        </form>
                    </div>
                </div>

            </div>
        </article>
    </div>
@endsection()
