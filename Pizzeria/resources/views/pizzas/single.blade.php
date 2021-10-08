@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 90px;">

        <article class="content px-3 py-5 p-md-5" style=" min-height: 400px">
            <div style="width: 60%; margin-left: 20%; ">

                <h1>Informacje o pizzy: {{$pizza->nazwa}}</h1>
                <img style="margin-top: 20px; float: left" class="col-3" height="200" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}">

                <p style="width: 50%; float: left; margin-top: 50px;"><b>Składniki pizzy: </b>
                    @foreach($pizza->products as $product)
                     {{$product->nazwa}}
                    @endforeach
                <br>
                        <b>Cena</b>: {{$pizza->cena}} zł<br>

                </p>
                <div style="width: 50%; margin-left: 25%; ">
                    <form action="/orders/create" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                        {{ method_field('GET') }}
                        <input type="hidden" name="id" value="{{$pizza->id}}">
                        <input type="submit" value="Dodaj do koszyka" style="font-size: 80%; background-color: #82B300; border: 0; border-radius: 5px; padding: 3px; color: white;">
                    </form>
                </div>
            </div>

        </article>

        <div style="width: 80%; margin-left: 10%; min-height: 400px">

            <a href="/" class="btn btn-primary">Wróć</a>
        </div>

@endsection()

