
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Pizza House</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">

    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
<header>
    <div class="menu fixed-top" style="background-color: black;" style="z-index: 10">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <img src="/storage/home/menulogo.png" height="80">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#onas">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#dostawcy">Nasi Dostawcy</a>
                    </li>

                    <li class="my-2 my-lg-0 nav-item">
                        <a class="nav-link" href="/show-cart"><i class="fas fa-shopping-cart"></i> Koszyk</a>
                    </li>
                    @if(1==1)
                    <li>
                        <div class="dropdown">
                            <a class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Panel Administratora
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/admin/pizzas">Pizzy</a>
                                <a class="dropdown-item" href="/admin/products">Produkty</a>
                                <a class="dropdown-item" href="/admin/orders">Zamówienia</a>
                            </div>
                        </div>
                    </li>
                    @endif
                    <li class="my-2 my-lg-0 nav-item">
                        @if(Auth::check())
                        <a class="nav-link" href="/profil"><i class="fas fa-user"></i> {{ Auth::user()->name }} </a>

                    </li>
                    <li>
                        <form action="/logout" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->
                            {{ method_field('POST') }}
                            <button type="submit" class="btn btn-link">Wyloguj</button>
                        </form>
                        @else
                            <a class="nav-link" href="/login"><i class="fas fa-user"></i> Zaloguj się </a>
                            @endif
                    </li>
                    <li class="my-2 my-lg-0 nav-item">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

@yield('content')

<footer class="row bg-dark" style="width: 105%">
    <div style="text-align:center;width: 40%; height: 300px; float: left" class="p-3 col-xl-4 col-sm-12 col-12">
        <img height="250" src="/storage/home/footerlogo.png" style="margin-left: 15%">
    </div>
    <div style="text-align:center;width: 30%; height: 300px; float: left; color: white; font-size: 130%; line-height: 50px" class="p-3 col-xl-4 col-sm-12 col-12">
        <h3 style="color: white">Skontaktuj się z nami</h3>
        <p>Pizza House</p>
        <p>pizza.house@contact.com</p>
        <p>853 912 526</p>
    </div>
    <div style="width: 30%; height: 300px; float: left; color: white; font-size: 130%; line-height: 50px; text-align: center" class="p-3 col-xl-4 col-sm-12 col-12">
        <h3 style="color: white">Lokalizacja</h3>
        <p>Katowice 4/1</p>
        <p>40-038 Katowice</p>
        <p>Polska</p>
    </div>
    <div style="width: 100%; height: 2px; background-color: white; float: left"></div>
    <div class="p-3 col-xl-12 col-sm-12 col-12" style="font-size: 130%; text-align: center">
        <p style="color: white;">&copy; 2021 Pizza House - Dawid Grzegorzek</p>
    </div>
</footer>
<!-- Bootstrap Javascript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
