@extends('app')

@section('content')


    <div class="main-page" style="margin-top: 100px">
        <article class="content px-3 py-5 p-md-5 text-center">
            <h1>Panel Administratora</h1>
            <ul class="navbar-nav ml-auto" style="margin-top: 60px; font-size: 150%">
                <li class="nav-item"><a class="nav-link" href="/admin/pizzas">Pizza</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/products">Produkty</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/orders">Zamówienia</a></li>
            </ul>
        </article>
    </div>
@endsection()

