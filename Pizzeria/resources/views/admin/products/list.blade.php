@extends('app')

@section('content')
    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading">Blog Home Page Heading</h1>
        </header>
        <article class="content px-3 py-5 p-md-5">
            <h1 style="float: left; margin-right: 20px;">Lista produktów </h1><a style="float: left;" href="products/create" type="button" class="btn btn-success">Dodaj produkt</a>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Dostawca</th>
                        <th scope="col">Data Ważności</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="col">{{$product->id}}</th>
                        <td>{{ $product->nazwa }}</td>
                        <td>{{ $product->cena }}</td>
                        <td>{{ $product->dostawca }}</td>
                        <td>{{ $product->data_waznosci }}</td>
                        <td>
                            <form action="/products/{{$product->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-group-sm btn-danger delete-user m-0"><i class="fas fa-trash-alt"></i></button>
                                <a href="products/{{$product->id}}/edit" type="button" class="btn btn-info">Edytuj</a>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </article>
@endsection()
