@extends('app')

@section('content')
    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading">Blog Home Page Heading</h1>
        </header>
        <article class="content px-3 py-5 p-md-5">
            <h1 class="text-center" style="width: 100%; height: 70px">Nasze Menu</h1>
            <div class="row">
                @foreach($pizzas as $pizza)
                    <div class="col-xl-2 col-lg-5 col-sm-5 col-8 mx-3 my-3 px-0" style="background-color: #f8f8f8">
                        <img class="col-12" height="200" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}">
                        <div class="px-3">
                            <p style="font-size: 120%" class="text-uppercase pt-3"><b>{{$pizza->nazwa}}</b></p>
                            <small>{{$pizza->skladniki}}</small>

                        </div>
                        <div class="col-12 px-0" style="height: 2px; background-color: white"></div>
                        <div class="px-4 pt-3">
                            <p style="font-weight: bold; float: left">{{$pizza->cena}} ZŁ</p>
                            <button style="margin-left:10%;font-size: 80%; background-color: #82B300; border: 0; border-radius: 5px; padding: 3px; color: white; float: left">Dodaj do koszyka</button>
                        </div>

                    </div>

                @endforeach
            </div>

        </article>
@endsection()
