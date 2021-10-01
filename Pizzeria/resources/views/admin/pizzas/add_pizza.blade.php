@extends('app')
@php
    $pizzaId = session()->get('pizza');
    $skladniki = session()->get('skladniki');
@endphp
@section('content')


                <div class="main-page" style="margin-top: 100px">
                    <article class="content px-3 py-5 p-md-5">
                        <h1>Fromularz dodawania pizzy</h1>
                        <form action="/admin/pizzas/{{ $pizzaId }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="exampleInputPizza">Nazwa Pizzy</label>
                                <input type="text" class="form-control" name="nazwa" id="exampleInputPizza" placeholder="Pizza" required {{ old('nazwa') }}>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPrice">Cena Pizzy</label>
                                <input type="number" class="form-control" name="cena" min="0" id="exampleInputPrice" placeholder="Cena" required {{ old('cena') }}>
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
{{--                                        @if(isset($skladniki))--}}
{{--                                            @if(array_search($product->nazwa, array_column($skladniki, 'nazwa')))--}}
{{--                                                                <a class="btn btn-danger" href="usun-skladnik/{{$product->id}}">Usun</a>--}}
{{--                                            @else--}}
{{--                                                <a class="btn btn-primary" href="dodaj-skladnik/{{$product->id}}">Dodaj</a>--}}
{{--                                            @endif--}}
{{--                                        @else--}}
{{--                                        @endif--}}
                                        <a class="btn btn-primary" href="dodaj-skladnik/{{$product->id}}">Dodaj</a>
                                        <a class="btn btn-danger" href="usun-skladnik/{{$product->id}}">Usuń</a>
                                    </td>
                                @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <strong>Składniki w sesji:</strong>
                            @if(isset($skladniki))
                                @foreach($skladniki as $skladnik)
                                    <span>  {{ $skladnik->nazwa }}</span>
                                @endforeach
                            @else
                                niema
                            @endif
                            <div class="form-group mt-5">
                                <label for="exampleInputProductImg">Zdjęcie Pizzy</label><br>
                                <input type="file" name="img" id="exampleInputProductsImg" >
                            </div>
                            <button type="submit" class="btn btn-primary">Dodaj Pizze</button>
                        </form>
                    </article>
@endsection()

