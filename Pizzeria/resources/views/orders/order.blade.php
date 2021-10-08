@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 100px">
        <article class="content px-3 py-5 p-md-5" style=" min-height: 400px">
            <div style="width: 80%; margin-left: 10%; ">

                <h1 class="text-center">Spersonalizuj zamówienia</h1>

                <div>
                    <img class="col-xl-2 col-sm-3 col-12" style="margin-top: 20px; float: left" width="150" height="150" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}">
                    <div class="col-xl-10 col-sm-9  col-12" style="margin-top: 20px"><h3>{{$pizza->nazwa}}</h3>
                        <p><b>Składniki: </b>
                            @foreach($pizza->products as $product)
                                {{$product->nazwa}},
                            @endforeach
                        </p>
                        <form action="/orders/add-to-cart" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->

                            <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                            <select class="form-select" name="rozmiar">
                                <option hidden="hidden" selected value="">Wybierz wielkość pizzy</option>
                                <option value="30">Mała - 30cm - Cena: {{$pizza->cena}}ZŁ</option>
                                <option value="45">Średnia - 45cm - Cena: {{$pizza->cena*1.3}}ZŁ</option>
                                <option value="50">Duża - 50cm - Cena: {{$pizza->cena*1.5}}ZŁ</option>
                                <option value="60">Gigant - 60cm - Cena: {{$pizza->cena*1.8}}ZŁ</option>
                            </select>
                            <select class="form-select" name="sos">
                                <option hidden="hidden" selected value="">Wybierz sos do pizzy</option>
                                <option value="sos pomidorowy">Sos pomidorowy</option>
                                <option value="sos czosnkowy">Sos czosnkowy</option>
                                <option value="sos ostry">Sos ostry</option>
                            </select>
                            <input type="hidden" name="cena" value="{{$pizza->cena}}">
                            <input type="number" name="ilosc" placeholder="Ilość" min="1" required>
                            <input type="submit" value="Dodaj do koszyka" style="font-size: 80%; background-color: #82B300; border: 0; border-radius: 5px; padding: 3px; color: white;">
                        </form>
                    </div>
                </div>

            </div>
        </article>
    </div>
@endsection()

