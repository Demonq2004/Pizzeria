@extends('app')

@section('content')
    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading">Blog Home Page Heading</h1>
        </header>
        <article class="content px-3 py-5 p-md-5">
            <div style="width: 100%; height: 70px" ><h1 style="float: left; margin-right: 20px;">Lista pizzy </h1><a style="float: left;" href="/admin/pizzas/create" type="button" class="btn btn-success">Dodaj pizza</a></div>
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Składniki</th>
                    <th scope="col">Zdjęcie</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($pizzas as $pizza)
                    <tr>
                        <th scope="col">{{$pizza->id}}</th>
                        <td>{{ $pizza->nazwa }}</td>
                        <td>{{ $pizza->cena }}</td>
                        <td>{{ $pizza->skladniki }}</td>
                        <td><img width="150" height="100" src="/storage/pizza/{{$pizza->id}}/{{$pizza->img}}"></td>
                        <td>
                            <form action="/admin/pizzas/{{$pizza->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-group-sm btn-danger delete-user m-0"><i class="fas fa-trash-alt"></i></button>
                                <a href="/admin/pizzas/{{$pizza->id}}/edit" type="button" class="btn btn-info">Edytuj</a>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </article>
@endsection()

