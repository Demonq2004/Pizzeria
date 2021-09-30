@extends('app')

@section('content')
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
                <button style="border: 1px solid white; background-color: transparent; color: white; width: 350px; height: 50px;font-size: 150%;letter-spacing: 2px" onclick="window.location=('#menu')">ZOBACZ NASZE MENU</button>
                <button style="margin-left: 5%;border: 0; ;background-color: red; color: white; width: 350px; height: 50px;font-size: 150%;letter-spacing: 2px" onclick="window.location=('#kontakt')">SKONTAKTUJ SIĘ Z NAMI</button>

            </div>
        </div>
        <article class="content px-3 py-5 p-md-5">
            <h1 class="text-center" style="width: 100%; height: 70px" >Nasze Menu</h1>
            <div class="row" id="menu" style="width: 80%; margin-left: 10%">
                @foreach($pizzas as $pizza)
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 px-0" style="background-color: #f8f8f8">
                        <img class="col-12" height="200" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}">
                        <div class="px-3">
                            <p style="font-size: 120%" class="text-uppercase pt-3"><b><a style="color: black; text-decoration: none" href="/pizzas/{{$pizza->id}}" >{{$pizza->nazwa}}</a></b></p>

                        </div>
                        <div class="col-12 px-0" style="height: 2px; background-color: white"></div>
                        <div class="px-4 pt-3">
                            <p style="font-weight: bold; float: left">{{$pizza->cena}} ZŁ</p>
                            <form action="/orders/create" method="POST">
                            @csrf <!-- {{ csrf_field() }} -->
                                {{ method_field('GET') }}
                                <input type="hidden" name="id" value="{{$pizza->id}}">
                                <input type="submit" value="Dodaj do koszyka" style="margin-left:10%;font-size: 80%; background-color: #82B300; border: 0; border-radius: 5px; padding: 3px; color: white; float: left">
                            </form>
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
        <article class="content px-3 py-5 p-md-5">

            <div class="row" id="dostawcy" style="width: 80%; margin-left: 10%; margin-top: 30px">
                <h1 class="text-center" style="width: 100%; height: 70px" >Nasi Dostawcy</h1>

                    @foreach($products as $product)
                    <div class="col-xl-5 col-lg-5 col-sm-5 col-12 my-3 px-0 mx-3 text-center" style="background-color: #f8f8f8">
                        <div class="px-3">
                            <p style="font-size: 120%" class=" pt-3">Nazwa produktu: <b>{{$product->nazwa}}</b></p>
                            <p>Dostawca: <b>{{$product->dostawca}}</b></p>

                        </div>
                    </div>
                    @endforeach

            </div>
            <div class="" style="width: 80%; margin-left: 10%; margin-top: 30px" id="kontakt">

                        <form action="mail.php" method="post">
                            <div class="card rounded-0">
                                <div class="card-header p-0">
                                    <div class="bg-dark text-white text-center py-2">
                                        <h3 style="color: white"><i class="fa fa-envelope"></i> Kontakt</h3>
                                        <p class="m-0">Napisz do nas!</p>
                                    </div>
                                </div>
                                <div class="card-body p-3">

                                    <!--Body-->
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-user text-dark"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Imię i nazwisko" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope text-dark"></i></div>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-comment text-dark"></i></div>
                                            </div>
                                            <textarea class="form-control" placeholder="Wiadomość" required></textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" value="Wyślij" class="btn btn-dark btn-block rounded-0 py-2">
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--Form with header-->


                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection()
