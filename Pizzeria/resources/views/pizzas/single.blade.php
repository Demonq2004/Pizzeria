@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 90px;">

        <article class="content px-3 py-5 p-md-5" style=" min-height: 400px">
            <div style="width: 60%; margin-left: 20%; ">
            @foreach($pizzas as $pizza)
                <h1>Informacje o pizzy: {{$pizza->nazwa}}</h1>
                <img style="margin-top: 20px; float: left" class="col-3" height="200" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}">
            @endforeach
                <p style="width: 50%; float: left; margin-top: 50px;"><b>Składniki pizzy: </b>
            @foreach($products as $product)
                    {{$product->nazwa}}
                @endforeach
        <br>
                @foreach($pizzas as $pizza)
                        <b>Cena</b>: {{$pizza->cena}} zł
                @endforeach
                </p>
            </div>

        </article>
        <div style="width: 80%; margin-left: 10%; min-height: 400px">
            <h1 class="text-center">Opinie</h1>

            <a href="/" class="btn btn-primary">Wróć</a>
        </div>

@endsection()

