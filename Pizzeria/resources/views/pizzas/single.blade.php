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
            <!-- Opinie -->
        <h2 style="text-align:center;">Napisz opinie:</h2>
        <div>
        @if(Auth::check())
             <form action="/opinion" method="POST">
             @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                    <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <textarea  name="opinion" style="width:60%; margin-left:20%; height:200px"></textarea>
                    <p><input type="submit" value="Napisz" class="btn btn-dark" style="width:60%; margin-left:20%;"></p>
             </form>
        @else
           <p style="text-align: center"><a href="/login">Zaloguj się</a> aby napisać opinie!</p>
        @endif
        </div>
        <h2 style="text-align:center;">Opinie:</h2>
        @foreach($opinions as $opinion)
            <div class="col-xl-4 col-lg-4 col-sm-6 col-12 my-3 px-0" style="float:left; ">
                <div style="margin:10px;border: 1px solid blue; padding:20px;text-align:center;height:250px">
                <h3>{{$opinion->user_name}}</h3>
                <p style="margin:10px">{{$opinion->opinion}}</p>
                @if(Auth::check())
                @if(($opinion->user_id == Auth::user()->id) || $rola->role_id == 1)
                    <form action="/opinion/{{$opinion->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-group-sm btn-danger delete-user m-0">Usuń opinie</button>

                    </form>
                @endif
                @endif
                </div>
            </div>
        @endforeach


        </div>

@endsection()

