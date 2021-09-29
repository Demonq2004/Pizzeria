<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Blog Site Template</title>
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
    <div class="menu fixed-top" style="background-color: black;" style="z-index: 10">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <img src="/storage/home/menulogo.png" height="80">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#onas">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dostawcy">Nasi Dostawcy</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#opinie">Opinie</a>
                    </li>

                <li class="my-2 my-lg-0 nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="main-page">
        <div class="bg-image" style="margin-top: 93px; height: 750px; background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(/storage/home/baner.jpg); background-repeat: no-repeat; background-size: 100% 100%">
            <div class="text-center" style="line-height: 144px; padding-top: 100px">
                <p class=" hbaner" style="color: white;font-weight: 200">Pizza</p>
                <p class=" hbaner" style="color: white;">House</p>

            </div>
            <div style="width: 450px; height: 50px; background-color: white; text-align: center; margin-left: 38%; margin-top: 50px">
                <p style="line-height: 50px; font-size: 150%; font-weight: 200; letter-spacing: 2px">POSIADAMY X RODZAJÓW PIZZY</p>
            </div>
            <div style="margin-left: 30%; margin-top: 50px">
                <button style="border: 1px solid white; background-color: transparent; color: white; width: 350px; height: 50px;font-size: 150%;letter-spacing: 2px">ZOBACZ NASZE MENU</button>
                <button style="margin-left: 5%;border: 0; ;background-color: red; color: white; width: 350px; height: 50px;font-size: 150%;letter-spacing: 2px">SKONTAKTUJ SIĘ Z NAMI</button>
            </div>
        </div>
        <article class="content px-3 py-5 p-md-5">
            <h1 class="text-center" style="width: 100%; height: 70px" >Nasze Menu</h1>
            <div class="row" id="menu" style="width: 80%; margin-left: 10%">
                @foreach($pizzas as $pizza)
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 px-0" style="background-color: #f8f8f8">
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

            <div id="opinie" style="width: 80%; margin-left: 10%; margin-top: 30px; min-height: 450px">
                <h1 class="text-center" style="width: 100%; height: 70px" >O nas</h1>
                <img src="/storage/home/indeks.jpg " height="400" style="width: 40%; float: left">
                <p style="width: 58%; float: left; margin-left: 2%" class="text-center">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquet augue a lorem consequat, a efficitur nibh eleifend. In mi magna, mattis non orci quis, viverra tincidunt magna. Aenean tempor lorem et mauris elementum blandit. Morbi pulvinar diam quis hendrerit ultrices. Curabitur eget pellentesque magna. Praesent quis posuere magna. Duis cursus massa sit amet risus auctor pretium.

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fermentum, justo id tincidunt maximus, est nisl finibus enim, non condimentum sem est id est. Sed ut elementum libero. Quisque diam sem, dictum ac interdum sit amet, laoreet sed tortor. Proin ut tristique sapien. Phasellus non ante non risus pulvinar luctus. Proin ac luctus ante. Mauris placerat ante eu felis hendrerit consequat. Donec fermentum mattis aliquet. Nullam pharetra ex et elementum efficitur. Mauris iaculis diam ut ligula euismod, eget congue ante imperdiet.
                </p>
            </div>


        </article>
        <div style="width: 100%; height: 300px;background-attachment: fixed; background-size: 100% 100%; background-repeat: no-repeat; background-image: url(/storage/home/przerywnik.jpg)">

        </div>
        <article>

            <div class="row" id="dostawcy" style="width: 80%; margin-left: 10%; margin-top: 30px">
                <h1 class="text-center" style="width: 100%; height: 70px" >Nasi Dostawcy</h1>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12 my-3 px-0" style="background-color: #f8f8f8">
                    @foreach($dostawcy as $dostawca)
                        {{ $dostawca }}
                    @endforeach
{{--                    <div class="px-3">--}}
{{--                        <p style="font-size: 120%" class="text-uppercase pt-3"><b>{{$pizza->nazwa}}</b></p>--}}
{{--                        <small>{{$pizza->skladniki}}</small>--}}

{{--                    </div>--}}
{{--                    <div class="col-12 px-0" style="height: 2px; background-color: white"></div>--}}
{{--                    <div class="px-4 pt-3">--}}
{{--                        <p style="font-weight: bold; float: left">{{$pizza->cena}} ZŁ</p>--}}
{{--                        <button style="margin-left:10%;font-size: 80%; background-color: #82B300; border: 0; border-radius: 5px; padding: 3px; color: white; float: left">Dodaj do koszyka</button>--}}
{{--                    </div>--}}
                </div>
            </div>
        </article>
    </div>

    <footer class="w-100  bg-dark" style="height: 370px">
        <div style="width: 40%; height: 300px; float: left" class="p-3">
            <img height="250" src="/storage/home/footerlogo.png" style="margin-left: 15%">
        </div>
        <div style="width: 30%; height: 300px; float: left; color: white; font-size: 130%; line-height: 50px" class="p-3">
            <h3 style="color: white">Skontaktuj się z nami</h3>
            <p>Pizza House</p>
            <p>pizza.house@contact.com</p>
            <p>853 912 526</p>
        </div>
        <div style="width: 30%; height: 300px; float: left; color: white; font-size: 130%; line-height: 50px" class="p-3">
            <h3 style="color: white">Lokalizacja</h3>
            <p>Katowice 4/1</p>
            <p>40-038 Katowice</p>
            <p>Polska</p>
        </div>
        <div style="width: 100%; height: 2px; background-color: white; float: left"></div>
        <div class="p-3" style="font-size: 130%">
            <p style="color: white;">&copy; 2021 Pizza House - Dawid Grzegorzek</p>
        </div>
    </footer>
    <!-- Bootstrap Javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
