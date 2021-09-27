
@extends('app')
@php
    $pizzaSkladniki = session()->get('pizzaSkladniki');
@endphp
@section('content')


                <div class="main-wrapper">
                    <header class="page-title theme-bg-light text-center gradient py-5">
                        <h1 class="heading">Blog Home Page Heading</h1>
                    </header>
                    <article class="content px-3 py-5 p-md-5">
                        <h1>Fromularz dodawania pizzy</h1>
                        <form action="/pizzas" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->
                            <div class="form-group">
                                <label for="exampleInputPizza">Nazwa Pizzy</label>
                                <input type="text" class="form-control" name="nazwa" id="exampleInputPizza" placeholder="Pizza" required>
                            </div>
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Dostępne Składniki</th>
                                        <th scope="col">Cena Składnika</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach($products as $product)
                                @if($product->dostepny == true)
                                <tr>
                                    <td>{{ $product->nazwa }}</td>
                                    <td>{{ $product->cena }}</td>
                                    <td>
                                        @if(isset($pizzaSkladniki))
                                            @foreach($pizzaSkladniki as $id => $skladnik)
                                                    @if($product->nazwa == $skladnik['nazwa'])
                                                            <a class="btn btn-danger" href="usun-skladnik/{{$product->id}}">Usun</a>
                                                    @endif
                                            @endforeach
                                        @else
                                            <a class="btn btn-primary" href="dodaj-skladnik/{{$product->id}}">Dodaj</a>
                                        @endif
                                    </td>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if(isset($pizzaSkladniki))
                                @foreach($pizzaSkladniki as $id => $skladnik)
                                    {{ $skladnik['nazwa'] }}
                                @endforeach
                            @endif
                            <div class="form-group mt-5">
                                <label for="exampleInputProductImg">Zdjęcie Pizzy</label><br>
                                <input type="file" name="img" id="exampleInputProductsImg" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Dodaj Pizze</button>
                        </form>
                    </article>
@endsection()

